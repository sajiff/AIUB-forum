<link rel="stylesheet" href="adminMenuStyle.css">
<div class='navStyle'><ul>
  <?php
  $a = $_SESSION['id'];
  $url='../views/mainHome.php?$a='.$a;

  echo "<li style='margin-left: 250px; background-color:MediumTurquoise;'><a style='color: white;' href='$url'>Home</a></li>";
  ?>
<li><a style='margin-left: 100px;' href='allPost.php'>ALL POST</a></li>
<li><a href='allModerator.php'>all moderators</a></li>
<li><a href='allUser.php'>all users</a></li>
<li><a href='addUser.php'>Add user</a></li>
<li><a href='addModerator.php'>add moderator</a></li>
<li style='margin-left:100px; background-color:PaleVioletRed';><a style='color: white;' href='../views/logout.php'>logout</a></li>
</ul></div>
