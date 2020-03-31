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
	</head>
	<body>
		<div class="header">
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
			Name: <br>
			Email: moderator@gmail.com <br><br>
			Mobile: <br>
			Date of birth:  <br>
			Gender: <br>
			Department: CSE <br>

</section>
		<section> fdgdfg</section>
		<div class="footer"> akjfhgakv</div>
	</body>
</html>
