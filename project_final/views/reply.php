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
	button {
	  background-color:tomato;
	  color: White;
	  padding: 12px 16px;
	  margin: 10px;
		border: none;
	  cursor: pointer;
    border-radius: 4px;
    margin-left: 580px;
    font-size: 16px;
	}

	button:hover {
	  opacity: 0.8;
	}
	textarea{
		background-color: white;
	  padding: 15px;
		font-family: inherit;
		width: 80%;
    height: 20%;
    border: 4px solid Crimson;
    outline: none;
    border-radius: 8px;
    resize: none;
    font-size: 16px;
		line-height: 18px;
		color: black;
		font-weight: 100;
	}
  body{
    background-color: #000d1a;
  }
  form{
    width: 800px;
    height: 600px;
    margin-left: 30%;
    margin-top: 10%;
  }
	</style>
	</head>

	<body>
<?php
if ($_POST['uid']) {

  /*$sql="SELECT * FROM comments";
  $result =$conn->query($sql);
  while ($row=$result->fetch_assoc()) { //splite the query
    $id=$_POST['id'];
    $sql_gu="SELECT * FROM user WHERE id='$id'";
    $result_gu =$conn->query($sql_gu);

    if($row_gu=$result_gu->fetch_assoc()){
      $uid=$row_gu['uid'];
      $date= date('Y-m-d H:i:s');
    }

  }
  $uid=$_POST['uid'];
  $cid=$_POST['cid'];
  $message=$_POST['message'];
  $date=date('Y-m-d H:i:s');

  $sql="INSERT INTO reply (uid,cid,replytx,date )
   VALUES ('$uid','$cid','$message','$date') ";
   $result =$conn->query($sql);

   $a= $_SESSION['id'];
   $url='../views/mainHome.php?$a='.$a;
   header('Location: '.$url);

  */
    $uid=$_POST['uid'];
    $cid=$_POST['cid'];
    echo "<form method='POST' action='".replyComments($conn)."'>
    <input type='hidden' name='cid' value='".$cid."'>
     <input type='hidden' name='uid' value='".$uid."'>
     <textarea name='message' ></textarea><br>
     <button type='submit' name='replyComment'>reply</button>
 </form>";
} else {
    header("Location: ../views/login.php");
    exit();
}
?>
</body>
</html>
