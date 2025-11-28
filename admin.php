<?php
session_start();

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Dashboard | Leaf & Bloom</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
	
<header>
	<div class="logo">
		<img src="images/logo.png" class="main-logo">
	</div>
	
<nav>
	<a href="admin.php" class="active">Dashboard</a>
	<a href="messages.php">Messages</a>
	<a href="orders.php">Orders</a>
	<a href="manage_products.php">Manage Products</a>
	<a href="index.php" class="logout-btn">Logout</a>
</nav>	
</header>
	
<section class="admin-dashboard">
	<h2>Admin Dashboard</h2>
	<p class="admin-intro">Welcome back, Admin! Manage your plant shop efficiently with the tools below</p>
	
	<div class="admin-menu">
		<a href="messages.php" class="admin-card">
			<h3>📩 Messages</h3>
			<p>View all customer messages.</p>
		</a>
		
		<a href="orders.php" class="admin-card">
			<h3>🛒 Orders</h3>
			<p>See customer checkout orders.</p>
		</a>
		
		<a href="manage_products.php" class="admin-card">
			<h3>🌱 Manage Products</h3>
			<p>Edit, add or remove products.</p>
		</a>
	</div>
</section>

<footer>
	<p>&copy; 2025 Hatiey Leaf & Bloom | Admin Dashboard</p>
</footer>
	
</body>
</html>
