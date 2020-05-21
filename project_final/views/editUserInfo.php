<?php
session_start();
require_once('../controller/userControllerByAdmin.php');

 $id = $_GET['$a'];
 $admin=getUser($id);

?>
<link rel="stylesheet" href="adminMenuStyle.css">
<style>
body{
  font-family: tahoma;
  background-color: LightGrey;
}
  form{
    width: 800px;
    margin-left: 25%;
    padding: 10px;
    margin-top: 100px;

  }
  input {
      border: none;
			border-bottom: 2px solid DarkSlateBlue;
			padding: 10px 15px;
      border-radius: 1px;
  }
  td{
    padding: 10px;
    text-align: right;
    background-color: LightGrey;
  }
  .inputSubmit{
    margin-top: 20px;
    border: 2px solid GREEN;
    cursor: pointer;
    background-color: SpringGreen;
    color: white;
  }
  .cancle{
    margin-top: 20px;
    border: 2px solid red;
    cursor: pointer;
    background-color: tomato;
    color: white;
  }

</style>

<div class='navStyle'><ul>
  <?php
  $url='../views/mainHome.php?$a='.$id;

  echo "<li style='margin-left: 300px; background-color:MediumTurquoise;'><a style='color: white;' href='$url'>Home</a></li>
  <li style='margin-left:700px; background-color:PaleVioletRed;'><a style='color: white;' href='../views/logout.php'>logout</a></li>
  </ul></div>
  </ul></div>";
  ?>

<div style='margin-top:100px;' class="">
  <table align='center'>

      <form method="post" action="../controller/userControllerByAdmin.php" >
        <input type="hidden" name="id" value="<?php echo $admin["id"]?>">

        <tr>
          <td>First Name:</td>
          <td><input type="text" name="firstname" value="<?php echo $admin["firstname"]?>"></td>
        </tr>
          <tr>
            <td>Last Name:</td>
            <td><input type="text" name="lastname" value="<?php echo $admin["lastname"]?>"></td>
          </tr>
          <tr>
            <td>Username:</td>
            <td><input type="text" name="uname" value="<?php echo $admin["uid"]?>"></td>
          </tr>
          <tr>
            <td>Password:</td>
            <td><input type="text" name="pass" value="<?php echo $admin["pass"]?>"></td>
          </tr>
          <tr>
            <td>Email:</td>
            <td><input type="text" name="email" value="<?php echo $admin["email"]?>"></td>
          </tr>
          <tr>
            <td>mobile:</td>
            <td><input type="text" name="mobile" value="<?php echo $admin["mobile"]?>"></td>
          </tr>
          <tr>
            <td>date of Birth:</td>
            <td><input type="text" name="dob" value="<?php echo $admin["dob"]?>"></td>
          </tr>
          <tr>
            <td>Department:</td>
            <td> <input type="text" name="department" value="<?php echo $admin["department"]?>"></td>
          </tr>
          <tr>
            <td  align="center">  <input class='cancle' type="submit" name="cancle" value="cancle">
            </td>
            <td  align="center">  <input class='inputSubmit' type="submit" name="updateUserByUser" value="update">
            </td>
          </tr>

      </form>
    </td>
  </table>

</div>
