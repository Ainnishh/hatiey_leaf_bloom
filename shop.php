<?php
session_start();
include "db_connect.php"; // connect ke database

// Ambil semua produk terbaru dari DB
$products_query = mysqli_query($conn, "SELECT * FROM products ORDER BY id DESC");

$products = [];
while($row = mysqli_fetch_assoc($products_query)){
    $products[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Our Products | Hatiey Leaf & Bloom</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	
<header>
	<div class="logo-container">
		<img src="images/logo.png" alt="Hatiey Leaf & Bloom Logo" class="main-logo">
		<h1>Hatiey Leaf & Bloom</h1>
		<p>"Your one-stop gardening and plant care portal."</p>
	</div>
	
<nav>
	<a href="index.php">Home</a>
	<a href="shop.php" class="active">Products</a>
	<a href="plantcare.php">Plant Care Tips</a>
	<a href="expert.php">Expert Advice</a>
	<a href="contact.php">Contact</a>
</nav>
	
<!-- CART ICON -->
<div class="cart-icon">
  <a href="cart.php" style="text-decoration:none;color:#a6e6b1;">
    🛒 <span id="cart-count"><?php echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0; ?></span>
  </a>
</div>
</header>

<section class="product-section">
  <h2>Our Trendy Plants :</h2>
  <p>Discover our curated selection of houseplants that are perfect for beginners and plant lovers alike!</p>
	
<div class="product-grid">
<?php
foreach($products as $p){
  echo '<div class="product-card">
          <img src="'.$p['image'].'" alt="'.htmlspecialchars($p['name']).'">
          <h3>'.htmlspecialchars($p['name']).'</h3>
          <p>RM '.number_format($p['price'],2).'</p>
          <button class="add-to-cart-btn" onclick="addedToCart('.$p['id'].')">Add to Cart</button>
        </div>';
}
?>
</div>
</section>
	
<script>
function addedToCart(id){
    // send id to add_to_cart.php
    fetch('add_to_cart.php', {
        method: 'POST',
        headers: {'Accept':'application/json'},
        body: new URLSearchParams({ id: id })
    })
    .then(res => res.json())
    .then(data => {
        if(data.success){
            // update counter
            document.getElementById('cart-count').innerText = data.cart_count;
            // small popup
            const msg = document.createElement('div');
            msg.innerText = data.product_name + " has been added to your cart!";
            msg.style.position='fixed';
            msg.style.bottom='30px';
            msg.style.left='50%';
            msg.style.transform='translateX(-50%)';
            msg.style.background='#23422d';
            msg.style.color='#a6e6b1';
            msg.style.padding='10px 18px';
            msg.style.borderRadius='20px';
            msg.style.boxShadow='0 0 20px rgba(166,230,177,0.6)';
            msg.style.zIndex='9999';
            msg.style.opacity='0';
            msg.style.transition='opacity .3s';
            document.body.appendChild(msg);
            setTimeout(()=>msg.style.opacity='1',100);
            setTimeout(()=>{ msg.style.opacity='0'; setTimeout(()=>msg.remove(),400); },2200);
        } else {
            alert('Error adding to cart');
        }
    })
    .catch(err => {
        console.error(err);
        alert('Network error');
    });
}
</script>
	
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
