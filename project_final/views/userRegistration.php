<?php
$err_fname="";
$fname="";

$err_uname="";
$uname="";

$err_surname="";
$surname="";
$email="";
$mobile="";
$err_email="";
$err_mobile="";
$pass="";
$err_pass="";
$aday="";
$err_date="";
$amonth="";
$ayear="";
$agender="";
$err_agender="";
$department="";
$err_dept="";
$tagree="";
$disagree="";

$has_err="";
$c = 0;

if (isset($_POST['submit'])) {
    if (empty($_POST['fname'])) {
        $err_fname="*First Name is required";
        $has_err="true";
    } else {
        $fname=($_POST['fname']);
        $has_err="false";
        $c = $c+1;
    }

    if (empty($_POST['surname'])) {
        $err_surname="*Surname is required";
        $has_err="true";
    } else {
        $surname=($_POST['surname']);
        $has_err="false";
    }
    if (empty($_POST['uname'])) {
        $err_uname="*uname Name is required";
        $has_err="true";
    } else {
        $uname=($_POST['uname']);
        $has_err="false";
    }

    if (empty($_POST['email'])) {
        $err_email="*Email Required";
        $has_err="true";
    } else {
        $email=($_POST['email']);
        $has_err="false";
        if (strpos($email, "@")==true || strpos($email, ".")==true) {
        } else {
            $err_email = "Invalid email format";
            $has_err="true";
        }
    }



    if (empty($_POST['mobile'])) {
        $err_mobile="*Mobile number is required";
        $has_err="true";
    } elseif (preg_match('/^[0-9]{11}+$/', $_POST['mobile'])) {
        $mobile=($_POST['mobile']);
        $has_err="false";
    } else {
        $err_mobile="Invalid mobile number";
        $has_err="true";
    }

    if (empty($_POST['pass'])) {
        $err_pass="*Password is required";
        $has_err="true";
    } elseif (strlen($_POST["pass"]) < '8') {
        $err_pass = "Your Password Must Contain At Least 8 Characters!";
        $has_err="true";
    } else {
        $pass=($_POST['pass']);
        $has_err="false";
    }

    if ((empty($_POST['day'])) || (empty($_POST['month'])) || (empty($_POST['year']))) {
        $err_date="*Please select a date including day,month and year";
        $has_err="true";
    } else {
        $aday=($_POST['day']);
        $amonth=($_POST['month']);
        $ayear=($_POST['year']);
        $has_err="false";
    }

    if (empty($_POST['gender'])) {
        $err_agender="*Please Select a gender";
        $has_err="true";
    } else {
        $agender=($_POST['gender']);
        $has_err="false";
    }

    if (empty($_POST['dept'])) {
        $err_dept="*Please Select a department";
        $has_err="true";
    } else {
        $department=($_POST['dept']);
        $has_err="false";
    }

    if (empty($_POST['agree'])) {
        $disagree="*You must agree to sign up";
        $has_err="true";
    } else {
        $tagree=($_POST['agree']);
    }
}
?>

<!DOCTYPE html>
<html>

<head>
<title> Sign up page </title>

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
  background-color: #282828;
  background: url("../storage/images/loginBackground.jpg");

}
  form{
    width: 800px;
    margin-left: 25%;
    padding: 10px;
    background-color: rgba(0,0,0,.2);
    margin-top: 40px;

  }
  input {
      border: none;
			border-bottom: 2px solid DarkSlateBlue;
			padding: 10px 15px;
      border-radius: 1px;
  }
  .signupbtn{
    height: 40px;
    width: 100px;
    border: none;
    background-color: SpringGreen;
    cursor: pointer;
    color: white;
  }
  .cancle{
    height: 40px;
    width: 100px;
    border: none;
    color: white;
  }
</style>

</head>

<body>

<form method="post" action="../controller/userController.php">
  <h1> <u> Create an account </u> </h1>
