<?php
	
	if(!isset($_COOKIE['userlogin']))
	{
		header("Location:login.php");
	}
	if(isset($_POST['logout']))
	{
		setcookie("userlogin","",time()-60);
		header("Location:home.php");
		
	}
?>
<html>
	<head>
	<link rel="stylesheet" href="Style_Shit.css">
	<style>
	
	</style>
	</head>
	<body>
	 <?php
	
	$post="";
	$err_post="";
	
	if(isset($_POST['postbtn']))
	{	
		if(empty($_POST['post']))
		{
			$err_post="*Post cannot be empty";
		}
		else
		{
			$post=$_POST['post'];
			echo $post;
		}
	}
?>

		<div class="header"> 
			<nav>
			       <label><label>
				<ul> 
					<li class="name"><b>AIUB forum</b></li>
					<li><a href="moderator_home.php"> Home </a></li>
					<li><a href="moderator_profile.php"> Profile </a></li>
					<li><a href="moderator_setting.php"> Settings </a></li>
					<li><a href="moderator_reg.php">Add Moderator </a></li>
					<li><form method="post" action=""> 
						<input type="submit" value="Log out" name="logout"></form></li>
				</ul>
			</nav>
		</div>
		<section>
			<h2> Create a post </h2>

			<form method="post" action="" >

			<input type="text" value="<?php echo $post;?>" name="post" class="post" placeholder="What's on your mind,?"> <br> 
			<?php echo $err_post;?>

			<input type="submit" value="Post" name="postbtn" class="postbtn">
		</section>
		<div class="footer"> akjfhgakv</div>
	</body>
</html>
