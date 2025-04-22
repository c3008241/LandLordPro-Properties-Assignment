<?php
session_start();
require 'connect.php';

if (!isset($_SESSION['user_id']) || $_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("HTTP/1.1 403 Forbidden");
    exit();
}

$stmt = $conn->prepare("SELECT user_type FROM userinfo WHERE user_id = ?");
$stmt->bind_param("i", $_SESSION['user_id']);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();

if (!$user || $user['user_type'] !== 'landlord') {
    header("HTTP/1.1 403 Forbidden");
    exit();
}

$app_id = (int)$_POST['id'];
$status = in_array($_POST['status'], ['approved', 'rejected']) ? $_POST['status'] : 'pending';

$stmt = $conn->prepare("UPDATE applications a 
                       JOIN properties p ON a.property_id = p.property_id
                       SET a.status = ?
                       WHERE a.id = ? AND p.landlord_id = ?");
$stmt->bind_param("sii", $status, $app_id, $_SESSION['user_id']);

if ($stmt->execute()) {
    header("HTTP/1.1 200 OK");
} else {
    header("HTTP/1.1 500 Internal Server Error");
}
?>