<table align="center">
<div class="input-group">
<tr>
<td id="name"> <label class="fn">
First Name: </label>
</td>
<td>
<input type="text" value="<?php echo $fname;?>" name="fname" placeholder="Enter First Name" class="fname"> <br> <span style="color:red"><?php echo $err_fname;?>
</td> <td> <label style="color: white;" class="ln"> Last Name: </label>
<input type="text" value="<?php echo $surname;?>" name="surname" placeholder="Enter Last Name" class="surname"> <br> <span style="color:red"><?php echo $err_surname;?>
</td>
</tr>

<tr> <td id="mobile"> Mobile Number: </td>
<td colspan="2"> <input type="text" value="<?php echo $mobile;?>" name="mobile" placeholder="Enter Mobile Number" class="mobile"> <br> <span style="color:red"><?php echo $err_mobile;?> </td>
</tr>
<tr> <td id="email"> Email: </td>
<td colspan="2"> <input type="text" value="<?php echo $email;?>" name="email" placeholder="Enter Email address" class="email"> <br> <span style="color:red"> <?php echo $err_email;?> </td>
</tr>
<tr> <td id="uname"> uname: </td>
<td colspan="2"> <input type="text" value="<?php echo $uname;?>" name="uname" placeholder="Enter uname address" class="email"> <br> <span style="color:red"> <?php echo $err_uname;?> </td>
</tr>
<tr>
<td id="pass"> Password: </td>
<td colspan="2">  <input id="input-pw" class="active-pw" type="password" value="<?php echo $pass;?>" name="pass" placeholder="Enter password" ><input style="margin-top: 10px;" type="button" value="show" onclick="tooglepass()"> <br> <span style="color:red"><?php echo $err_pass;?>
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
</select>

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
</select>

<select name="year" id="bd3">
<option value="">Select YY</option>
<?php
for ($year = 1905; $year <= 2020; $year++) {
    $selected = (isset($getYear) && $getYear == $year) ? 'selected' : '';
    echo "<option value=$year $selected>$year</option>";
}
?>
</select>
<br> <span style="color:red"><?php echo $err_date;?> </div>
</td>
</tr>

<tr>
<td id="gender"> Gender: </td>

<td colspan="2"> <div class="gender" > <input type="radio" name="gender" value="Male"> <label class="male"> <span style="color:black;"> Male  </label>
<input type="radio" name="gender" value="Female"> <label class="female"> <span style="color:black;"> Female </label>
<input type="radio" name="gender" value="Other"> <label class="other"> <span style="color:black;"> Other </label>
<br> <span style="color:red"><?php echo $err_agender;?> </div>
</td>
</tr>

<tr>
<td id="dept"> Department: </td>
<td colspan="2"> <div class="dept"> <input type="radio" name="dept" value="CSE" class="cse"> <label class="c"> <span style="color:black;"> CSE
<input type="radio" name="dept" value="EEE" class="eee"> <label class="e"> <span style="color:black;"> EEE
<input type="radio" name="dept" value="BBA" class="bba"> <label class="b"> BBA <input type="radio" name="dept" value="Other" class="other"> <label class="o"> <span style="color:black;"> Other
<br> <span style="color:red"><?php echo $err_dept;?> </div>
</td>
</tr>

<tr>
<td id="policy"> Do you agree to our terms and policy?</td>
<td colspan="2"><input type="checkbox" name="agree" value="Yes I agree" class="policy" class="policy"> <span style="color:black;float:left;"> <label class="agree"> Yes I agree </label>
<br> <span style="color:red;position: absolute; transition: all 0.4s ease;
  top: 850px; left: 1030px;"><?php echo $disagree;?>
</td>
</tr>

<tr>
<td colspan="3" align="center">
<button type="submit" name="submit" class="signupbtn">Sign up </button>
<button style='background-color: tomato;' type="submit" name="cancle" class="cancle"><a style='text-decoration: none; color: white;'href='../views/mainHome.php'>Cancle </a></button>
</td>
</tr>



</table>
</form>
</body>
</html>
