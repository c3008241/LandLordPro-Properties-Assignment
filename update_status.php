<?php
session_start();
require 'connect.php';

if (!isset($_SESSION['user_type']) {
    die("Unauthorized");
}

if ($_SESSION['user_type'] !== 'landlord') {
    die("Unauthorized");
}

if (!isset($_POST['id']) || !isset($_POST['status'])) {
    die("Invalid request");
}

$app_id = (int)$_POST['id'];
$status = in_array($_POST['status'], ['approved', 'rejected']) ? $_POST['status'] : die("Invalid status");

$check = $conn->prepare("SELECT landlord_id FROM applications WHERE id = ?");
$check->bind_param("i", $app_id);
$check->execute();
$check_result = $check->get_result();

if ($check_result->num_rows === 0) {
    die("Application not found");
}

if ($check_result->fetch_assoc()['landlord_id'] != $_SESSION['user_id']) {
    die("Unauthorized");
}

$update = $conn->prepare("UPDATE applications SET status = ? WHERE id = ?");
$update->bind_param("si", $status, $app_id);

if ($update->execute()) {
    echo "Status updated successfully";
} else {
    http_response_code(500);
    echo "Error updating status";
}
?>