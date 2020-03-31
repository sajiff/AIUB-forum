<?php

$err_fname=""; 
$fname="";
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

if(isset($_POST['submit']))
{

if(empty($_POST['fname'])){
$err_fname="*First Name is required";
}
else
{
$fname=($_POST['fname']);
 echo $fname ; 
}

if(empty($_POST['surname'])){
$err_surname="*Surname is required";
}
else
{
$surname=($_POST['surname']);
echo $surname; 
}

if(empty($_POST['email'])){
$err_email="*Email Required";
} else {
    $email=($_POST['email']);
	if (strpos($email,"@")==true || strpos($email,".")==true) {
      
	  echo $email ;
    }
	else{
	$err_email = "Invalid email format";
  }
}



if(empty($_POST['mobile'])){
$err_mobile="*Mobile number is required";
}
elseif(preg_match('/^[0-9]{11}+$/', $_POST['mobile']))
	{
		$mobile=($_POST['mobile']);
		echo $mobile;
	}

else{
$err_mobile="Invalid mobile number";
}

if(empty($_POST['pass'])){
$err_pass="*Password is required";
}
elseif (strlen($_POST["pass"]) < '8') {
        $err_pass = "Your Password Must Contain At Least 8 Characters!";
    }
else
{
	$pass=($_POST['pass']);
	echo $pass; 
}

if((empty($_POST['day'])) || (empty($_POST['month'])) || (empty($_POST['year'])))
{
	$err_date="*Please select a date including day,month and year";
}
else
{
	$aday=($_POST['day']);
	$amonth=($_POST['month']);
	$ayear=($_POST['year']);
	echo $aday; echo $amonth; echo $ayear; 
}

if(empty($_POST['gender'])){
$err_agender="*Please Select a gender";
}
else
{
$agender=($_POST['gender']);
 echo $agender ; 
}

if(empty($_POST['dept'])){
$err_dept="*Please Select a department";
}
else
{
$department=($_POST['dept']);
 echo $department ; 
}

if(empty($_POST['agree'])){
$disagree="*You must agree to sign up";
}
else
{
	
$tagree=($_POST['agree']);
 echo $tagree ; 
 
}

}
?>

<!DOCTYPE html>
<html>

<head>
<title> Sign up page </title>
<style>

body {
margin : 0;
background-image: url("AiubPermanentCampus_7.jpg");
background-color: #C4DBF6; 
  height: 670px; 
  background-position: center; 
  background-repeat: no-repeat; 
  background-size: cover; 
}


#logo {
border: none;
margin-right : 20px;
margin-left : 20px;
}
img {
  vertical-align: middle;
  margin-right : 20px;
}


#header {
color: black;
background-color: white;
text-decoration: none;
font-family:georgia;
padding:10px;
text-align: justify;
text-justify: inter-word;
font-size: 24px;
}

h1 {
color: white;
font-family: Calibri;
padding: 10px;
text-align: center;
}

#name{
	color:white;
	font-family: Calibri;
	padding: 10px;
	text-align: right;
	font-size: 18px;
}

#mobile{
	color:white;
	font-family: Calibri;
	padding: 10px;
	text-align: right;
	font-size: 18px;
	
}

#email{
	color:white;
	font-family: Calibri;
	padding: 10px;
	text-align: right;
	font-size: 18px; 
}

#dept{
	color:white;
	font-family: Calibri;
	padding: 10px;
	text-align: right;
	font-size: 18px;
}

#pass{
	color:white;
	font-family: Calibri;
	padding: 10px;
	text-align: right;
	font-size: 18px;
}

#dob{
	color:white;
	font-family: Calibri;
	padding: 10px;
	text-align: right;
	font-size: 18px;
}

#policy{
	color:white;
	font-family: Calibri;
	padding: 10px;
	text-align: right;
	font-size: 18px;
}

#gender{
	color:white;
	font-family: Calibri;
	padding: 10px;
	text-align: right;
	font-size: 18px;
}
.mobile {
	float: left; border-radius: 8px;
}

.gender {
	float: left; 
}

.email {
	float: left; border-radius: 8px;
}
.pass {
	float: left; border-radius: 8px;
}
.dept {
	float: left; 
}
.policy {
	float: left; 
}

.dob{
	float: left;
}

.fname{
	border-radius: 8px;
}

.surname{
	border-radius: 8px;
}

