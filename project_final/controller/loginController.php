<?php
ob_start();

function getLoginDetails($conn)
{
    if (isset($_POST['submitLogin'])) {
        $uid = $_POST['uid'];
        $pass = $_POST['pass'];
        $sql="SELECT * FROM user WHERE uid='$uid' AND pass='$pass'";
        $result =$conn->query($sql);
        if (mysqli_num_rows($result)>0) {
            if ($row=$result->fetch_assoc()) {
                $_SESSION['id']=$row['id'];
                $a= $_SESSION['id'];
                $url='../views/mainHome.php?$a='.$a;
                header('Location: '.$url);
                exit();
            } else {
                header("Location: ../views/mainHome.php?loginFaild");
                exit();
            }
        }
    }
}
