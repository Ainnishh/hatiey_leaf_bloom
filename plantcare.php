<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Plant Care Tips | Hatiey Leaf & Bloom</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	
<header>
	<div class="logo-container">
		<img src="images/logo.png" alt="Hatiey Leaf & Bloom Logo" class="main-logo">
	    <h1>Hatiey Leaf & Bloom</h1>
		<p>"Nurture your plants, nurture your soul."</p>
	</div>
	
<nav>
	<a href="index.php">Home</a>
	<a href="shop.php">Products</a>
	<a href="plantcare.php" class="active">Plant Care Tips</a>
	<a href="expert.php">Expert Advice</a>
	<a href="contact.php">Contact</a>
</nav>
</header>
	
<section class="tips-section">
	<h2>Plant Care Tips for a Greener Life</h2>
	<p>Learn how to keep your plants healthy, happy and thriving with these simple yet effective tips!</p>
	
	<div class="tips-grid">
		<div class="tip-card">
			<img src="images/tip1.jpeg" alt="Watering Plants">
		    <h3>1. Watering Schedule</h3>
		    <p>Water your plants early in the morning to allow proper absorption and prevent fungal growth.</p>
			<button class="read-more-btn" onclick="openModal('modal1')">Read More</button>
		</div>
		
		<div class="tip-card">
			<img src="images/tip2.jpeg" alt="Sunlight">
			<h3>2. Light Exposure</h3>
			<p>Most indoor plants love bright, indirect light. Avoid direct sunlight as it can burn their leaves.</p>
			<button class="read-more-btn" onclick="openModal('modal2')">Read More</button>
		</div>
		
		<div class="tip-card">
			<img src="images/tip3.png" alt="Soil Care">
			<h3>3. Soil Health</h3>
			<p>Use well-draining soil to prevent water logging. Mix compost to keep nutrients rich and balanced.</p>
			<button class="read-more-btn" onclick="openModal('modal3')">Read More</button>
		</div>
		
		<div class="tip-card">
			<img src="images/tip4.jpg" alt="Pruning">
			<h3>4. Regular Pruning</h3>
			<p>Trim dead leaves or stems regularly to help your plant focus energy on new growth.</p>
			<button class="read-more-btn" onclick="openModal('modal4')">Read More</button>
		</div>
		
		<div class="tip-card">
			<img src="images/tip5.jpg" alt="Fertilizing">
			<h3>5. Fertilizing Routine</h3>
			<p>Feed your plants with organic fertilizer every 4-6 weeks during their active growing season.</p>
			<button class="read-more-btn" onclick="openModal('modal5')">Read More</button>
		</div>
		
		<div class="tip-card">
			<img src="images/tip6.jpeg" alt="Repotting">
			<h3>6. Repotting</h3>
			<p>Repot your plants once a year to refresh the soil and give roots more room to grow.</p>
			<button class="read-more-btn" onclick="openModal('modal6')">Read More</button>
		</div>
	</div>
</section>
	
<!-- MODALS SECTION -->
<div id="modal1" class="modal">
	<div class="modal-content">
		<span class="close" onclick="closeModal('modal1')">&times;</span>
		<h3>1. Watering Schedule</h3>
		<p>Every plant has its own rhythm and watering is where it all begins. Always check the soil before watering. If the top 2 inches feel dry, your plant's probably thirsty. Avoid watering daily unless the weather is very hot. Morning watering is the best because it gives your plant time to soak up the moisture before the sun gets strong. Remember, it's always better to <em>underwater</em> than overwater. Roots need air too!</p>
		<video width="100%" controls>
			<source src="video/vp1.mp4" type="video/mp4">
			Your browser does not support the video tag.
		</video>
	</div>
</div>
	
<div id="modal2" class="modal">
	<div class="modal-content">
		<span class="close" onclick="closeModal('modal2')">&times;</span>
		<h3>2. Light Exposure</h3>
		<p>Just like us, plants love sunshine but not all of them enjoy the same amount. Indoor plants such as Monstera and Snake Plant prefer bright but indirect light. Too much direct sun can burn their leaves, leaving brown patches. If your room doesn’t get enough natural light, you can use grow lights for 6–8 hours daily. Rotate your plants every week so all sides get equal sunlight. They will grow evenly and look happier!</p>
		<video width="100%" controls>
			<source src="video/vp2.mp4" type="video/mp4">
			Your browser does not support the video tag.
		</video>
	</div>
