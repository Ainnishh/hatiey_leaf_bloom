<?php
session_start();
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
$total = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Your Cart | Hatiey Leaf & Bloom</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
	
	<header>
		<div class="logo-container">
			<img src="images/logo.png" alt="Hatiey Leaf & Bloom Logo" class="main-logo">
			<h1>Hatiey Leaf & Bloom</h1>
			<p>"Your green journey continues here"</p>
		</div>
		
<nav>
	<a href="index.php">Home</a>
	<a href="shop.php" class="active">Products</a>
	<a href="plantcare.php">Plant Care Tips</a>
	<a href="expert.php">Expert Advice</a>
	<a href="contact.php">Contact</a>
</nav>
		
<div class="cart-icon">
	🛒 <span id="cart-count"><?php echo count($cart); ?></span>
</div>
</header>
	
<section class="cart-section">
	<h2>Your Shopping Cart</h2>
	<p>Review your selected items before checking out.</p>
	
	<div class="cart-container">
		<table class="cart-table">
			<thead>
				<tr>
					<th>Product</th>
					<th>Quantity</th>
					<th>Price(RM)</th>
					<th>Subtotal (RM)</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				
				<?php
				if(count($cart) > 0) {
					foreach($cart as $index => $item) {
    
						$subtotal = $item['price'] * $item['quantity'];
						$total += $subtotal;
						echo "<tr>
						<td>".htmlspecialchars($item['name'])."</td>
						
						<td>{$item['quantity']}</td>
						<td>".number_format($item['price'],2)."</td>
						<td>".number_format($subtotal,2)."</td>
						<td><a href='remove_from_cart.php?index={$index}' class='remove-btn'>Remove</a></td>
						</tr>";
					}
				} else {
					echo "<tr><td colspan='5'>Your cart is empty</td></tr>";
				}
				?>
				
			</tbody>
		</table>
		
		<div class="cart-summary">
			<h3>Total: RM<?php echo number_format($total,2); ?></h3>
			<?php if(count($cart)>0): ?>
			<a href="checkout.php"><button class="checkout-btn">Proceed to Checkout</button></a>
			<?php endif; ?>
		</div>
	</div>
</section>

<footer>
	<p>&copy; 2025 Hatiey Leaf & Bloom. All rights reserved.</p>
</footer>
	
<audio id="bgmusic" autoplay loop muted>
	<source src="music/bgmusic.mp3" type="audio/mpeg">
	Your browser does not support the audio element.
</audio>

<script>
	document.addEventListener('click', function() {
		var audio= document.getElementById('bgmusic');
		audio.muted= false;
		audio.play();
	});
</script>
	
</body>
</html>
