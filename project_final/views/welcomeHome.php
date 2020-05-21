<html lang="en">
	<head>
	<title> AIUB Forum</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="welcomeHomeStyle.css">
	</head>
	<body>

	<div id="header">
	<a id="logo">
	<img class="imge" src="../storage/images/AIUB_whole_logo.png"
	alt="home logo" height="70px" </a> American International University-Bangladesh Forum
	</div>


	<div id="topnav">
		<a class="b2" href="javascript:void(0)" href=""><b>Sign Up</b></a>
		<a class="b1" href="login.php" href="javascript:void(0)" ><b>Login<b></a>

		<form>
		<input type="text" name="search" placeholder="Search..">
		</form>

	</div>

	<script>
window.onscroll = function() {myFunction()};

var navbar = document.getElementById("topnav");
var sticky = topnav.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky) {
    topnav.classList.add("sticky")
  } else {
    topnav.classList.remove("sticky");
  }
}
</script>
	<br>

	<div class="slideshow">
		<div class="Slides fade">
			<div class="numbertext">1 / 4</div>
			<img class="imgs" src="../storage/images/aiub1.jpg" style="width:100%">
			<div class="captiontext">Text Here</div>
		</div>
		<div class="Slides fade">
			<div class="numbertext">2 / 4</div>
			<img class="imgs" src="../storage/images/aiub2.jpg" style="width:100%">
			<div class="captiontext">Text Here</div>
		</div>
		<div class="Slides fade">
			<div class="numbertext">3 / 4</div>
			<img class="imgs" src="../storage/images/community1.jpg" style="width:100%">
			<div class="captiontext">Text Here</div>
		</div>
		<div class="Slides fade">
			<div class="numbertext">4 / 4</div>
			<img class="imgs" src="../storage/images/aiub3.jpg" style="width:100%">
			<div class="captiontext">Text Here</div>
		</div>

	</div>
<br>
<div style="text-align:center">
  <span class="dot" ></span>
  <span class="dot" ></span>
  <span class="dot" ></span>
  <span class="dot" ></span>
</div>


<br>
<br>
	<script>
	/* else where i put didnotproper */
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("Slides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}

</script>

	<div class="row">
		<div class="leftSide" >
			<div class="leftBox" style="background-color: Tomato">
				<h2> posts</h2>
				<h2> posts</h2>
				<h2> posts</h2>
				<h2> posts</h2>
			</div>
		</div>

		<div class="rightSide">
			<div class="rightBox">
				<h2> side item</h2>

			</div>
		</div>

	</div>

	<div class="footer">
			<h4>AIUB Forum</h4>
	</div>
	</body>
</html>
