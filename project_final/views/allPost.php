<?php
session_start();

include '../models/database.php';
$id = $_SESSION['id'];

$sql = "SELECT designation FROM user WHERE id= '$id'";
$result =mysqli_query($conn, $sql);

while ($row=$result->fetch_assoc()) {
    if ($row['designation']=='moderator') {
        include '../views/moderatorMenu.php';
    } else {
        include '../views/adminMenu.php';
    }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="tableStyle.css">
  </head>
  <body>
    <div style='margin-top: 80px;'>
   	<table id="data" >
       <thead >
         <th style="border-left: 5px dashed RebeccaPurple;">UserID </th>
         <th>User Name</th>
         <th> posted date</th>
         <th> post</th>
         <th></th>
       </thead>
     <?php
       $sql="SELECT * FROM comments";
       $result =$conn->query($sql);
       while ($row=$result->fetch_assoc()) { //splite the query
           $id=$row['uid'];
           $sql_gu="SELECT * FROM user WHERE id='$id'";
           $result_gu =$conn->query($sql_gu);

           echo "<tr>";
           echo "<td style='border-left:5px solid SpringGreen;'>".$row['uid']."</td>";
           if ($row_gu=$result_gu->fetch_assoc()) {
               echo "<td>".$row_gu['uid']."</td>";
               echo "<td>".$row['date']."</td>";
               echo "<td>".$row['message']."</td>";

               echo '<td><a class="delete" href="deletePostByAdmin.php?$a='.$row['cid'].'">Delete</td>';
               echo "</tr>";
           }
           $cid=$row['cid'];
           $sql_r="SELECT * FROM reply WHERE cid='$cid'";
           $result_r =$conn->query($sql_r);
           while ($row_r=$result_r->fetch_assoc()) {
               $id=$row_r['uid'];
               $sql_g="SELECT * FROM user WHERE id='$id'";
               $result_ru =$conn->query($sql_g);
               echo "<tr>";
               echo "<td style='border-left:5px solid tomato;'>".$row_r['uid']."</td>";
               if ($row_ru=$result_ru->fetch_assoc()) {
                   echo "<td>".$row_ru['uid']."</td>";
                   echo "<td>".$row_r['date']."</td>";
                   echo "<td>reply<br>".$row_r['message']."</td>";

                   echo '<td><a class="delete" href="deleteReplyByAdmin.php?$a='.$row_r['rid'].'">Delete</td>';
                   echo "</tr>";
               }
           }
       }
           ?>
   	</table>
   </div>
  </body>
</html>
 <
