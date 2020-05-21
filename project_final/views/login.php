<style>
	h1{
		color: white;
		font-size: 40px;
		font-family: Tahoma;
		text-shadow: 2px 2px 5px RebeccaPurple;
	}
	h3{
		color: white;
		font-size: 24px;
		font-family: Tahoma;
		text-shadow: 2px 2px 5px RebeccaPurple;
		line-height: 36px;
	}
	h4{
		color: white;
		font-size: 18px;
		font-family: Tahoma;
		text-shadow: 2px 2px 5px PaleVioletRed;
	}
</style>
<?php
include '../models/database.php';
include '../controller/loginController.php';
$ok = $_GET['success'];
?>
<html>
	<head>
	<meta charset="utf-8" ></meta>
	<link rel="stylesheet" href="loginStyle.css">
	</head>

	<body>
<?php
if ($ok==1) {
    echo "<section><div class='box'><h1>REGISTERED SUCCESSFULLY</h1>
    	<h3 >PLEASE LOGIN</h3></div>";
} else {
    echo "<section><div class='box'>
		<h3 >We are delighted to have you among us. On behalf of all the members and the management,
		 we would like to extend our warmest welcome and good wishes!</h3>

		 <h4>-TeamAIUBForum</h4>
		 </div>";
}
        echo "
		<form method='post' action='".getLoginDetails($conn)."' class='center'>
			<div class='s1'>
			<span><a href='../views/mainHome.php'><b>AIUB Forum</b></a></span>
			</div>
			<div class='s2'>
			<span >Join, Share and Discuss</span>
			</div>
			<div class='frame'>

			<span ><b>Sign In</b></span>
			<input type='text' name='uid' placeholder='User Name:' required >
		  <input type='password' name='pass' placeholder='Password:' required >
			<button type='submit' name='submitLogin'> Login </button>
			<span >Don't have account? <b><a href='../views/userRegistration.php'>Register </a></b></span>
			</div>

		</div>
		</form></section>";

        /*	if(isset($_SESSION['id'])){
                echo "<form method='post' action='../views/moderatorHome'>
                <input type'hidden' type>
                            </form>"
            }else{
                echo "not login";
            }*/
?>
	</body>
</html>
