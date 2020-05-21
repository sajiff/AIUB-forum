<?php
session_start();
$id = $_SESSION['id'];
include '../controller/userControllerByAdmin.php';
 ?>
 <script>
function validateForm() {

 var valid = true;

 document.getElementById("err_fname").innerHTML = "";
 var x = document.forms["myForm"]["fname"].value;
   if (x == "" || x == null) {
       document.getElementById("err_fname").innerHTML = "Please enter your first name";
       valid= false;
   }


    document.getElementById("err_lname").innerHTML = "";
 var y = document.forms["myForm"]["surname"].value;
   if (y == "" || y == null) {
       document.getElementById("err_lname").innerHTML = "Please enter your last name";
       valid= false;
   }


    document.getElementById("err_email").innerHTML = "";
 var z = document.forms["myForm"]["email"].value;
   if (z == "" || z == null) {
       document.getElementById("err_email").innerHTML = "Please enter your email";
       valid= false;
   }

     document.getElementById("err_mobile").innerHTML = "";
 var a = document.forms["myForm"]["mobile"].value;
   if (a == "" || a == null) {
       document.getElementById("err_mobile").innerHTML = "Please enter your mobile number";
       valid= false;
   }


  document.getElementById("err_dept").innerHTML = "";
 var b = document.forms["myForm"]["dept"].value;
   if (b == "" || b == null) {
       document.getElementById("err_dept").innerHTML = "Please enter your department";
       valid= false;
   }

 document.getElementById("err_uname").innerHTML = "";
 var d = document.forms["myForm"]["uname"].value;
   if (d == "" || d == null) {
       document.getElementById("err_uname").innerHTML = "Please enter your username";
       valid= false;
   }
        document.getElementById("err_pass").innerHTML = "";
 var q = document.forms["myForm"]["pass"].value;
   if (q == "" || q == null) {
       document.getElementById("err_pass").innerHTML = "Please enter your password";
       valid= false;
   }

 document.getElementById("err_gender").innerHTML = "";
 var w = document.forms["myForm"]["gender"].value;
   if (w == "" || w == null) {
       document.getElementById("err_gender").innerHTML = "Please enter your gender";
       valid= false;
   }

  document.getElementById("err_day").innerHTML = "";
 var f = document.forms["myForm"]["day"].value;
   if (f == "" || f == null) {
       document.getElementById("err_day").innerHTML = "Please select a day";
       valid= false;
   }

 document.getElementById("err_month").innerHTML = "";
 var g = document.forms["myForm"]["month"].value;
   if (g == "" || g == null) {
       document.getElementById("err_month").innerHTML = "Please select a month";
       valid= false;
   }

 document.getElementById("err_year").innerHTML = "";
 var h = document.forms["myForm"]["year"].value;
   if (h == "" || h == null) {
       document.getElementById("err_day").innerHTML = "Please select a year";
       valid= false;
   }

 document.getElementById("err_dept").innerHTML = "";
 var j = document.forms["myForm"]["dept"].value;
   if (j == "" || j == null) {
       document.getElementById("err_dept").innerHTML = "Please select a department";
       valid= false;
   }

 return valid;
}
</script>
<link rel="stylesheet" style="text/css" href="../views/user_reg.css">


<script >

function tooglepass() {
  var x = document.getElementById("input-pw");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

</script>

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
    background-color: rgba(0,0,0,.2);
  }
  input {
      border: none;
			border-bottom: 2px solid DarkSlateBlue;
			padding: 10px 15px;
      border-radius: 1px;
  }
  .inputSubmit{
    margin-top: 20px;
    cursor: pointer;
    background-color: DarkSlateBlue;
    color: white;
    border: none;
    height: 40px;
    width: 100px;
    font-size: 16px;
  }
  .cancle{
    margin-top: 20px;
    border: 2px solid red;
    cursor: pointer;
    background-color: tomato;
    color: white;
  }
</style>

