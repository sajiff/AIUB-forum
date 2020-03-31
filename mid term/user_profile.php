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

<!DOCTYPE html> 
<html>
<head>
	<title> Profile </title>


<style>

body {
margin : 0;
background-image: url("AiubPermanentCampus_7.jpg");
background-color: #C4DBF6; 
  height: 670px; 
  background-position: center; 
  background-repeat: no-repeat; 
  background-size: cover; 
}

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

#header ul {
	margin: 0;
	padding: 0;
	display: inline-block;
	
}

#header ul li {
	margin-right: 20px;
	display: inline-block; 
	
}

#header a{
	color: black;
	font-family: calibri;
	text-decoration: none;
	
}

#main {
	padding:10px;
}

#menu-right {
	float: right;
	
}

.logout {
	height:40px;
    width:70px;
	border-radius: 12px;
	position:absolute;
	transition: .5s ease;
	left: 1750px;
	top: 30px;
}

.logout:hover {
  background-color: #D31A2C;
  color: white;
} 

#home {
position:absolute;
transition: .5s ease;
left: 1400px;
top: 30px;
text-shadow: 2px 2px 4px #000000;
}

#profile {
position:absolute;
transition: .5s ease;
left: 1520px;
top: 30px;
text-shadow: 2px 2px 4px #000000;
}

#settings {
position:absolute;
transition: .5s ease;
left: 1600px;
top: 30px;
text-shadow: 2px 2px 4px #000000;
}

#info {
	color: white;
	padding: 10px;
	font-family: Calibri;
	font-size: 24px;
	position:absolute;
	transition: .5s ease;
	top: 200px;
	left: 600px;
}

</style>
</head>
<body> 

<div id="header">

<a id="logo">
<img src="AIUB_whole_logo.png"
alt="home logo" height="70px" </a> American International University-Bangladesh Forum 

<ul id="menu"> 
<li id="home"> <a href="user_home.php"> <u> <i> Home </i> </u> </a> </li>
<li id="profile"> <a href="user_profile.php"> <u> <i> Profile </i> </u> </a> </li>
<li id="settings"> <a href="user_settings.php"> <u> <i> Settings </i> </u> </a> </li>
</ul>

<ul id="menu-right">
<li> <form method="post" action=""> 
<table> <tr> <td><input type="submit" value="Log out" name="logout" class="logout"> </td> </tr> </table> </form> </li>
</ul> 
</div>

<a id="avatar"> <img src="img_avatar.png" alt="Avatar" class="avatar"> </a>

<div id="pp">
<form method="POST" action="">
  <label for="profile_photo"> <span style="color:white;font-size:16px;position:absolute;transition: .5s ease;left: 200px;top: 600px;"> <u> Select an image: </u> </label> <br>
  <input type="file" name="profile_photo" style="position:absolute;transition: .5s ease;left: 200px;top: 625px;"> <br> <br>
  <input type="submit" name="changepp" value="Change" style="position:absolute;transition: .5s ease;left: 200px;top: 660px;">
</form> </div>


	
<div>
<p id="info"> <i> Name: <?php echo $_COOKIE['userlogin']; ?> </i> <br> <br>
<i> Email: user1@gmail.com </i> <br> <br>
<i> Mobile: 01234567891 </i> <br> <br>
<i> Date of birth: 01/01/01 </i> <br> <br>
<i> Gender: Male </i> <br> <br>
<i> Department: CSE </i> 

</p>
</div>


</body>
</html>