.signupbtn {
text-align: centre;
padding: 15px;
font-size: 13px;
border-radius: 8px;
background-color: white; 
color: black; 
border: 2px solid #008CBA;
width: 80px;
height: 40px;
position:absolute;
transition: .5s ease;
left: 950px;
top: 600px;
}

.signupbtn:hover {
  background-color: #00FF00;
  color: white;
}
</style>
</head>

<body align="center"> 
<div id="header">
<a id="logo">
<img src="AIUB_whole_logo.png"
alt="home logo" height="70px" </a> American International University-Bangladesh Forum 
</div>

<h1> <u> Create an account </u> </h1>
<form action="" method="post">
<table align="center">

<tr>
<td id="name"> 
Name:
</td>
<td>
<input type="text" value="<?php echo $fname;?>" name="fname" placeholder="Enter First Name" class="fname"> <br> <span style="color:red"><?php echo $err_fname;?>
</td> <td>
<input type="text" value="<?php echo $surname;?>" name="surname" placeholder="Enter Surname" class="surname"> <br> <span style="color:red"><?php echo $err_surname;?>
</td> 
</tr>

<tr> <td id="mobile"> Mobile Number: </td> 
<td colspan="2"> <input type="text" value="<?php echo $mobile;?>" name="mobile" placeholder="Enter Mobile Number" class="mobile"> <br> <span style="color:red"><?php echo $err_mobile;?> </td>
</tr>
<tr> <td id="email"> Email: </td>
<td colspan="2"> <input type="text" value="<?php echo $email;?>" name="email" placeholder="Enter Email address" class="email"> <br> <span style="color:red"> <?php echo $err_email;?> </td>
</tr>

<tr>
<td id="pass"> Password: </td>
<td colspan="2"> <input type="password" value="<?php echo $pass;?>" name="pass" placeholder="Enter password" class="pass"> <br> <span style="color:red"><?php echo $err_pass;?> </td> 
</tr>

<tr>
<td id="dob">  Date of Birth: </td>
<td colspan="2"> <div class="dob">
<?php
$DayArray = array("1" => "Sunday", "2" => "Monday", "3" => "Tuesday", "4" => "Wednesday",
"5" => "Thursday", "6" => "Friday", "7" => "Saturday");
?>
<select name="day">
<option value="">Select Day</option>
<?php
foreach ($DayArray as $DayNum=>$day) {
$selected = (isset($getday) && $getday == $dayNum) ? 'selected' : '';
echo '<option ' . $selected . ' value="' . $DayNum . '">' . $day . '</option>';
}
?>
</select>

<?php
$MonthArray = array("1" => "January", "2" => "February", "3" => "March", "4" => "April",
"5" => "May", "6" => "June", "7" => "July", "8" => "August",
"9" => "September", "10" => "October", "11" => "November", "12" => "December");
?>
<select name="month">
<option value="">Select Month</option>
<?php
foreach ($MonthArray as $monthNum=>$month) {
$selected = (isset($getMonth) && $getMonth == $monthNum) ? 'selected' : '';
echo '<option ' . $selected . ' value="' . $monthNum . '">' . $month . '</option>';
}
?>
</select>

<select name="year">
<option value="">Select Year</option>
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

<td colspan="2"> <div class="gender"> <input type="radio" name="gender" value="Male"> <span style="color:white;"> Male 
<input type="radio" name="gender" value="Female"> <span style="color:white;"> Female 
<input type="radio" name="gender" value="Other"> <span style="color:white;"> Other 
<br> <span style="color:red"><?php echo $err_agender;?> </div>
</td>
</tr>

<tr> 
<td id="dept"> Department: </td> 
<td colspan="2"> <div class="dept"> <input type="radio" name="dept" value="CSE"> <span style="color:white;"> CSE 
<input type="radio" name="dept" value="EEE"> <span style="color:white;"> EEE 
<input type="radio" name="dept" value="BBA"> BBA <input type="radio" name="gender" value="Other"> <span style="color:white;"> Other 
<br> <span style="color:red"><?php echo $err_dept;?> </div>
</td>
</tr>

<tr>
<td id="policy"> Do you agree to our terms and policy: </td>
<td colspan="2"><input type="checkbox" name="agree" value="Yes I agree" class="policy"> <span style="color:white;float:left;"> Yes I agree 
<br> <span style="color:red"><?php echo $disagree;?>
</td>
</tr>

<tr>
<td colspan="3" align="center">
<input type="submit" name="submit" value="Submit" class="signupbtn">
</td>
</tr>



</table>
</form>
</body>
</html>