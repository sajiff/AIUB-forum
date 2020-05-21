<?php
session_start();
$a = $_SESSION['id'];
include '../models/database.php';

if (isset($_POST['submit'])) {
    $file = $_FILES['file'];

    $fileName=$_FILES['file']['name'];
    $fileTmpName=$_FILES['file']['tmp_name'];
    $fileSize=$_FILES['file']['size'];
    $fileError=$_FILES['file']['error'];
    $fileType=$_FILES['file']['type'];

    $fileExt =explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg','jpeg','png','pdf');
    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 1000000) {
                $fileNameNew = "profile".$a.".".$fileActualExt;
                $fileDestination = '../storage/profileImg/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination); //upload file

                $sql= "UPDATE profileimg SET status=0 WHERE userid='$a'";
                $result= mysqli_query($conn, $sql);

                $url='../views/mainHome.php?$a='.$a;
                header('Location: '.$url);
            } else {
                echo "your file is too big";
            }
        } else {
            echo "there is an error in uploading";
        }
    } else {
        $url='../views/mainHome.php?$a='.$a;
        header('Location: '.$url);
    }
}
