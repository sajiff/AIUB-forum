<?php
include '../models/databaseManage.php';

if (isset($_POST["addAdmin"])) {
    insertAdmin();
} elseif (isset($_POST["updateAdmin"])) {
    updateAdmin();
} elseif (isset($_POST["deleteAdmin"])) {
    deleteAdmin();
} elseif (isset($_POST["cancle"])) {
    header("Location: ../views/setting.php");
}

function getAllAdmins()
{
    $query ="SELECT * FROM user WHERE designation='admin'";
    $admins = get($query);
    return $admins;
}
function getAdmin($id)
{
    $query="SELECT * FROM user WHERE designation='admin' AND id=$id";
    $admins=get($query);
    return $admins[0];
}
function deleteAdmin($id)
{
    if ($id==1) {
        header('Location:../views/alladmin.php');
    } else {
        $query="DELETE FROM user WHERE id=$id";
        $admins=get($query);
        return $admins[0];
    }

    //  $queryC ="DELETE FROM comments WHERE uid=$id";
    //  execute($queryC);
}
function updateAdmin()
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

    $url='../views/alladmin.php';
    header('Location: '.$url);
}
function insertAdmin()
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
    $designation='admin';

    $sql="INSERT INTO user (uid,pass,firstname,lastname,mobile,email,dob,gender,department,designation)
VALUES ('$uid','$pass','$firstname','$lastname','$mobile','$email','$dob','$gender','$department','$designation') ";
    execute($sql);
    header("Location:../views/alladmin.php");
}
