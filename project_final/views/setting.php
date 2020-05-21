<?php
  session_start();
  include '../models/databaseManage.php';
  include '../models/database.php';
  $id = $_SESSION['id'];
  $urls='../views/editUserInfo.php?$a='.$id;
  ?>
  <!DOCTYPE html>
  <html lang="en" dir="ltr">
    <head>
      <meta charset="utf-8">
      <title></title>
      <style>
      .navStyle{
      	position: fixed;
      	top:0;
      	width:100%;
      	height: 80px;
      	background-color: #FFFAFA;
      	display: flex;
      	flex-wrap: wrap;
      	z-index: 1000;
        opacity: .8;
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
      body{
        margin: 0;
        padding: 0;
        /*background: url("../storage/images/setting.png");*/
        background-attachment: fixed;
        background-size: cover;
        font-family: tahoma;
        background-color: RebeccaPurple;
      }
      section{
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        margin-left: 10%;
      }
      .box{
        position: relative;
        width: 200px;
        height: 200px;
        background: rgba(255, 255, 255, 0.5);
        margin:20px;
        text-align: center;
        transition: all .5s;
      }
      .box a{
        display: block;
        height: 50%;
        padding: 70px 50px;
        text-transform: uppercase;
        text-decoration: none;
        color: #111;
        font-family: tahoma;
        font-size: 20px;
      }
      .box:hover{
        width: 220px;
        height: 220px;
        background: rgba(0, 0, 0, 0.5);
      }
      .box a:hover{
        color: white;
      }
      .dx{
        margin-left: 40%;
        margin-top: 90px;
        color: white;
      }


</style>

    </head>
    <body>
      <div class='navStyle'><ul>
        <?php
        $a = $_SESSION['id'];
        $url='../views/mainHome.php?$a='.$a;
        echo "<li style='margin-left: 300px; background-color:MediumTurquoise;'><a style='color: white;' href='$url'>Home</a></li>
        <li style='margin-left:700px; background-color:PaleVioletRed;'><a style='color: white;' href='../views/logout.php'>logout</a></li>
        </ul></div>
      </ul></div>";
$sql = "SELECT * FROM user WHERE id= '$id'";
$result =mysqli_query($conn, $sql);

$row=$result->fetch_assoc();
$designation= $row['designation'];

/*$count= "SELECT * FROM user";
$rowC=mysqli_query($conn, $count);
$n = mysqli_num_rows($rowC);*/

        echo "<div class='dx'><h1>HEY ".$row['uid']." ,WHATS UP!</h1></div>";
        $resultS =mysqli_query($conn, $sql);

        if ($designation=='admin') {
            echo "<div style='margin-left: 10%;'>
          <section>
            <div class='box'>
            <a href='allPost.php'>ALL POST</a>
          </div>
          <div class='box'>
          <a href='alladmin.php'>ALL ADMIN</a>
        </div>
        <div class='box'>
        <a href='allModerator.php'>ALL MODERATOR</a>
      </div>
      <div class='box'>
      <a href=allUser.php>ALL User</a>
    </div>

    <section>
    <div class='box'>
          <a href='addAdmin.php'>add Admin</a>
        </div>
        <div class='box'>
        <a href='addModerator.php'>add moderator</a>
        </div>
        <div class='box'>
        <a href='addUser.php'>add user</a>
        </div>
  </section>
  </div>";
        } elseif ($designation=='moderator') {
            echo "<div style='margin-left: 20%;'>
          <section>
            <div class='box'>
            <a href='allPost.php'>ALL POST</a>
          </div>
        <div class='box'>
        <a href='allModerator.php'>ALL MODERATOR</a>
      </div>
      <div class='box'>
      <a href=allUser.php>ALL User</a>
    </div>
    </section>
    <section>
        <div class='box'>
        <a href='addModerator.php'>add moderator</a>
        </div>
        <div class='box'>
        <a href='addUser.php'>add user</a>
        </div>
  </section>
  </div>";
        } else {
            echo
          "<div style='margin-left: 35%;'>
      <section>
        <div class='box'>
        <a href='$urls'>Edit personal information</a>
      </div>
      </section>
</div>";
        }

?>
    </body>
  </html>
