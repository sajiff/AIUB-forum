<?php 
			$uname="";
			$uname_err="";
			
			$pass="";
			$pass_err="";
			
			$has_err=false;
			
			if(isset($_POST['login']))
			{
				if(empty($_POST['uname']))
				{
					$has_err=true;
				}else
				{
					$uname=htmlspecialchars($_POST['uname']);
				}
				
				if(empty($_POST['pass']))
				{
					$has_err=true;
				}
				else
				{
					$pass=htmlspecialchars($_POST['pass']);
				}
			}
			
			if(!$has_err)
			{
				if ($uname=="moderator" && $pass=="12345"){
					setcookie("userlogin",$uname,time()+86400);
					header("Location:moderator_home.php");
				}
				else if($uname=="admin" && $pass=="12345"){
					setcookie("userlogin",$uname,time()+86400);
					header("Location:admin_home.php");
				}
				else if($uname=="user1" && $pass=="12345"){
					setcookie("userlogin",$uname,time()+86400);
					header("Location:user_home.php");
				}
				else{
					$uname="";
					$pass="";
				}
				
			}
			
			
		?>


<!DOCTYPE html>
<html> 
<head> 
<title> AIUB Forum </title>

<style>



#logo {
border: none;
margin-right : 20px;
margin-left : 20px;
}
img {
  vertical-align: middle;
  margin-right : 20px;
}


#header {
color: black;
background-color: white;
text-decoration: none;
font-family:georgia;
padding:10px;
text-align: justify;
text-justify: inter-word;
font-size: 24px;

}

.frame{
			padding: 16px ;
			margin:  20px 10px;
		}
		input{
			padding: 16px 20px;
			margin:8px;
			border: none;
			border-bottom: 2px solid DarkSlateBlue;
			width:95%;
		}
		body{
			font-family:Tahoma;
			background-image:url("images.jfif");
			background-size:100%;
		}
		form{
			
			width: 360px;
			height: 460px;
			background: GhostWhite;
			box-shadow: 5px 5px #888888;
		}
		button {
			background-color:DarkSlateBlue;
			color: White;
			padding: 16px 20px;
			margin: 10px;
			border: ash;
			cursor: pointer;
			width: 95%;
		}

		button:hover {
			opacity: 0.8;
			
		}
		.center {
				margin: auto;
				width: 360px;
				padding: 10px;
				margin-top: 100px;
				margin-bottom: 100px;
			}
		.s1{
			text-align: center;
			font-size: 200%;
			padding-top:30px;
		}
		.s2{
			text-align: center;
			font-size: 100%;
			padding-top:10px;
		}





</style>

</head>
<body> 

<div id="header">
<a id="logo">
<img src="AIUB_whole_logo.png"
alt="home logo" height="70px" </a> American International University-Bangladesh Forum 
</div>

 
<div class="center">
		<form method="post" action="" class="center">
			<div class="s1">
			<span ><b>AIUB Forum</b></span> 
			</div>
			<div class="s2">
			<span >Join, Share and Discuss</span> 
			</div>
			<div class="frame">
			
			<span><b>Sign In</b></span> 
			<input type="text" name="uname" value="<?php echo $uname; ?>" 
			placeholder="User Name:" required >
			
			
			<input type="password" name="pass" value="<?php echo $pass; ?>"
			placeholder="Password:" required >
				
			<button type="submit" name="login"> Login </button>	
			<span >Don't have account? <b><a href="user_reg.php">Register </a></b></span>
			</div>
			
		</div>
		</form>


</body>

</html>




</html>