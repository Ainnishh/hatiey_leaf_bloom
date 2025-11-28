<?php
session_start();
include "db_connect.php";

// Validate order id
if (!isset($_GET['id']) || !ctype_digit($_GET['id'])) {
    header("Location: orders.php");
    exit;
}

$order_id = intval($_GET['id']);

// 1. Fetch basic order info
$stmt = $conn->prepare("SELECT customer_name, customer_email, total, status, created_at 
                        FROM orders WHERE order_id = ?");
$stmt->bind_param("i", $order_id);
$stmt->execute();
$res = $stmt->get_result();

if ($res->num_rows == 0) {
    echo "Order not found!";
    exit;
}

$order = $res->fetch_assoc();
$stmt->close();

// 2. Fetch order items
$stmt2 = $conn->prepare("SELECT product_name, quantity, price FROM order_items WHERE order_id = ?");
$stmt2->bind_param("i", $order_id);
$stmt2->execute();
$items = $stmt2->get_result();
$stmt2->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Order Details | Admin</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>

<header>
	<div class="logo">
		<img src="images/logo.png" class="main-logo">
	</div>
	<nav>
		<a href="orders.php" class="active">Orders</a>
		<a href="index.php">Logout</a>
	</nav>
</header>

<h1 class="admin-title">Order #<?= $order_id ?></h1>

<div class="order-info">
	<p><strong>Name:</strong> <?= $order['customer_name'] ?></p>
	<p><strong>Email:</strong> <?= $order['customer_email'] ?></p>
	<p><strong>Total:</strong> RM<?= number_format($order['total'], 2) ?></p>
	<p><strong>Date:</strong> <?= $order['created_at'] ?></p>
	<p><strong>Status:</strong> <span class="status <?= strtolower($order['status']) ?>">
		<?= $order['status'] ?>
	</span></p>
</div>

<table class="orders-table">
	<tr>
		<th>Product</th>
		<th>Quantity</th>
		<th>Price (RM)</th>
	</tr>

	<?php while($it = $items->fetch_assoc()): ?>
	<tr>
		<td><?= $it['product_name'] ?></td>
		<td><?= $it['quantity'] ?></td>
		<td><?= number_format($it['price'], 2) ?></td>
	</tr>
	<?php endwhile; ?>
</table>

<h3>Update Status</h3>

<form action="order_update_status.php" method="post">
	<input type="hidden" name="order_id" value="<?= $order_id ?>">
	
	<select name="status" required>
		<option value="Pending" <?= $order['status']=="Pending" ? "selected" : "" ?>>Pending</option>
		<option value="Processing" <?= $order['status']=="Processing" ? "selected" : "" ?>>Processing</option>
		<option value="Completed" <?= $order['status']=="Completed" ? "selected" : "" ?>>Completed</option>
		<option value="Cancelled" <?= $order['status']=="Cancelled" ? "selected" : "" ?>>Cancelled</option>
	</select>
	<button type="submit" class="btn-update">Update</button>
</form>

<br><br>
<a href="orders.php" class="back-btn">← Back to Orders</a>

<footer>
	<p>&copy; 2025 Hatiey Leaf & Bloom | Admin Dashboard</p>
</footer>

</body>
</html>
