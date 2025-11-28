<!DOCTYPE html>
<html lang="en">
<head>

<!--Custom Fonts-->
<link href="https//fonts.googleapis.com/css2?family=Agbalumo&family=Cranberry&family=Scripter&display=swap" rel="stylesheet">

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Hatiey Leaf & Bloom</title>
<link rel="stylesheet" href="css/style.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<body>
	
<!--HEADER-->
<header>
	<div class="logo-container">
	<img src="images/logo.png" alt="Hatiey Leaf & Bloom Logo" class="main-logo">
	</div>
	
	<h1>Hatiey Leaf & Bloom</h1>
	<p>"Your one-stop gardening and plant care portal."</p>

<nav>
	<a href="index.php" class="active">Home</a>
	<a href="shop.php">Products</a>
	<a href="plantcare.php">Plant Care Tips</a>
	<a href="expert.php">Expert Advice</a>
	<a href="contact.php">Contact</a>
	<a href="admin_login.php" class="admin-btn">Login Admin</a>
</nav>
</header>
	
<!--HERO SECTION-->
<section class="hero">
<div class="hero-text">
	<h2>Grow with Love</h2>
	<p>Discover the beauty of gardening and bring nature closer to your home.</p>
	<a href="shop.php" class="shop-now">Shop Now</a>
</div>
</section>
	
<!--MAIN CONTENT SECTION-->
<section class="main-section">
	
<!--LEFT SIDE: Features-->
	<div class="features">
	<div class="feature">
	<img src="images/tools.jpg" alt="Gardening Tools" width="90%">
	<h3>Suitable Tools</h3>
	<p>High-quality gardening tools for beginners and experts alike.</p>
</div>
	
<div class="feature">
	<img src="images/plantcare.jpg" alt="Plant Care">
	<h3>Plant Care Tips</h3>
	<p>Learn how to care for your plants through our expert articles.</p>
</div>
	
<div class="feature">
	<img src="images/advice.jpg" alt="Customer Support">
	<h3>Expert Advice</h3>
	<p>Submit your plant-related questions and get answers from our team!</p>
</div>
</div>
	
<!--RIGHT SIDE: About Section-->
<aside class="about">
	<h2>About Hatiey Leaf & Bloom</h2>
	<p>
		Hye plant lover!
	</p>
	<p>
		You've just stepped into Hatiey Leaf & Bloom, the cozy little corner where nature meets happiness.
	</p>
	<p>
		We believe that every leaf tells a story and every plant brings calm to your space. Whether you're someone who just started planting your first basil, or a proud collector of indoor greens, our mission is to make plant care simple, enjoyable and accessible to all. 
	</p>
	<p>Here, what you’ll find at Hatiey Leaf & Bloom :</p>
		
	<ol>
	<li> Simple care tips that actually work.</li>
	<li> Suitable gardening tools.</li>
	<li> Expert advice to keep your plants smiling!</li>
	</ol>
	<p>
		Sip some tea, scroll around and let nature inspire your day, one leaf at a time!
	</p>
</aside>
</section>

<!--FOOTER-->
<footer>
	<p>&copy; 2025 Hatiey Leaf & Bloom | Designed by chewandanishh</p>
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
