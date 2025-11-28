<?php
include 'db_connect.php';

if(!isset($_GET['order_id'])){
    header("Location: shop.php");
    exit;
}

$order_id = intval($_GET['order_id']);

// get order
$stmt = $conn->prepare("SELECT * FROM orders WHERE id=? LIMIT 1");
$stmt->bind_param("i", $order_id);
$stmt->execute();
$order = $stmt->get_result()->fetch_assoc();
$stmt->close();

if(!$order){
    header("Location: shop.php");
    exit;
}

// get items
$stmt2 = $conn->prepare("SELECT * FROM order_items WHERE order_id=?");
$stmt2->bind_param("i", $order_id);
$stmt2->execute();
$items = $stmt2->get_result();
$stmt2->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Order Successful</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<h2>Thank You For Your Order!</h2>

<div class="order-box" style="max-width:600px;margin:auto;">
    <p><strong>Order ID:</strong> <?php echo $order['id']; ?></p>
    <p><strong>Name:</strong> <?php echo $order['customer_name']; ?></p>
    <p><strong>Email:</strong> <?php echo $order['customer_email']; ?></p>
    <p><strong>Total Paid:</strong> RM <?php echo $order['total']; ?></p>
</div>

<h3 style="text-align:center;">Purchased Items</h3>
<div style="max-width:600px;margin:auto;">
    <ul>
        <?php while($it = $items->fetch_assoc()): ?>
            <li>
                <?php echo $it['product_name']; ?> 
                (<?php echo $it['quantity']; ?>) — RM<?php echo $it['price']; ?>
            </li>
        <?php endwhile; ?>
    </ul>
</div>

<br><br>
<a href="shop.php" style="text-align:center;display:block;">Continue Shopping</a>
	
<footer>
	<p>&copy; 2025 Hatiey Leaf & Bloom. All rights reserved.</p>
</footer>

</body>
</html>
