<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Expert Advice | Hatiey Leaf & Bloom</title>
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
	<a href="expert.php" class="active">Expert Advice</a>
	<a href="contact.php">Contact</a>
</nav>
</header>

<!-- SECTION 1: EXPERT CARDS -->
<section class="expert-section">
	<h2>Meet Our Experts</h2>
	<p>Our trusted plant specialists share their best tips to help your greens thrive beautifully!</p>
	
	<div class="expert-container">
		<!-- Expert 1 -->
			<div class="expert-card special-expert">
				<img src="images/expert1.jpg" alt="Expert 1">
			<h3>Madam Norhayati</h3>
			<p>Ain's Mom | Home Gardening Queen</p>
		</div>
		
		<!--Expert 2 -->
		<div class="expert-card special-expert">
			<img src="images/expert2.jpg" alt="Expert 2">
			<h3>Encik Eru</h3>
			<p>Ain's Dad | Soil & Watering Enthusiast</p>
		</div>
		
		<!-- Expert 3 -->
		<div class="expert-card">
			<img src="images/expert3.jpg" alt="Expert 3">
			<h3>Dr.Aisha Greenleaf</h3>
			<p>Indoor plant care & eco-living advocate.</p>
		</div>
		
		<!-- Expert 4 -->
			<div class="expert-card">
				<img src="images/expert4.jpg" alt="Expert 4">
			<h3>Ms. Hana Bloom</h3>
			<p>Light & humidity management expert.</p>
		</div>
	</div>
</section>
	
<!-- SECTION 2: FEATURED ADVICE -->
	<section class="advice-section">
		<h2>Featured Expert Advice</h2>
		
	<div class="advice-grid">
		<div class="advice-box">
			<h3>"Your plants don’t just need sunlight but they need your time."</h3>
			<p>- Madam Norhayati</p>
			<p>My secret is simple: talk to your plants every morning while watering them. Love and care create the healthiest leaves and the happiest blooms.</p>
		</div>
		
		<div class="advice-box">
			<h3>“Every plant deserves patience — just like life.”</h3>
			<p>- Encik Eru</p>
			<p>I always tell Ain, don’t rush your plants. Water them slowly, talk to them kindly, and let them grow at their own pace. Great things take time — even the greenest leaves.</p>
		</div>
		
		<div class="advice-box">
			<h3>“Rotate your pots weekly to balance sunlight.”</h3>
			<p>- Dr. Aisha Greenleaf</p>
			<p>Even sunlight exposure helps your indoor plants grow evenly without leaning toward one side.</p>
		</div>
		
		<div class="advice-box">
			<h3>“Mist your leaves - not drown your roots.”</h3>
			<p>- Ms. Hana Bloom</p>
			<p>Humidity can make or break your plant’s mood! Give them a refreshing mist daily during dry seasons.</p>
		</div>
		</div>
	</section>
	
<!-- SECTION 3: Q&A AREA -->
<section class="qa-section">
    <h2>Ask Our Experts 💬</h2>
    <p>Have a question? Our plant experts are ready to help!</p>

    <div class="qa-form">
        <input type="text" id="userName" placeholder="Your Name" required>
        <textarea id="userQuestion" rows="4" placeholder="Your question..." required></textarea>
        <button onclick="submitQuestion()">Submit Question</button>
    </div>

    <h3>Recent Questions</h3>
    <div id="questionsBox"></div>
</section>
	
<!-- FAMILY GARDEN SECTION -->
	<section class="family-section">
		<h2>From Hatiey's Family Garden</h2>
		
	<div class="family-container">
		<div class="family-card">
			<img src="images/ibu.jpg" alt="Ibu">
			<h3>Madam Norhayati</h3>
			<p>"Gardening is a form of love you can see growing."</p>
		</div>
		
		<div class="family-container">
		<div class="family-card">
			<img src="images/abah.jpg" alt="Abah">
			<h3>Encik Eru</h3>
			<p>"Every leaf teaches patience. Nurture them, and they’ll teach you peace."</p>
		</div>
	</div>
		
		<div class="family-message">
			<p>
				This website was inspired by my parents’ shared love for gardening — my mom’s gentle touch that keeps everything blooming, and my dad’s calm patience that makes every plant thrive.
				<br><br>
				Thank you, Ibu & Abah, for showing me that with care, everything — and everyone — can grow beautifully.
			</p>
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

<script>
function submitQuestion(){
    let name = document.getElementById('userName').value.trim();
    let question = document.getElementById('userQuestion').value.trim();

    if(name === "" || question === ""){
        alert("Please enter your name and question.");
        return;
    }

    const formData = new FormData();
    formData.append("name", name);
    formData.append("question", question);

    fetch("submit_question.php", {
        method: "POST",
        body: formData
    })
    .then(res=>res.text())
    .then(data=>{
        if(data.includes("success")){
            alert("Question submitted!");
            document.getElementById('userName').value = "";
            document.getElementById('userQuestion').value = "";
            loadQuestions();
        } else {
            alert("Database error.");
        }
    });
}

function loadQuestions(){
    fetch("load_questions.php")
        .then(res => res.text())
        .then(data => {
            document.getElementById("questionsBox").innerHTML = data;
        });
}

// Auto refresh every 5s
setInterval(loadQuestions, 5000);
loadQuestions();
</script>
		
</body>
</html>
