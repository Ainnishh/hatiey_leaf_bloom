<?php
include 'db_connect.php';

$result = mysqli_query($conn, "SELECT * FROM contact_messages ORDER BY created_at DESC");
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
	
<h1 class="admin-title">Customer Messages</h1>
	
<div class="message-list">
<?php
	if(mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)){
        echo "<div class='message-card'>
                <h3>".htmlspecialchars($row['name'])."</h3>
                <p><strong>Email:</strong> ".htmlspecialchars($row['email'])."</p>
                <p>".htmlspecialchars($row['message'])."</p>
                <p><small>Sent at: ".$row['created_at']."</small></p>
              </div>";
    }
} else {
    echo "<p style='text-align:center;color:#555;'>No messages yet.</p>";
}
?>
</div>
	
<footer>
	<p>&copy; 2025 Hatiey Leaf & Bloom | Admin Dashboard</p>
</footer>

</body>
</html>
