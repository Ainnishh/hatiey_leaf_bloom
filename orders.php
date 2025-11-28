<?php
session_start();
include "db_connect.php";

$sql = "SELECT * FROM orders ORDER BY order_id DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Messages | Leaf & Bloom</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
	
<header>
	<div class="logo">
		<img src="images/logo.png" class="main-logo">
	</div>
	
<nav>
	<a href="admin.php">Dashboard</a>
	<a href="messages.php" class="active">Messages</a>
	<a href="orders.php">Orders</a>
	<a href="manage_products.php">Manage Products</a>
	<a href="index.php">Logout</a>
</nav>	
</header>
	
	<h1 class="admin-title">Customer Orders</h1>

<table class="orders-table">
    <tr>
		<th>Order ID</th>
        <th>Customer</th>
		<th>Email</th>
        <th>Total</th>
        <th>Status</th>
        <th>Items</th>
        <th>Action</th>
    </tr>
	
	<?php if($result && $result->num_rows > 0): ?>
    <?php while($order = $result->fetch_assoc()): ?>
        
        <tr>
            <td>#<?= htmlspecialchars($order['order_id']); ?></td>
            <td><?= htmlspecialchars($order['customer_name']); ?></td>
            <td><?= htmlspecialchars($order['customer_email']); ?></td>
            <td><?= number_format($order['total'], 2); ?></td>

            <td>
                <span class="status <?= strtolower($order['status']); ?>">
                    <?= htmlspecialchars($order['status']); ?>
                </span>
            </td>

            <td>
                <a href="order_items.php?id=<?= $order['order_id']; ?>" class="btn-view">View</a>
            </td>

            <td>
                <form action="order_update_status.php" method="POST">
                    <input type="hidden" name="order_id" value="<?= $order['order_id']; ?>">

                    <select name="status">
                        <option value="Pending"     <?= $order['status']=="Pending"?"selected":""; ?>>Pending</option>
                        <option value="Processing"  <?= $order['status']=="Processing"?"selected":""; ?>>Processing</option>
                        <option value="Completed"   <?= $order['status']=="Completed"?"selected":""; ?>>Completed</option>
                        <option value="Cancelled"   <?= $order['status']=="Cancelled"?"selected":""; ?>>Cancelled</option>
                    </select>

                    <button type="submit" class="btn-update">Update</button>
                </form>
            </td>
        </tr>
    <?php endwhile; ?>

<?php else: ?>
    <tr>
        <td colspan="7" style="text-align:center;">No orders found.</td>
    </tr>
<?php endif; 
?>
 
</table>

<footer>
	<p>&copy; 2025 Hatiey Leaf & Bloom | Admin Dashboard</p>
</footer>

</body>
</html>
