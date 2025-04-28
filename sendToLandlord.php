<?php 

session_start();

include 'connect.php';



if (isset($_POST["sendMoney"])) {
    if ($conn->connect_error) {
        die("<div class='error-message'>Database connection failed: " . $conn->connect_error . "</div>");
    }

    // Input validation
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $amount = isset($_POST['amount']) ? floatval($_POST['amount']) : 0;
    $senderId = isset($_SESSION['user_ID']) ? $_SESSION['user_ID'] : null;

    // Validate inputs
    if (empty($email) || $amount <= 0 || empty($senderId)) {
        die("<div class='error-message'>Please fill all fields correctly.</div>");
    }

    $stmt = null; // Initialize statement variable

    try {
        // 1. Get sender's account details with email
        $senderQuery = "SELECT a.account_ID, u.email, a.balance 
                       FROM userinfo AS u
                       INNER JOIN accounts AS a ON a.user_id = u.user_id
                       WHERE u.user_id = ?";
        $stmt = $conn->prepare($senderQuery);
        if ($stmt === false) {
            throw new Exception("Prepare failed: " . $conn->error);
        }
        
        if (!$stmt->bind_param("i", $senderId)) {
            throw new Exception("Bind failed: " . $stmt->error);
        }
        
        if (!$stmt->execute()) {
            throw new Exception("Execute failed: " . $stmt->error);
        }

        $senderResult = $stmt->get_result();
        if ($senderResult->num_rows === 0) {
            throw new Exception("Sender account not found.");
        }

        $sender = $senderResult->fetch_assoc();
        $senderAccountId = $sender['account_ID'];
        $senderBalance = $sender['balance'];
        $senderCurrency = $sender['email'];
        $stmt->close(); // Close the statement after use

        // 2. Check if sender has sufficient funds
        if ($senderBalance < $amount) {
            $balance = ($senderBalance);
            throw new Exception("Insufficient funds. Your balance: $balance");
        }

        // 3. Find recipient's account with matching email
        $recipientQuery = "SELECT a.account_ID, u.user_id, ,u.email, a.balance , p.property_id
                          FROM userinfo u
                          INNER JOIN accounts AS a ON a.user_id = u.user_id
                          INNER JOIN properties AS p ON p.property_id = a.property_id
                          WHERE u.email = ?
                              ";
        
        $stmt = $conn->prepare($recipientQuery);
        if ($stmt === false) {
            throw new Exception("Recipient prepare failed: " . $conn->error);
        }
        
        if (!$stmt->bind_param("i", $email )) {
            throw new Exception("Recipient bind failed: " . $stmt->error);
        }
        
        if (!$stmt->execute()) {
            throw new Exception("Recipient execute failed: " . $stmt->error);
        }

        $recipientResult = $stmt->get_result();
        if ($recipientResult->num_rows === 0) {
            throw new Exception("No account found with those details or currency mismatch.");
        }

        $recipient = $recipientResult->fetch_assoc();
        $recipientAccountId = $recipient['account_ID'];
        $recipientUserId = $recipient['user_ID'];
        $recipientBalance = $recipient['balance'];
        $stmt->close(); // Close the statement after use

        // 4. Perform the transfer (transaction)
        $conn->begin_transaction();

        // Deduct from sender
        $updateSender = "UPDATE accounts SET balance = balance - ? WHERE account_ID = ?";
        $stmt = $conn->prepare($updateSender);
        if ($stmt === false) {
            throw new Exception("Sender update prepare failed: " . $conn->error);
        }
        if (!$stmt->bind_param("di", $amount, $senderAccountId)) {
            throw new Exception("Sender update bind failed: " . $stmt->error);
        }
        if (!$stmt->execute()) {
            throw new Exception("Sender update execute failed: " . $stmt->error);
        }
        $stmt->close();

        // Add to recipient
        $updateRecipient = "UPDATE accounts SET balance = balance + ? WHERE account_ID = ?";
        $stmt = $conn->prepare($updateRecipient);
        if ($stmt === false) {
            throw new Exception("Recipient update prepare failed: " . $conn->error);
        }
        if (!$stmt->bind_param("di", $amount, $recipientAccountId)) {
            throw new Exception("Recipient update bind failed: " . $stmt->error);
        }
        if (!$stmt->execute()) {
            throw new Exception("Recipient update execute failed: " . $stmt->error);
        }
        $stmt->close();


    } catch (Exception $e) {
        if ($conn && $conn->connect_errno === 0 && $conn->thread_id) {
            $conn->rollback();
        }
        die("<div class='error-message'>Transfer failed: " . htmlspecialchars($e->getMessage()) . "</div>");
    } finally {
        // Only try to close if $stmt exists and is a valid statement object
        if (isset($stmt) && is_object($stmt) && get_class($stmt) === 'mysqli_stmt') {
        }
        if ($conn) {
            $conn->close();
        }
    }
}



?>