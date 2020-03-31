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
		form{
			border: 2px solid DarkSlateBlue ;
			width: 650px;
			padding: 20px;
			background: GhostWhite;
			
		}
	</style>
	</head>
	<body>
		<div class="header">
			<nav>
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
		<?php
			$f_name="";
			$l_name="";
			$email="";
			$pass="";
			
			$has_err=false;
			
			if(isset($_POST['submit']))
			{
				if(empty($_POST['mobile']))
				{
					$has_err=true;
				}else if(preg_match('/^[0-9]{11}+$/', $_POST['mobile']))
				{
					$mobile=htmlspecialchars($_POST['mobile']);
				}
				else
				{
					$err_mobile="invalid  mobile number";
				}
				
			}
			?>
		<section>
		<form method ="post" action="" class="center">
				<table align="center">
				<tr>
					<td><label>New Name:</label> </td>
					<td><input class="name-text" type="text" name="f_name" value="<?php echo $f_name?>"
				placeholder="Enter First Name" required >
				
				<input class="name-text" type="text" name="l_name" value="<?php echo $l_name?>"
				placeholder="Enter Last Name" required > 
					</td>
				</tr>
				<tr>
					<td><label >New E-Mail:</label></td>
					<td><input class="text" type="email" name="email" value="<?php echo $email?>"
					placeholder="xyz@abc.etc">
					</td>
				</tr>
				<tr>
					<td><label >Password:</label></td>
					<td><input class="text" type="password"  name="pass" value="<?php echo $pass?>"
				placeholder="Password for login" required >
				</td>
				</tr>
				<tr>
					<td colspan="2" align="center">
						<input type="submit" name="submit" value="Submit">
					</td>
				</tr>
			</form>
			</section>
	</body>
</html>
