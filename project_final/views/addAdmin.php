<?php
session_start();

 ?>
 <script>
function validateForm() {

  if( document.myForm.fname.value == "" ) {
            alert( "Please provide your first name!" );
            document.myForm.fname.focus() ;
            return false;
     }
     else if( document.myForm.surname.value == "" ) {
               alert( "Please provide your last name!" );
               document.myForm.surname.focus() ;
               return false;
        }
        else if( document.myForm.email.value == "" ) {
                  alert( "Please provide your email!" );
                  document.myForm.email.focus() ;
                  return false;
           }
          else if( document.myForm.mobile.value == "" ) {
                     alert( "Please provide your mobile number!" );
                     document.myForm.mobile.focus() ;
                     return false;
              }
   else if( document.myForm.dept.value == "" ) {
            alert( "Please provide your department!" );
            document.myForm.dept.focus() ;
            return false;
     }

	else if( document.myForm.uname.value == "" ) {
            alert( "Please provide your username!" );
            document.myForm.uname.focus() ;
            return false;
         }
         else if( document.myForm.pass.value == "" ) {
                   alert( "Please provide your password!" );
                   document.myForm.pass.focus() ;
                   return false;
                }
else if( document.myForm.gender.value == "" ) {
                          alert( "Please provide your gender!" );
                          document.myForm.gender.focus() ;
                          return false;
                       }
   else if( document.myForm.day.value == "" ) {
                                 alert( "Please provide your day!" );
                                 document.myForm.aday.focus() ;
                                 return false;
                              }
                              else if( document.myForm.month.value == "" ) {
                                                            alert( "Please provide your month!" );
                                                            document.myForm.amonth.focus() ;
                                                            return false;
                                                         }
                                                         else if( document.myForm.year.value == "" ) {
                                                                                       alert( "Please provide your year!" );
                                                                                       document.myForm.ayear.focus() ;
                                                                                       return false;
                                                                                    }
	return( true );
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
include '../views/adminMenu.php';

 ?>
	<form method="post" action="../controller/adminController.php" onsubmit="return validateForm()" name="myForm" >
<h1> <u> Add Admin </u> </h1>
      <table align="center">
      <div class="input-group">
      <tr>
      <td id="name"> <label class="fn">
      First Name: </label>
      </td>
      <td>
      <input type="text"  name="fname" placeholder="Enter First Name" class="fname"> <br> <span style="color:red">
      </td> <td> <label style="color: white;" class="ln"> Last Name: </label>
      <input type="text"  name="surname" placeholder="Enter Last Name" class="surname"> <br> <span style="color:red">
      </td>
      </tr>

      <tr> <td id="mobile"> Mobile Number: </td>
      <td colspan="2"> <input type="text" name="mobile" placeholder="Enter Mobile Number" class="mobile"> <br> <span style="color:red"></td>
      </tr>
      <tr> <td id="email"> Email: </td>
      <td colspan="2"> <input type="text"  name="email" placeholder="Enter Email address" class="email"> <br> <span style="color:red">  </td>
      </tr>
      <tr> <td id="uname"> uname: </td>
      <td colspan="2"> <input type="text" name="uname" placeholder="Enter uname address" class="email"> <br> <span style="color:red">  </td>
      </tr>
      <tr>
      <td id="pass"> Password: </td>
      <td colspan="2">  <input id="input-pw" class="active-pw" type="password"  name="pass" placeholder="Enter password" ><input style="margin-top: 10px;" type="button" value="show" onclick="tooglepass()"> <br> <span style="color:red">
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
      </div>
      </td>
      </tr>

      <tr>
      <td id="gender"> Gender: </td>

      <td colspan="2"> <div class="gender" > <input type="radio" name="gender" value="Male"> <label class="male"> <span style="color:black;"> Male  </label>
      <input type="radio" name="gender" value="Female"> <label class="female"> <span style="color:black;"> Female </label>
      <input type="radio" name="gender" value="Other"> <label class="other"> <span style="color:black;"> Other </label>
     </div>
      </td>
      </tr>

      <tr>
      <td id="dept"> Department: </td>
      <td colspan="2"> <div class="dept"> <input type="radio" name="dept" value="CSE" class="cse"> <label class="c"> <span style="color:black;"> CSE
      <input type="radio" name="dept" value="EEE" class="eee"> <label class="e"> <span style="color:black;"> EEE
      <input type="radio" name="dept" value="BBA" class="bba"> <label class="b"> BBA <input type="radio" name="dept" value="Other" class="other"> <label class="o"> <span style="color:black;"> Other
       </div>
      </td>
      </tr>


      <tr>
      <td colspan="3" align="center">
      <input class='inputSubmit' type="submit" name="addAdmin" value="Add" >
      </td>
      </tr>

      </table>


	</form>
</
