<html>
	<head>
	<meta charset="utf-8">
	<style>
		* {
		box-sizing: border-box;
		}
		.content {
			
			margin-top: 20px;
			margin-left: 240px;
			padding-left: 320px;
			padding-top: 100px;
			padding-bottom: 180px;
			background-color: yellow;
			
			
		}
		.header{
			text-align: center;
			background-color: skyBlue;
			border: 1px solid black;
			padding: 30px;
		}
	
		form{
			border: 2px DarkSlateBlue ;
			width: 650px;
			padding: 20px;
			background: GhostWhite;
			border: 1px solid black;
			
		}
		.text{
			border: none;
			border-bottom: 2px solid DarkSlateBlue;
			border-left: 2px solid DarkSlateBlue;
			width:80%;
			padding: 10px 15px;
			margin: 5px;
		}
		.name-text{
			border: none;
			border-bottom: 2px solid DarkSlateBlue;
			border-left: 2px solid DarkSlateBlue;
			width:40%;
			padding: 10px 15px;
			margin: 5px;
		}
		.sidenav {
			height: 100%;
			width: 220px;
			position: fixed;
			top: 170px;
			left: 10px;
			background-color: gray;
			margin-left: 200px;
			
		}
		a{
			color: white;
			padding: 16px;
			text-decoration: none;
			display: block;
			text-align:center;
		}
		.sidenav a:hover {
			background-color: #ddd;
			color: black;
		}
		body{
			font-family:Tahoma;
			margin-left: 200px;
			margin-right: 200px;
		}
		
	</style>
	</head>
	<body>
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
		
		<div class="header">
			<h1>Aiub forum</h1>
		</div>
		<div class="sidenav">
				<a href="#">Home</a>	
				<a href="#">Profile</a>
				<a href="#">About</a>
				</div>
		<div class="content">
			<form method ="post" action="">
				<span>please fill up all the fields </span>
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
		</div>
	</body>
</html>