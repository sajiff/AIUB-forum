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
	table{
		color:white;
	}
	</style>
	</head>
	<body>
		<div class="header"> 
			<nav>
			       <label><label>
				<ul> 
					<li class="name"><b>AIUB forum</b></li>
					<li><a href="moderator_home.php"> Home </a></li>
					<li><a href="moderator_profile.php"> Profile </a></li>
					<li><a href="moderator_setting.php"> Settings </a></li>
					<li><form method="post" action=""> 
						<input type="submit" value="Log out" name="logout"></form></li>
				</ul>
			</nav>
		</div>
		<section >
		<?php
			$f_name="";
			$l_name="";
			$address="";
			$mobile="";
			$err_mobile="";
			$email="";
			$nid="";
			$dob="";
			$gender="";
			$dep="";
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
	
		<form method ="post" action="" class="center">
				<span><b>Please fill up all the fields </b></span>
				<table align="center">
				<tr>
					<td><label>Name:</label> </td>
					<td><input class="name-text" type="text" name="f_name" value="<?php echo $f_name?>"
				placeholder="Enter First Name" required >
				
				<input class="name-text" type="text" name="l_name" value="<?php echo $l_name?>"
				placeholder="Enter Last Name" required > 
					</td>
				</tr>
				<tr>
					<td><label >Address:</label> </td>
					<td><input class="text" type="text" name="address" value="<?php echo $address?>"
				placeholder="Enter propar address" required >
					</td>
				</tr>
				<tr>
					<td><label >Mobile Number:</label></td>
					<td><input class="text" type="text" name="mobile"  value="<?php echo $mobile?>" <?php echo $err_mobile?>
				placeholder="Enter 11 digits Mobile Number" required >
					</td>
				</tr>
				
				<tr>
					<td><label >E-Mail:</label></td>
					<td><input class="text" type="email" name="email" value="<?php echo $email?>"
					placeholder="xyz@abc.etc">
					</td>
				</tr>
				
				<tr>
					<td><label >NID:</label></td>
					<td><input class="text" type="text" name="nid" value="<?php echo $nid?>"
				placeholder="Enter NID number" required >
					</td>
				</tr>
				
				<tr>
					<td><label >Date of Birth:</label></td>
					<td><input class="text"  type="date"  name="dob" value="<?php echo $dob?>">
					</td>
				</tr>
				<tr>
					<td><label >Gender:</label></td>
					<td>
				<input  type="radio" name="gender" value="male">
				<label for="male">Male</label>
				<input type="radio" name="gender" value="female">
				<label for="female">Female</label>
				<input type="radio" name="gender" value="other">
				<label for="other">Other</label>
					</td>
				</tr>
				<tr>
					<td><label >Department:</label></td>
					<td>
				<input type="radio" name="dep" value="male">
				<label for="male">CSE</label>
				<input type="radio" name="dep" value="female">
				<label for="female">EEE</label>
				<input type="radio" name="dep" value="other">
				<label for="other">BBA</label>
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
				
				</table>

			</form>
		
		</section>
		<div class="footer"> akjfhgakv</div>
	</body>
</html>
