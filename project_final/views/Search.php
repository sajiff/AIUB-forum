<style>
  .c{
    width:300px;;
    height: 80px;
    background-color: Teal;
    padding: 5px;
    margin-bottom: 5px;
    border-bottom: 2px solid Tomato;
    overflow: hidden;
    opacity: 1;
    border-radius: 2px;
  }
</style>

<?php
session_start();
  include '../models/database.php';
  //got database conn strings

     $key=$_GET['sk'];
     $id=$_SESSION['id'];
    $query="SELECT cid,uid, date, message FROM comments WHERE message LIKE '%$key%'";
    $result=mysqli_query($conn, $query);

    /*$query2="SELECT uid, date, message, keywords FROM comments WHERE date LIKE '%$key%'";
    $result2=mysqli_query($conn, $query2);*/
    ?>
    <table style="background-color: WhiteSmoke;margin:5px;">
      <?php
      if (!empty($key)) {
          while ($row = mysqli_fetch_assoc($result)) {
              echo "<tr>";
              $uid=$row["uid"];
              $cid=$row["cid"];
              $date=$row["date"];
              $messagee=$row["message"];
              echo "<td>"."<button class='c' onclick=location.href='../views/showSearchResult.php?id=$cid&sid=$id'>".$row["message"]."</button>"."</td>";
              echo "</tr>";
          }
          /*while ($row = mysqli_fetch_assoc($result2)) {
              echo "<tr>";
              $uid=$row["uid"];
              $date=$row["date"];
              $messagee=$row["message"];
              $keywords=$row["keywords"];
              echo "<td>"."<button class='c' onclick=location.href='showResult.php?id=$uid'>".$row["date"]."</button>"."</td>";
              echo "</tr>";
          }*/
      }
        ?>
    </table>
