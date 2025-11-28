<?php
session_start();
include 'db_connect.php';

if($_SERVER['REQUEST_METHOD'] !== 'POST'){
    header("Location: cart.php");
    exit;
}

$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

if(count($cart) == 0){
    header("Location: cart.php");
    exit;
}

$customer_name  = isset($_POST['customer_name']) ? trim($_POST['customer_name']) : '';
$customer_email = isset($_POST['customer_email']) ? trim($_POST['customer_email']) : '';

if($customer_name == '' || $customer_email == ''){
    header("Location: checkout.php?error=empty_fields");
    exit;
}

// calculate total
$total = 0;
foreach($cart as $it){
    $total += $it['price'] * $it['quantity'];
}

// insert orders
$stmt = $conn->prepare("INSERT INTO orders (customer_name, customer_email, total) VALUES (?, ?, ?)");
$stmt->bind_param("ssd", $customer_name, $customer_email, $total);
$stmt->execute();
$order_id = $stmt->insert_id;
$stmt->close();

// insert items
$stmt2 = $conn->prepare("INSERT INTO order_items (order_id, product_name, quantity, price) VALUES (?, ?, ?, ?)");
foreach($cart as $it){
    $stmt2->bind_param("isid", $order_id, $it['name'], $it['quantity'], $it['price']);
    $stmt2->execute();
}
$stmt2->close();

// clear cart
unset($_SESSION['cart']);

header("Location: order_success.php");
exit;
?>
