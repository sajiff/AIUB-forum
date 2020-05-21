<link rel="stylesheet" href="adminMenuStyle.css">
<div class='navStyle'><ul>
  <?php
  $a = $_SESSION['id'];
  $url='../views/mainHome.php?$a='.$a;
$urls='../views/editUserInfo.php?$a='.$a;
  echo "<li style='margin-left: 400px; background-color:MediumTurquoise;'><a style='color: white;' href='$url'>Home</a></li>

  <li><a href='$urls'>Update information</a></li>";
?>
  <li style='margin-left:100px background-color:PaleVioletRed';><a style='color: white;' href='../views/logout.php'>logout</a></li>
  </ul></div>
</ul></div>
