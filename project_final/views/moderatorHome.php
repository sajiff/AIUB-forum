<?php
include '../models/database.php';
include '../controller/commentsController.php';

date_default_timezone_set('Asia/Dhaka');
session_start();
?>

<html lang="en">
	<head>
	<title> AIUB Forum</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="moderatorHomeStyle.css">

	<style>
	button {
	  background-color:Forestgreen;
	  color: White;
	  padding: 12px 16px;
	  margin: 10px;
		border: none;
	  cursor: pointer;
	}

	button:hover {
	  opacity: 0.8;
	}
	textarea{
		background-color: white;
	  padding: 15px;
		font-family: inherit;
		width: 80%;
		height: auto;
	}
	.commentBox{
		background-color: white;
	  padding: 15px;
		font-family: inherit;
		width: 80%;
		height: auto;
		margin-top: 10px;
	}
	.commentBox p{
		font-family: tahoma;
		font-size: 14px;
		line-height: 16px;
		color: black;
		font-weight: 100;
	}

	</style>
	</head>

	<body>

	<div id="header">
	<a id="logo">
	<img class="imge" src="../storage/images/AIUB_whole_logo.png"
	alt="home logo" height="70px" </a> American International University-Bangladesh Forum
	</div>
	<div id="topnav">
		<a href='' href="javascript:void(0)" class="d"> Home</a>
		<a href="#" href="javascript:void(0)" class="c"> Profile </a>
		<a href="#" href="javascript:void(0)" class="c" > Settings </a>

		<a href="../views/logout.php" href="javascript:void(0)" class="b2" > logout </a>
		<form method="">
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

<!-- main code portion-->

	<div class="row">
		<div class="leftSide">
			<div class="leftBox">
				<h2>Post here: </h2>

<?php
                if (!isset($_GET['$a'])) {
                    $_SESSION['id']='';
                    echo "not login";
                } else {
                    $_SESSION['id']=$_GET['$a'];
                    if (isset($_SESSION['id'])) {
                        echo"	<form method='POST' action='".setComments($conn)."'>
 						<input type='hidden' name='uid' value='".$_SESSION['id']."'> </input>
 						<input type='hidden' name='date' value='".date('Y-m-d H:i:s')." '> </input>
 						<textarea name='message'>

 						</textarea><br>
						<div class='btn-group'>
  						<button>Apple</button>
						  <button>Samsung</button>
						  <button>Sony</button>
						</div>

 						<button type='submit' name='submitComment' >Comment</button>
 				</form>";
                    } else {
                        echo "not login";
                    }
                }
                getComments($conn);
?>
			</div>
			<div class="leftBox" style="background-color: #FF6347">
				<h2> also change the shapes etc needed. </h2>
				<h2> will give contents</h2>

			<h2> posts and staff</h2>
			</div>
			<div class="leftBox">
				<h2> Popular posts: </h2>
				<h2> posts</h2>
				<h2> also change the shapes etc needed. </h2>
				<h2> will give contents</h2>

			<h2> posts and staff</h2>
			</div>
		</div>
		<div class="rightSide">
			<div class="rightBox">
				<div class="rightBoxImg">
					<img src="../storage/images/been.jpg" style="width:100%">

					<p>
					</p>
				</div>
			</div>

		<div class="rightBox" style="background-color: Crimson">
				staff
			</div>
			<div class="rightBox">
				some staff
				<h2>staff staff</h2>
			</div>

		</div>


	</div>
	<div class="footer">
			<h4>AIUB Forum</h4>
	</div>
	</body>
</html>
