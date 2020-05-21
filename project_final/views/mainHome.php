<!DOCTYPE html>
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
	.postItBox{
		background-color: white;
	  padding: 15px;
		font-family: inherit;
		width: 85%;
		height: auto;
		border-left: 15px solid SpringGreen;
		border-radius: 10px;
		font-size: 14px;
		line-height: 18px;
		color: black;
		font-weight: 100;
		resize: none;
		outline: none;
	}
	.commentBox{
		background-color: #F0FFF0;
	  padding: 15px;
		font-family: tahoma;
		width: 85%;
		height: auto;
		margin-top: 10px;
		border-radius: 10px;
		border-left:15px solid SpringGreen;
		position: relative;
		font-size: 14px;
	}
	button {
    border: none;
	  cursor: pointer;
    font-size: 14px;
    width: 80px;
    height: 35px;
		outline: none;
		background-color: IndianRed;
		color: white;
	}
	button:hover{
		opacity: .6
	}
	.editform, .replyfrom{
		position: absolute;
		bottom: 0px;
		right: 0px;
		margin-right: 75px;
	}
	.deleteform{
		position: absolute;
		bottom: 0px;
		right: 10px;
	}
	.editform button{
		height: 30px;
		width: 70px;
		color: black;
		background-image: url('../storage/images/edit.png');
	  background-position: 5px 2px;
	  background-size: 25px 25px;
	  background-repeat: no-repeat;
		padding-left: 10px;
		padding-top: 5px;
		background-color: #F0FFF0;
	}
	.deleteform button{
		height: 30px;
		width: 75px;
		color: black;
		background-image: url('../storage/images/delete.png');
	  background-position: 5px 2px;
	  background-size: 25px 25px;
	  background-repeat: no-repeat;
		padding-left: 30px;
		padding-top: 5px;
		background-color: #F0FFF0;
	}
	.replyBox{
		background-color: #FFFFF0;
	  padding: 15px;
		font-family: tahoma;
		width: 75%;
		height: auto;
		margin-top: 10px;
		margin-left: 80px;
		border-radius: 8px;
		border-left:15px solid tomato;
		position: relative;
		font-size: 14px;
	}

	.replyfrom button{
		height: 30px;
		width: 70px;
		color: black;
		background-image: url('../storage/images/reply.png');
	  background-position: 5px 2px;
	  background-size: 25px 25px;
	  background-repeat: no-repeat;
		padding-left: 25px;
		padding-top: 5px;
		background-color: #FFFFF0;
	}
	 .para {
		font-family: tahoma;
		font-size: 14px;
		line-height: 18px;
		color: black;
		font-weight: 100;
    padding-left: 20px;
	}
  .l{
   float: left;
   width: 40%;
   padding:10px;
   background-color: red;
  }
  .r{
    float: right;
    width: 60%;
    padding-top: 30px;
    padding-left: 20px;

    background-color: yellow;
  }
  .whowhen{
    font-family: tahoma;
  }
.navStyle{
	position: fixed;
	top:0;
	width:100%;
	height: 80px;
	background-color: #FFFAFA;
	display: flex;
	flex-wrap: wrap;
	z-index: 1000;
	opacity: .95
}
.navStyle ul{
	display: flex;
	flex-wrap: wrap;
	padding-left: 15px;

}
.navStyle ul li{
	list-style: none;
	line-height: 45px;
}
.navStyle ul li a{
	display: block;
	height: 100%;
	padding: 0 15px;
	text-transform: uppercase;
	text-decoration: none;
	color: #111;
	font-family: tahoma;
	font-size: 16px;
}
.navStyle ul li a:hover{
	border-bottom: 2px solid SpringGreen;
	opacity: .77
}
.logo{
	height: 100%;
	width: 270px;
	background-image: url('../storage/images/mainlogo.png');
	background-repeat: no-repeat;
	background-size: 100%;
	background-color: #FFF;
	background-position: center;
	margin-left: 80px;
}
.search{
	width: 250px;
	height: 32px;
	font-size: 14px;
	border-color: tomato;
	outline: none;
	border-radius: 4px;
	margin-left: 200px;
	background-image: url('../storage/images/search.png');
	background-position: 5px 1px;
	background-size: 25px 25px;
	background-repeat: no-repeat;
	padding-left: 30px;
}
span{
	color:white;
	margin-left:200px;
}
span input{
	border: none;
	border-left: 10px solid red;
	border-radius: 5px;
	font-size: 14px;
	padding: 5px;
	outline: none;

}
	.profile{
	height: 200px;
	width: 80px;
	opacity: 1;
  display: block;
  transition: .5s ease;
  backface-visibility: hidden;
}

