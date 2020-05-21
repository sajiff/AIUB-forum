<?php
include '../models/database.php';
    require_once('../controller/moderatorController.php');
      deleteModerator($_GET['$a']);
      $id=$_GET['$a'];
      $sql="SELECT * FROM comments";
      $result =$conn->query($sql);
      while ($row=$result->fetch_assoc()) {
          $sqld="DELETE FROM comments WHERE uid='$id'";
          $conn->query($sqld);
      }

       $sqlr="SELECT * FROM reply";
       $resultr =$conn->query($sqlr);
       while ($rowr=$resultr->fetch_assoc()) {
           $sqlr="DELETE FROM reply WHERE uid='$id'";
           $conn->query($sqlr);
       }
      header('Location:../views/allModerator.php');
