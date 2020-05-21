<?php
include '../models/databaseManage.php';

if (isset($_POST["addModerator"])) {
    insertModerator();
} elseif (isset($_POST["updateModerator"])) {
    updateModerator();
}

function getAllModerator()
{
    $query ="SELECT * FROM user WHERE designation='moderator'";
    $admins = get($query);
    return $admins;
}
function getModerator($id)
{
    $query="SELECT * FROM user WHERE designation='moderator' AND id=$id";
    $admins=get($query);
    return $admins[0];
}
function deleteModerator($id)
{
    $query="DELETE FROM user WHERE id=$id";
    $admins=get($query);
    return $admins[0];
}
function updateModerator()
{
    $id=$_POST['id'];
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];

    $uid=$_POST['uname'];
    $pass=$_POST['pass'];

    $dob= $_POST['dob'];

    $department=$_POST['department'];



    $sql="UPDATE user SET uid='$uid',pass='$pass',firstname='$firstname',lastname='$lastname',mobile='$mobile',email='$email',dob='$dob',department='$department' WHERE id='$id'";
    execute($sql);

    $url='../views/allModerator.php';
    header('Location: '.$url);
}
function insertModerator()
{
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
    $designation='moderator';

    $sql="INSERT INTO user (uid,pass,firstname,lastname,mobile,email,dob,gender,department,designation)
VALUES ('$uid','$pass','$firstname','$lastname','$mobile','$email','$dob','$gender','$department','$designation') ";
    execute($sql);
    header("Location:../views/allModerator.php");
}
