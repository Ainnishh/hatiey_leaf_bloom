<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: orders.php");
    exit;
}

$order_id = isset($_POST['order_id']) ? intval($_POST['order_id']) : 0;
$status   = isset($_POST['status']) ? $_POST['status'] : "";

if ($order_id <= 0 || $status == "") {
    die("Invalid request");
}

$allowed = ['Pending', 'Processing', 'Completed', 'Cancelled'];

if (!in_array($status, $allowed)) {
    die("Invalid status value");
}

$stmt = $conn->prepare("UPDATE orders SET status = ? WHERE order_id = ?");
$stmt->bind_param("si", $status, $order_id);

if (!$stmt->execute()) {
    die("Database update failed");
}

$stmt->close();

header("Location: orders.php?updated=1");
exit;
