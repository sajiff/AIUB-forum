<style>
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
</style>
<script>
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
</script>
<?php
include '../models/database.php';
include '../controller/commentsController.php';

$cid= $_GET['id'];
$sid=$_GET['sid'];
$_SESSION['id']=$sid;

$a = $_SESSION['id'];

?>
<nav class="navStyle">
	<div class="logo">
	</div>
	<ul>
		<?php
            $url='../views/mainHome.php?$a='.$a;
            $urls='../views/setting.php';

            echo "<li style='border-left: 4px double SlateGray;'></li>
			<li style='margin-left: 15px;'><a href='$url'>Home</a></li>
				<li ><a href='$urls'>Setting</a></li>
			<li><input type='text' class='search' id='searchText' onkeyup='search()' name='search' placeholder='Search..'></li>
			<li style='margin-left:200px'><a href='../views/logout.php'>logout</a></li>
		";
            ?>
	</ul>
	<div id='searchResult' class="searchResult" style="margin-left: 750px;margin-top: -20px;">
	</div>
</nav>

<div style='width: 800px; height: 800px; margin-left: 20%; margin-top:100px;'>
<?php
    $query="SELECT * FROM comments WHERE cid='$cid'";
    $rs=mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($rs)) {
        $id=$row['uid'];
        $sql_gu="SELECT * FROM user WHERE id='$id'";
        $result_gu =$conn->query($sql_gu); //which user posting what

        if ($row_gu=$result_gu->fetch_assoc()) {
            echo "<div class='commentBox'>";
            echo "<div class='whowhen'>";
            echo"<img src=''>";
            echo "<i>From: </i><b>".$row_gu['uid']."</b>";
            echo "<br>";
            echo "<i>At: </i><b>".$row['date']."</b>";
            echo "</div><P class='para'>";
            echo nl2br($row['message']);
            echo "</p>";

            if (isset($_SESSION['id'])) {
                if ($_SESSION['id']==$row_gu['id']) {
                    echo "<form class='deleteform' method='POST' action='".deleteComments($conn)."'>
                  <input type='hidden' name='cid' value='".$row['cid']."'>
                  <button type='submit' name='deleteComment'>delete</button>
                </form>
                      <form class='editform' method='POST' action='../views/editComment.php'>
                        <input type='hidden' name='cid' value='".$row['cid']."'>
                        <input type='hidden' name='uid' value='".$row['uid']."'>
                        <input type='hidden' name='date' value='".$row['date']."'>
                        <input type='hidden' name='message' value='".$row['message']."'> </input>
                        <button>edit</button>
                      </form>";
                } else {
                    $id = $_SESSION['id'];
                    echo "<form class='replyfrom' method='POST' action='../views/reply.php'>
                  <input type='hidden' name='uid' value='".$id."'>
                  <input type='hidden' name='cid' value='".$row['cid']."'>
                  <button type='submit' name='reply'>reply</button>
                </form>";
                }
            } else {
                echo "<p>you are not log in</p>";
            }
            echo "</div>";
        }
        $cid=$row['cid'];
        $sql_r="SELECT * FROM reply WHERE cid='$cid'";
        $result_r =$conn->query($sql_r);
        while ($row_r=$result_r->fetch_assoc()) {
            $id=$row_r['uid'];
            $sql_g="SELECT * FROM user WHERE id='$id'";
            $result_ru =$conn->query($sql_g);

            if ($row_ru=$result_ru->fetch_assoc()) {
                echo "<div class='replyBox'>";
                echo "<div class='whowhen'>";
                echo"<img src=''>";
                echo "<i>From: </i><b>".$row_ru['uid']."</b>";
                echo "<br>";
                echo "<i>At: </i><b>".$row_r['date']."</b>";
                echo "</div><P>";
                echo nl2br($row_r['message']);
                echo "</p>";
                if (isset($_SESSION['id'])) {
                    if ($_SESSION['id']==$row_r['uid']) {
                        echo "<form class='deleteform' method='POST' action='".deletereply($conn)."'>
                <input type='hidden' name='cid' value='".$row_r['rid']."'>
                <button type='submit' name='deleteComment' style='background-color: #FFFFF0;'>delete</button>
              </form>
                    <form class='editform' method='POST' action='../views/editreply.php'>
                      <input type='hidden' name='cid' value='".$row_r['rid']."'>
                      <input type='hidden' name='uid' value='".$row_r['uid']."'>
                      <input type='hidden' name='date' value='".$row_r['date']."'>
                      <input type='hidden' name='message' value='".$row_r['message']."'> </input>
                      <button style='background-color: #FFFFF0;'>edit</button>
                    </form>";
                    } else {
                        $id = $_SESSION['id'];
                        echo "<form class='replyfrom' method='POST' action='../views/reply.php'>
                <input type='hidden' name='uid' value='".$id."'>
                <input type='hidden' name='cid' value='".$row_r['cid']."'>
                <button type='submit' class='replybutton' name='reply'>reply</button>
              </form>";
                    }
                } else {
                    echo "<p>you are not log in</p>";
                }
                echo "</div>";
            }
        }
    }
?>
</div>
