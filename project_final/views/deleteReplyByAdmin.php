<?php
include '../models/database.php';
$rid = $_GET['$a'];

$sql="DELETE FROM reply WHERE rid='$rid'";
$result =$conn->query($sql);
$url='../views/allPost.php';
header('Location: '.$url);
