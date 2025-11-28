<?php
session_start();
if(!isset($_SESSION['cart']) || count($_SESSION['cart'])==0){
    header("Location: cart.php");
    exit;
}
$cart = $_SESSION['cart'];
$total = 0;
foreach($cart as $item) $total += $item['price'] * $item['quantity'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Checkout | Hatiey Leaf & Bloom</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
	
<header>
  <div class="logo-container">
	  <img src="images/logo.png" class="main-logo">
  </div>
	
<nav>
	<a href="index.php">Home</a>
	<a href="shop.php">Products</a>
</nav>
</header>

<section class="checkout-section">
  <h2>Checkout</h2>
  <p>Review your items and enter your details to place the order.</p>

  <table class="cart-table">
    <thead>
		<tr>
			<th>Product</th>
			<th>Quantity</th>
			<th>Price</th>
			<th>Subtotal</th>
		</tr>
	  </thead>
    <tbody>
		
<?php foreach($cart as $item): 
    $subtotal = $item['price'] * $item['quantity'];
?>
    <tr>
      <td><?php echo htmlspecialchars($item['name']); ?></td>
      <td><?php echo $item['quantity']; ?></td>
      <td><?php echo number_format($item['price'],2); ?></td>
      <td><?php echo number_format($subtotal,2); ?></td>
    </tr>
		
<?php endforeach; ?>
		
    </tbody>
  </table>

  <h3>Total: RM<?php echo number_format($total,2); ?></h3>

  <form action="place_order.php" method="post">
    <input type="text" name="customer_name" placeholder="Your name" required>
    <input type="email" name="customer_email" placeholder="Your email" required>
    <button type="submit" class="checkout-btn">Place Order</button>
  </form>
</section>

<footer>
	<p>&copy; 2025 Hatiey Leaf & Bloom. All right reserved.</p>
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
