<?php
session_start();
include '../controller/moderatorController.php';
include '../models/database.php';
$admins = getAllModerator();

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
     <table id="data">
       <thead>
        <tr style=" background-color: Snow;"><td colspan="11"><h3 style="margin-top: 10px;">All Moderators</h3></td></tr>
         <th>ID </th>
         <th>First Name</th>
         <th> Last Name </th>
         <th> User ID </th>
         <th> Mobile </th>
         <th> Email </th>
         <th> Date of Birth </th>
         <th> Gender </th>
         <th> Department </th>
         <th colspan="2">options</th>

       </thead>
       <tbody>
         <?php
                   foreach ($admins as $admin) {
                       echo "<tr>";
                       echo "<td>".$admin["id"]."</td>";
                       echo "<td>".$admin["firstname"]."</td>";
                       echo "<td>".$admin["lastname"]."</td>";
                       echo "<td>".$admin["uid"]."</td>";
                       echo "<td>".$admin["mobile"]."</td>";
                       echo "<td>".$admin["email"]."</td>";
                       echo "<td>".$admin["dob"]."</td>";
                       echo "<td>".$admin["gender"]."</td>";
                       echo "<td>".$admin["department"]."</td>";
                       echo '<td><a href="../views/editModerator.php?$a='.$admin["id"].'" >Edit</a></td>';
                       echo '<td><a class="delete" href="deleteModerator.php?$a='.$admin["id"].'">Delete</td>';
                       echo "</tr>";
                   }
               ?>

       </tbody>
     </table>
    </div>
  </body>
</html>