<?php
include '../models/database.php';
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
 <form method="post" action="../controller/userControllerByAdmin.php" onsubmit="return validateForm()" name="myForm" >
      <h1> <u> Add User </u> </h1>
       <table align="center">
       <div class="input-group">
       <tr>
       <td id="name"> <label class="fn">
       First Name: </label>
       </td>
       <td>
       <input type="text"  name="fname" placeholder="Enter First Name" class="fname"> <br> <p id="err_fname"> </p>
       </td> <td> <label style="color: white;" class="ln"> Last Name: </label>
       <input type="text"  name="surname" placeholder="Enter Last Name" class="surname"> <br> <p id="err_lname"> </p>
       </td>
       </tr>

       <tr> <td id="mobile"> Mobile Number: </td>
       <td colspan="2"> <input type="text" name="mobile" placeholder="Enter Mobile Number" class="mobile"> <br> <p id="err_mobile"> </p> </td>
       </tr>
       <tr> <td id="email"> Email: </td>
       <td colspan="2"> <input type="text"  name="email" placeholder="Enter Email address" class="email"> <br> <p id="err_email"> </p>  </td>
       </tr>
       <tr> <td id="uname"> Username: </td>
       <td colspan="2"> <input type="text" name="uname" placeholder="Enter username" class="uname"> <br> <p id="err_uname"> </p>  </td>
       </tr>
       <tr>
       <td id="pass"> Password: </td>
       <td colspan="2">  <input id="input-pw" class="active-pw" type="password"  name="pass" placeholder="Enter password" ><input style="margin-top: 10px;" type="button" value="show" onclick="tooglepass()"> <br> <p id="err_pass"> </p>
       </td>
       </tr>

       <tr>
       <td id="dob">   Date of Birth:  </td>
       <td colspan="2"> <div class="dob" style="width:500px;">
       <select name="day" id="bdname">
       <option value="">Select DD </option>
       <?php
       for ($i=1;$i<=31;$i++) {
           echo '<option value='.$i.'>'.$i.'</option>';
       }
       ?>
       </select> <br> <p id="err_day"> </p>

       <?php
       $MonthArray = array("1" => "January", "2" => "February", "3" => "March", "4" => "April",
       "5" => "May", "6" => "June", "7" => "July", "8" => "August",
       "9" => "September", "10" => "October", "11" => "November", "12" => "December");
       ?>
       <select name="month" id="bd2">
       <option value="">Select MM</option>
       <?php
       foreach ($MonthArray as $monthNum=>$month) {
           $selected = (isset($getMonth) && $getMonth == $monthNum) ? 'selected' : '';
           echo '<option ' . $selected . ' value="' . $monthNum . '">' . $month . '</option>';
       }
       ?>
       </select> <br> <p id="err_month"> </p>

       <select name="year" id="bd3">
       <option value="">Select YY</option>
       <?php
       for ($year = 1905; $year <= 2020; $year++) {
           $selected = (isset($getYear) && $getYear == $year) ? 'selected' : '';
           echo "<option value=$year $selected>$year</option>";
       }
       ?>
       </select> <br> <p id="err_year"> </p> </div>
       </td>
       </tr>

       <tr>
       <td id="gender"> Gender: </td>

       <td colspan="2"> <div class="gender" > <input type="radio" name="gender" value="Male"> <label class="male"> <span style="color:black;"> Male  </label>
       <input type="radio" name="gender" value="Female"> <label class="female"> <span style="color:black;"> Female </label>
       <input type="radio" name="gender" value="Other"> <label class="other"> <span style="color:black;"> Other </label>
      </div> <br> <p id="err_gender"> </p>
       </td>
       </tr>

       <tr>
       <td id="dept"> Department: </td>
       <td colspan="2"> <div class="dept"> <input type="radio" name="dept" value="CSE" class="cse"> <label class="c"> <span style="color:black;"> CSE
       <input type="radio" name="dept" value="EEE" class="eee"> <label class="e"> <span style="color:black;"> EEE
       <input type="radio" name="dept" value="BBA" class="bba"> <label class="b"> BBA <input type="radio" name="dept" value="Other" class="other"> <label class="o"> <span style="color:black;"> Other
        </div> <br> <p id="err_dept"> </p>
       </td>
       </tr>


       <tr>
       <td colspan="3" align="center">
       <input class='inputSubmit' type="submit" name="addUser" value="Add" >
       </td>
       </tr>

       </table>


 	</form>
</
