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

<!DOCTYPE html> 
<html>
<head>
<title> User Homepage </title>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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

h2 {
	color: white;
	position:absolute;
	transition: .5s ease;
	left: 200px;
	top: 200px;
	font-family: calibri;
	
}

#avatar {
position:absolute;
transition: .5s ease;
left: 120px;
top: 200px;
}

.post{

position:absolute;
transition: .5s ease;
left: 200px;
top: 280px;
height: 80px;
width: 500px;

}

.postbtn {

position:absolute;
transition: .5s ease;
left: 10px;
top: 30px;
height:40px;
width:70px;

}

.postbtn:hover {
  background-color: #008CBA;
  color: white;
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

.topnav {
  overflow: hidden;
  background-color: #e9e9e9;
}

.topnav .search-container {
  float: right;
}

.topnav input[type=text] {
  padding: 6px;
  margin-top: 8px;
  font-size: 17px;
  border: none;
}

.topnav .search-container button {
  float: right;
  padding: 6px 10px;
  margin-top: 8px;
  margin-right: 16px;
  background: #ddd;
  font-size: 17px;
  border: none;
  cursor: pointer;
}

.topnav .search-container button:hover {
  background: #ccc;
}

  .topnav input[type=text] {
    border: 1px solid #ccc;  
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

<div class="topnav">
  <div class="search-container">
    <form action="/action_page.php">
      <input type="text" placeholder="Search.." name="search">
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>
  </div>
</div>

<a id="avatar"> <img src="img_avatar.png" alt="Avatar" height="70px class="avatar"> </a>
<h2> <u> Create a post </u> </h2>

<form method="post" action="">

<input type="text" value="<?php echo $post;?>" name="post" class="post" placeholder="What's on your mind, <?php echo $_COOKIE['userlogin']; ?>?"> <br> 
<span style="color:red;font-size:14px;position:absolute;transition: .5s ease;left: 200px;top: 380px;"> <?php echo $err_post;?>

<input type="submit" value="Post" name="postbtn" class="postbtn">

</form>
</body>
</html>