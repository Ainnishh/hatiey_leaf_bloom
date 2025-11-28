<?php
include "db_connect.php";

header('Content-Type: application/json');

$name = trim(isset($_POST['name']) ? $_POST['name'] : '');
$email = trim(isset($_POST['email']) ? $_POST['email'] : '');
$message = trim(isset($_POST['message']) ? $_POST['message'] : '');

if ($name === '' || $email === '' || $message === '') {
    echo json_encode([
        "success" => false,
        "error" => "All fields are required"
    ]);
    exit;
}

try {
    $stmt = $conn->prepare("INSERT INTO contact_messages(name, email, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $message);
    $stmt->execute();

    echo json_encode(["success" => true]);

} catch (Exception $e) {
    echo json_encode([
        "success" => false,
        "error" => $e->getMessage()
    ]);
}
