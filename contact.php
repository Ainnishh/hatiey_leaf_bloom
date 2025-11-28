<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Contact | Hatiey Leaf & Bloom</title>
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
	<a href="shop.php">Products</a>
	<a href="plantcare.php">Plant Care Tips</a>
	<a href="expert.php">Expert Advice</a>
	<a href="contact.php" class="active">Contact</a>
</nav>
</header>
	
<!-- CONTACT SECTION -->
<section class="contact-section">
	<h2>Get in Touch</h2>
	<p>We'd love to hear from you! Wether you have a question, feedback, or just want to say hi - reach out below</p>
	
	<div class="contact-container">
		<form action="submit_contact.php" method="post" class="contact-form">
			<input type="text" name="name" placeholder="Your Name" required>
			<input type="email" name="email" placeholder="Your Email" required>
			<textarea name="message" rows="5" placeholder="Your Message" required></textarea>
			<button type="submit">Send Message</button>
		</form>
		
		<div class="contact-info">
			<h3>Contact Info</h3>
			<p><strong>Email:</strong> hatieyleafbloom@gmail.com</p>
			<p><strong>Phone:</strong> +60 16-435 5077</p>
			<p><strong>Address:</strong> Hatiey's Garden Hub, Kemaman, Terenganu, Malaysia</p>
			
		<div class="social-icons">
			<a href="#"><img src="images/facebook.png" alt="Facebook"></a>
			<a href="#"><img src="images/instagram.png" alt="Instagram"></a>
			<a href="#"><img src="images/thread.png" alt="Thread"></a>
		</div>
	</div>
</div>	
</section>

<!-- FOOTER -->
<footer>
	<p>&copy; 2025 Hatiey Leaf & Bloom. All Rights Reserved</p>
</footer>
	
<!-- THANK YOU POPUP -->
<div id="notification" class="notification">Message sent succesfully!
</div>
	
<script>
const form = document.querySelector(".contact-form");
const notification = document.getElementById("notification");

form.addEventListener("submit", function(event) {
    event.preventDefault();
    
    const formData = new FormData(form);

    fetch('submit_contact.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if(data.success){
            notification.style.display = "block";
            notification.style.opacity = "1";
            form.reset();
            setTimeout(() => {
                notification.style.opacity = "0";
                setTimeout(() => {
                    notification.style.display = "none";
                }, 500);
            }, 3000);
        } else {
            alert("Failed to send message: " + data.error);
        }
    });
});
</script>
	
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
