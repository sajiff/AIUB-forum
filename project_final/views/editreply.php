<?php
include '../models/database.php';
include '../controller/commentsController.php';

session_start();
date_default_timezone_set('Asia/Dhaka');
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


         $cid=$_POST['cid'];
         $uid=$_POST['uid'];
         $date=$_POST['date'];
         $message=$_POST['message'];

         $e_date=date('Y-m-d H:i:s');

          echo "<form method='POST' action='".editreply($conn)."'>
             <input type='hidden' name='cid' value='".$cid."> </input>
             <input type='hidden' name='uid' value='".$uid."> </input>
             <input type='hidden' name='date' value='".$date." '> </input>
             <textarea name='message'>".$message."</textarea><br>

             <button type='submit' name='submitComment' >done</button>
         </form>";
?>
	</body>
</html>
