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
	<title> Settings </title>


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

#name {
	color: white;
	position:absolute;
	transition: .5s ease;
	left: 80px;
	top: 195px;
	font-family: calibri;
	font-size: 20px;
}

#pass {
	color: white;
	position:absolute;
	transition: .5s ease;
	left: 60px;top: 280px;
	font-family: calibri;
	font-size: 20px;
}

#email {
	color: white;
	position:absolute;
	transition: .5s ease;
	left: 80px;top: 350px;
	font-family: calibri;
	font-size: 20px;
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

<div> 

<label id="name"> New Name: </label> 
<input type="text" name="fname" placeholder="Enter new first name" style="position:absolute;transition: .5s ease;left: 200px;top: 200px;"> 
<input type="text" name="lname" placeholder="Enter new last name" style="position:absolute;transition: .5s ease;left: 400px;top: 200px;"> 
<input type="submit" name="change1" value="Change" style="position:absolute;transition: .5s ease;left: 600px;top: 200px;">

<label id="pass"> New Password: </label> 
<input type="text" name="pass" placeholder="Enter new password" style="position:absolute;transition: .5s ease;left: 200px;top: 280px;"> 
<input type="submit" name="change2" value="Change" style="position:absolute;transition: .5s ease;left: 400px;top: 280px;">

<label id="email"> New Email: </label> 
<input type="text" name="email" placeholder="Enter new email" style="position:absolute;transition: .5s ease;left: 200px;top: 350px;"> 
<input type="submit" name="change3" value="Change" style="position:absolute;transition: .5s ease;left: 400px;top: 350px;">

</div>

</body>
</html>