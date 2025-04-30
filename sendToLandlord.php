<?php
session_start();
include 'connect.php';
// $conn = connectDB();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$senderUserId = $_SESSION['user_id'];

if (isset($_POST['sendMoney'])) {
    $receiverEmail = ($_POST['receiverEmail']);
    $amount = ($_POST['amount']);

    if (!$receiverEmail || !$amount || $amount <= 0) {
        echo "Invalid email or amount.";
        exit();
    }

    try {
        $conn->begin_transaction();

        $stmt = $conn->prepare("SELECT user_id FROM userinfo WHERE email = ?");
        $stmt->bind_param("s", $receiverEmail);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows === 0) {
            echo "No user found with that email.";
            $stmt->close();
            $conn->rollback();
            exit();
        }

        $stmt->bind_result($receiverUserId);
        $stmt->fetch();
        $stmt->close();

        if ($receiverUserId == $senderUserId) {
            echo "You cannot send money to yourself.";
            $conn->rollback();
            exit();
        }

        $balanceStmt = $conn->prepare("SELECT balance FROM accounts WHERE user_id = ?");
        $balanceStmt->bind_param("i", $senderUserId);
        $balanceStmt->execute();
        $balanceStmt->bind_result($senderBalance);
        $balanceStmt->fetch();
        $balanceStmt->close();

        if ($senderBalance < $amount) {
            echo "<script>
        alert('Insufficient Balance.');
        window.location.href = 'accountBalance.php';
        </script>";
            $conn->rollback();
            exit();
        }

        $deductStmt = $conn->prepare("UPDATE accounts SET balance = balance - ? WHERE user_id = ?");
        $deductStmt->bind_param("di", $amount, $senderUserId);
        $deductStmt->execute();
        $deductStmt->close();

        $creditStmt = $conn->prepare("UPDATE accounts SET balance = balance + ? WHERE user_id = ?");
        $creditStmt->bind_param("di", $amount, $receiverUserId);
        $creditStmt->execute();
        $creditStmt->close();

        $conn->commit();

        echo "<script>
        alert('Payment successful!');
        window.location.href = 'accountBalance.php';
      </script>";
        
    } catch (Exception $e) {
        $conn->rollback();
        echo "Error: " . $e->getMessage();
    }

} else {
    echo "Invalid access.";
}
?>
