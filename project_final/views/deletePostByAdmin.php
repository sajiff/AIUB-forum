<?php
include '../models/database.php';
$cid = $_GET['$a'];

$sql="DELETE FROM comments WHERE cid='$cid'";
$result =$conn->query($sql);
$url='../views/allPost.php';
header('Location: '.$url);