.middle {
  transition: .5s ease;
  opacity: 0;
  position: absolute;
	top: 30%;
	bottom: 70%;
	margin-left: 7%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%)
}

.rightBoxImg:hover .profile {
  opacity: 0.3;
}

.rightBoxImg:hover .middle {
  opacity: 1;
}
.text {
  background-color: DarkSlateGrey;
  color: white;
  font-size: 16px;
	padding: 10px;
	width: 260px;
	height: auto;
}
.pUploadButton{
	background-color: teal;
	border-right: 4px solid lime;
}
.showProfile{
	visibility: hidden;
}
.display{
	padding: 10px;
	padding-left: 20px;
	background-color: Cornsilk;
	margin: 10px;
	font-family: tahoma;
	font-size: 16px;
	line-height: 24px;
	color: DarkSlateGrey;
	font-weight: 100;
	border-radius: 4px;
}
	</style>
	<script>
	//ajax search
		function search()
		{
			http = new XMLHttpRequest();
			var search_word=document.getElementById('searchText').value;
			http.onreadystatechange=function()
			{
				if(http.readyState == 4 && http.status == 200)
				{
					document.getElementById("searchResult").innerHTML=http.responseText;
				}
			}
			http.open("GET","../views/search.php?sk="+search_word,true);
				http.send();
		}

		let showProfileStatus =false;

		let showProfile = function(){
			let getshowProfile= document.querySelector(".showProfile");

			if(showProfileStatus===false){
				getshowProfile.style.visibility="visible";
				showProfileStatus =true;
			}
			else if(showProfileStatus===true){
				getshowProfile.style.visibility="hidden";
				showProfileStatus = false;
			}

		}
	</script>
	<script>
	  function preventBack(){
	    window.history.forward();
	  }
	  setTimeout("preventBack()",0);
	  window.onunload = function(){null};
	</script>
	</head>

	<body>
<nav class="navStyle">
	<div class="logo">
	</div>
	<ul>
		<?php
        if (!isset($_GET['$a'])) {
            $_SESSION['id']='';
            $ok=0;
            echo "<li style='margin-left: 500px;'><a href='../views/login.php?success=".$ok."'>login</a></li>";
            echo "<li style='background-color: Pink; margin-left: 50px; border-right: 2px solid red;'><a href='../views/userRegistration.php'>Register here!</a></li>";
        } else {
            $a= $_GET['$a'];
            $url='../views/mainHome.php?$a='.$a;
            $urls='../views/setting.php';

            echo "<li style='border-left: 4px double SlateGray;'></li>
			<li style='margin-left: 15px;'><a href='$url'>Home</a></li>
				<li ><a href='$urls'>Setting</a></li>
			<li><input type='text' class='search' id='searchText' onkeyup='search()' name='search' placeholder='Search..'></li>
			<li style='margin-left:200px'><a href='../views/logout.php'>logout</a></li>
		";
        }
            ?>
	</ul>
	<div id='searchResult' class="searchResult" style="margin-left: 750px;margin-top: -20px;">
	</div>
</nav>
<!-- main code portion-->

	<div class="row">
		<div class="leftSide">
			<div class="leftBox">
				<h2 style="color: white; font-family: tahoma; padding-top: 62px;">What are you thinking? </h2>
