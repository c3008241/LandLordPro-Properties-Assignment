<?php
session_start();
include 'connect.php';
// $conn = connectDB();

if (!isset($_SESSION['user_id'])) {
    header("Location: logIn.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['addProperty'])) {
    $propertyImg = '';
    if (isset($_FILES['propertyImg']) && $_FILES['propertyImg']['error'] === UPLOAD_ERR_OK) {
        $targetDir = "uploads/properties/";
        if (!file_exists($targetDir)) mkdir($targetDir, 0755, true);
        $fileName = uniqid() . '.' . pathinfo($_FILES['propertyImg']['name'], PATHINFO_EXTENSION);
        if (move_uploaded_file($_FILES['propertyImg']['tmp_name'], $targetDir . $fileName)) {
            $propertyImg = $fileName;
        }
    }

    $sql = "INSERT INTO properties (
        landlord_id, 
        location, 
        propertyImg, 
        price, 
        bedroomQuantity, 
        status
    ) VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $landlord_id = $_SESSION['user_id'];
    $status = "Available";
    
    $stmt->bind_param("issdis", 
        $landlord_id,
        $_POST['propertyAddress'],
        $propertyImg,
        $_POST['rentAmount'],
        $_POST['bedrooms'],
        $status
    );

    if ($stmt->execute()) {
        header("Location: properties.php?success=1");
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
    exit();
}
?>