</div>
	
<div id="modal3" class="modal">
	<div class="modal-content">
		<span class="close" onclick="closeModal('modal3')">&times;</span>
		<h3>3. Soil Health</h3>
		<p>Healthy soil is like a good meal for your plant. It gives nutrients, air, and a comfy place for roots to grow. Use a soil mix that drains well like a combination of garden soil, compost, and perlite is perfect for most houseplants. If the soil looks compact or has a bad smell, it’s time to refresh it. Add organic compost every few months to boost nutrients. Remember: happy roots = happy plants!</p>
		<video width="100%" controls>
			<source src="video/vp3.mp4" type="video/mp4">
			Your browser does not support the video tag.
		</video>
	</div>
</div>
	
<div id="modal4" class="modal">
	<div class="modal-content">
		<span class="close" onclick="closeModal('modal4')">&times;</span>
		<h3>4. Regular Pruning</h3>
		<p>Trimming might sound scary, but it’s like giving your plant a haircut. Remove yellow or damaged leaves to let the plant focus on healthy growth. Use clean scissors or pruning shears and please don’t tear with your hands. For vining plants, prune long stems to make them bushier. Regular pruning also helps air circulation and prevents pests. Bonus: it keeps your plant looking neat and fabulous!</p>
		<video width="100%" controls>
			<source src="video/v4.mp4" type="video/mp4">
			Your browser does not support the video tag.
		</video>
	</div>
</div>
	
<div id="modal5" class="modal">
	<div class="modal-content">
		<span class="close" onclick="closeModal('modal5')">&times;</span>
		<h3>5. Fertilizing Routine</h3>
		<p>Fertilizer is like vitamins for your plants. During the growing seasons (spring and summer), feed your plants every 4–6 weeks using a balanced organic fertilizer. Liquid fertilizers are great because they absorb quickly. But during autumn and winter, your plants rest so skip the feeding. Overfertilizing can actually harm roots, so follow the recommended amount on the label. A little love goes a long way.</p>
		<video width="100%" controls>
			<source src="video/v5.mp4" type="video/mp4">
			Your browser does not support the video tag.
		</video>
	</div>
</div>
	
<div id="modal6" class="modal">
	<div class="modal-content">
	<span class="close" onclick="closeModal('modal6')">&times;</span>
		<h3>6. Repotting</h3>
		<p>Repotting gives your plants a fresh start! Do this once a year or when roots start peeking out from the pot’s bottom. Choose a new pot that’s just 1–2 inches bigger but not too big, or the soil will stay wet for too long. Gently loosen the roots before placing them into the new pot with fresh soil. Water lightly afterward and give your plant a few days to adjust. Soon, it’ll thank you with new, happy leaves.</p>
		<video width="100%" controls>
      <source src="video/v6.mp4" type="video/mp4">
      Your browser does not support the video tag.
    </video>
	</div>
</div>
	
<script>
	function openModal(id) {
    const modal = document.getElementById(id);
    if(modal) {
        modal.style.display = "block";
        const video = modal.querySelector("video");
        if(video) {
            video.currentTime = 0; // mula dari awal
            video.play();          // main video
        }
    }
}

function closeModal(id) {
    const modal = document.getElementById(id);
    if(modal) {
        modal.style.display = "none";
        const video = modal.querySelector("video");
        if(video) {
            video.pause();          // pause video
            video.currentTime = 0;  // reset balik ke awal
        }
    }
}

window.onclick = function(event) {
    const modals = document.querySelectorAll(".modal");
    modals.forEach(modal => {
        if(event.target === modal){
            modal.style.display = "none";
            const video = modal.querySelector("video");
            if(video){
                video.pause();
                video.currentTime = 0;
            }
        }
    });
};

document.addEventListener('keydown', function(event){
    if(event.key === "Escape"){
        const modals = document.querySelectorAll(".modal");
        modals.forEach(modal => {
            if(modal.style.display === "block"){
                modal.style.display = "none";
                const video = modal.querySelector("video");
                if(video){
                    video.pause();
                    video.currentTime = 0;
                }
            }
        });
    }
});

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