<?php
                if (!isset($_GET['$a'])) {
                    $_SESSION['id']='';
                    echo "<h4 style='color: white;'><i>You are not logged in. Please LogIn to comment and reply...</i></h4>";
                } else {
                    $_SESSION['id']=$_GET['$a'];
                    if (isset($_SESSION['id'])) {
                        echo"	<form method='POST' action='".setComments($conn)."'>
 						<input type='hidden' name='uid' value='".$_SESSION['id']."'> </input>
 						<input type='hidden' name='date' value='".date('Y-m-d H:i:s')." '> </input>
 						<textarea class='postItBox' name='message'></textarea>
						<br><br>
 						<button class='button postitbutton' type='submit' name='submitComment'> Post it! </button>
 				</form>";
                    } else {
                        echo "not login";
                    }
                }
                getComments($conn);
?>
			</div>
			<div class="leftBox">
			</div>
			<div class="leftBox">
			</div>
		</div>
		<div class="rightSide"  style='margin-top: 80px;'>


					<?php
                    if (!isset($_GET['$a'])) {
                        //put something look nice
                    } else {
                        echo "<div class='rightBox'>
												<div class='rightBoxImg' style='margin-left: 10%;'>";
                        $_SESSION['id']=$_GET['$a'];
                        $a=$_SESSION['id'];

                        $sqlImg = "SELECT status FROM profileimg WHERE userid= '$a'";

                        if ($sqlImg == 0) {
                            echo "<img class='profile' src='../storage/profileImg/profile".$a.".jpg' style='width:100%'>";
                        } else {
                            echo "<img src='../storage/images/been.jpg' style='width:100%'>";
                        }
                        $sql = "SELECT * FROM user WHERE id= '$a'";
                        $result =mysqli_query($conn, $sql);

                        while ($row=$result->fetch_assoc()) {
                            echo "<br>".$row['uid'];
                        }
                    }
                                        echo "<div class='middle'>";
                                                echo "<div class='text'>";
                                        if (isset($_SESSION['id'])) {
                                            echo "Change Profile Image Here<br><br>";
                                            echo "<form  action='../views/upload.php' enctype='multipart/form-data' method='post'>
											<input type='file' name='file'><br>
											<button type='submit' class='pUploadButton' name='submit'>upload image</button>
										</form>";

                                            echo "</div>";
                                        }
                                        echo "</div>";
                     ?>
				</div>
			</div>
<?php if (isset($_GET['$a'])) {
                         echo "<div class='rightBox' style='margin-top: -20px;'>
			<button style='width: 120px; margin-left: 80px; background-color: #282828; border-bottom: 2px solid PaleGreen;'
			onclick='showProfile()'
			 type='submit' name='submit'>View profile Details</button>
		</div>";
                     }
?>
		<div class="rightBox showProfile" style=" margin-top:-20px;">
			<?php
            if (!isset($_GET['$a'])) {
                $_SESSION['id']='';
                echo "<h4 style='color: white;'><i>You are not logged in. Please LogIn to comment and reply...</i></h4>";
            } else {
                $_SESSION['id']=$_GET['$a'];
                $a=$_SESSION['id'];

                $sql = "SELECT * FROM user WHERE id= '$a'";
                $result =mysqli_query($conn, $sql);

                while ($row=$result->fetch_assoc()) {
                    echo "<div class='display'>";
                    echo "First Name: <b> &nbsp".$row['firstname']."</b>";
                    echo "<br>";
                    echo "Last Name: <b> &nbsp".$row['lastname']."</b>";
                    echo "<br>";
                    echo "Mobile Number: <b> &nbsp".$row['mobile']."</b>";
                    echo "<br>";
                    echo "Email: <b> &nbsp".$row['email']."</b>";
                    echo "<br>";
                    echo "Date Of Birth: <b> &nbsp".$row['dob']."</b>";
                    echo "<br>";
                    echo "Gender: <b> &nbsp".$row['gender']."</b>";
                    echo "<br>";
                    echo "Department: <b> &nbsp".$row['department']."</b>";
                    echo "<br>";
                    echo "Position: <b> &nbsp".$row['designation']."</b>";
                    echo "</div>";
                    echo "<button style='margin-left:100px; border-top: 2px solid red;'onclick='showProfile()' type='submit' name='b' >close</button>";
                    echo "</div>";
                }
            }

            ?>
			</div>

		</div>
	</div>
	<div class="footer">
			<h4>American International University-Bangladesh Forum</h4>
			<h5>-TeamAIUBForum</h5>

	</div>
	</body>
</html>
