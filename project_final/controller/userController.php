<?php
ob_start();
include '../models/database.php';
include '../views/userRegistration.php';

if (isset($_POST['submit'])) {
    if ($has_err=='false') {
        $firstname=$_POST['fname'];
        $lastname=$_POST['surname'];
        $email=$_POST['email'];
        $mobile=$_POST['mobile'];

        $uid=$_POST['uname'];
        $pass=$_POST['pass'];

        $aday=$_POST['day'];
        $amonth=$_POST['month'];
        $ayear=$_POST['year'];
        $dob= $aday."-".$amonth."-".$ayear;

        $gender=$_POST['gender'];
        $department=$_POST['dept'];
        $designation='member';



        $sql="INSERT INTO user (uid,pass,firstname,lastname,mobile,email,dob,gender,department,designation)
 VALUES ('$uid','$pass','$firstname','$lastname','$mobile','$email','$dob','$gender','$department','$designation') ";
        mysqli_query($conn, $sql);

        $sql="SELECT * FROM user WHERE uid='$uid' AND firstname='$firstname'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row= mysqli_fetch_assoc($result)) {
                $userid=$row['id'];
                $sql="INSERT INTO profileimg (userid,status)
         VALUES ('$userid',1)";
                mysqli_query($conn, $sql);
                $ok=1;
                header("Location: ../views/login.php?success=".$ok);
            }
        } else {
            echo "erron in db";
        }
    }
}
