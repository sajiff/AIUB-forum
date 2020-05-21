<?php
include '../models/databaseManage.php';

if (isset($_POST["addUser"])) {
    insertUser();
} elseif (isset($_POST["updateUser"])) {
    updateUser();
} elseif (isset($_POST["updateUserByUser"])) {
    updateUserByUser();
}

function getAllUser()
{
    $query ="SELECT * FROM user WHERE designation='member'";
    $admins = get($query);
    return $admins;
}
function getUser($id)
{
    $query="SELECT * FROM user WHERE designation='member' AND id=$id";
    $admins=get($query);
    return $admins[0];
}
function deleteUser($id)
{
    $query="DELETE FROM user WHERE id=$id";
    $admins=get($query);
    return $admins[0];
}
function updateUser()
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

    $url='../views/allUser.php';
    header('Location: '.$url);
}
function insertUser()
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
    $designation='member';

    $sql="INSERT INTO user (uid,pass,firstname,lastname,mobile,email,dob,gender,department,designation)
VALUES ('$uid','$pass','$firstname','$lastname','$mobile','$email','$dob','$gender','$department','$designation') ";
    execute($sql);
    header("Location:../views/allUser.php");
}
function updateUserByUser()
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

    $url='../views/setting.php';
    header('Location: '.$url);
}
