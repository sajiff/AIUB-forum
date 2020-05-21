<?php
ob_start();
date_default_timezone_set('Asia/Dhaka');
$c=0;
function setComments($conn)
{
    if (isset($_POST['submitComment'])) {
        $uid=$_POST['uid'];
        $date=$_POST['date'];
        $message=$_POST['message'];

        if (empty($message)) {
            $a = $_SESSION['id'];
            $url='../views/mainHome.php?$a='.$a;
            header('Location: '.$url);
        } else {
            $sql="INSERT INTO comments (uid,date,message)
         VALUES ('$uid','$date','$message') ";
            $result = $conn->query($sql);
        }
    }
}

function getComments($conn)
{
    $sql="SELECT * FROM comments";
    $result =$conn->query($sql);
    while ($row=$result->fetch_assoc()) { //splite the query
        $id=$row['uid'];
        $sql_gu="SELECT * FROM user WHERE id='$id'";
        $result_gu =$conn->query($sql_gu); //which user posting what

        echo "<div class='commentBox'>";
        $sqlImg = "SELECT status FROM profileimg WHERE userid= '$id'";
        if ($sqlImg == 0) {
            echo "<img src='../storage/profileImg/profile".$id.".jpg' style='height: 60px; width:60px; border:2px solid white; border-radius: 50%;'>";
        } else {
            echo "<img src='../storage/images/been.jpg' style='height: 60px; width:60px'>";
        }
        if ($row_gu=$result_gu->fetch_assoc()) {
            echo "<tr><td>&nbsp<i>From: </i><b>".$row_gu['uid']."</b>&nbsp&nbsp</td></tr>";
            echo "<tr><td>&nbsp&nbsp<i>At: </i><b>".$row['date']."</b></td></tr><hr style='border-top: 1px dashed SpringGreen;border-radius:10px;'>";
            echo "<tr><td><P class='para'>";
            echo nl2br($row['message']);
            echo "</p>";
            if (isset($_SESSION['id'])) {
                if ($_SESSION['id']==$row_gu['id']) {
                    echo "<form class='deleteform' method='POST' action='".deleteComments($conn)."'>
            <input type='hidden' name='cid' value='".$row['cid']."'>
            <button type='submit' name='deleteComment'>delete</button>
          </form>
                <form class='editform' method='POST' action='../views/editComment.php'>
                  <input type='hidden' name='cid' value='".$row['cid']."'>
                  <input type='hidden' name='uid' value='".$row['uid']."'>
                  <input type='hidden' name='date' value='".$row['date']."'>
                  <input type='hidden' name='message' value='".$row['message']."'> </input>
                  <button>edit</button>
                </form>";
                } else {
                    $id = $_SESSION['id'];
                    echo "<form class='replyfrom' method='POST' action='../views/reply.php'>
            <input type='hidden' name='uid' value='".$id."'>
            <input type='hidden' name='cid' value='".$row['cid']."'>
            <button type='submit' name='reply'>reply</button>
          </form>";
                }
            } else {
                echo "<p>you are not log in</p>";
            }
            echo "</div></td></tr>";
        }
        $cid=$row['cid'];
        $sql_r="SELECT * FROM reply WHERE cid='$cid'";
        $result_r =$conn->query($sql_r);
        while ($row_r=$result_r->fetch_assoc()) {
            $id=$row_r['uid'];
            $sql_g="SELECT * FROM user WHERE id='$id'";
            $result_ru =$conn->query($sql_g);

            echo "<div class='replyBox'>";
            $sqlImg = "SELECT status FROM profileimg WHERE userid= '$id'";
            if ($sqlImg == 0) {
                echo "<img src='../storage/profileImg/profile".$id.".jpg' style='height: 50px; width:50px; border:2px solid white; border-radius: 50%;'>";
            } else {
                echo "<img src='../storage/images/been.jpg' style='height: 60px; width:60px'>";
            }

            if ($row_ru=$result_ru->fetch_assoc()) {
                echo "<tr><td>&nbsp <sup style='color:RED;'><b>reply</b></sup><i>From: </i><b>".$row_ru['uid']."</b>&nbsp&nbsp</td></tr>";
                echo "<tr><td>&nbsp&nbsp<i>At: </i><b>".$row_r['date']."</b></td></tr><hr style='border-top: 1px dashed tomato;'>";
                echo "<tr><td><P>";
                echo nl2br($row_r['message']);
                echo "</p>";
                if (isset($_SESSION['id'])) {
                    if ($_SESSION['id']==$row_r['uid']) {
                        echo "<form class='deleteform' method='POST' action='".deletereply($conn)."'>
        <input type='hidden' name='cid' value='".$row_r['rid']."'>
        <button type='submit' name='deleteComment' style='background-color: #FFFFF0;'>delete</button>
      </form>
            <form class='editform' method='POST' action='../views/editreply.php'>
              <input type='hidden' name='cid' value='".$row_r['rid']."'>
              <input type='hidden' name='uid' value='".$row_r['uid']."'>
              <input type='hidden' name='date' value='".$row_r['date']."'>
              <input type='hidden' name='message' value='".$row_r['message']."'> </input>
              <button style='background-color: #FFFFF0;'>edit</button>
            </form>";
                    } else {
                        $id = $_SESSION['id'];
                        echo "<form class='replyfrom' method='POST' action='../views/reply.php'>
        <input type='hidden' name='uid' value='".$id."'>
        <input type='hidden' name='cid' value='".$row_r['cid']."'>
        <button type='submit' class='replybutton' name='reply'>reply</button>
      </form>";
                    }
                } else {
                    echo "<p>you are not log in</p>";
                }
                echo "</div></td></tr>";
            }
        }
    }
}
function editComments($conn)
{
    if (isset($_SESSION['id'])) {
        if (isset($_POST['submitComment'])) {
            $cid=$_POST['cid'];
            $uid=$_POST['uid'];
            $date=$_POST['date'];
            $message=$_POST['message'];

            if (empty($message)) {
                $a = $_SESSION['id'];
                $url='../views/mainHome.php?$a='.$a;
                header('Location: '.$url);
            } else {
                $sql="UPDATE comments SET message='$message' WHERE cid='$cid'";
                $result =$conn->query($sql);
                $a= $_SESSION['id'];
                $url='../views/mainHome.php?$a='.$a;
                header('Location: '.$url);
            }
        }
    }
}
function editreply($conn)
{
    if (isset($_SESSION['id'])) {
        if (isset($_POST['submitComment'])) {
            $cid=$_POST['cid'];
            $uid=$_POST['uid'];
            $date=$_POST['date'];
            $message=$_POST['message'];
            if (empty($message)) {
                $a = $_SESSION['id'];
                $url='../views/mainHome.php?$a='.$a;
                header('Location: '.$url);
            } else {
                $sql="UPDATE reply SET message='$message' WHERE rid='$cid'";
                $result =$conn->query($sql);
                $a= $_SESSION['id'];
                $url='../views/mainHome.php?$a='.$a;
                header('Location: '.$url);
            }
        }
    }
}

function replyComments($conn)
{
    if (isset($_SESSION['id'])) {
        if (isset($_POST['replyComment'])) {
            $cid=$_POST['cid'];
            $uid=$_POST['uid'];
            $date=date('Y-m-d H:i:s');
            $message=$_POST['message'];

            if (empty($message)) {
                $a = $_SESSION['id'];
                $url='../views/mainHome.php?$a='.$a;
                header('Location: '.$url);
            } else {
                $sql="INSERT INTO reply (uid,cid,date,message)
         VALUES ('$uid','$cid','$date','$message') ";
                $result =$conn->query($sql);

                $a = $_SESSION['id'];
                $url='../views/mainHome.php?$a='.$a;
                header('Location: '.$url);
            }
        }
    }
}

function deletereply($conn)
{
    if (isset($_POST['deleteComment'])) {
        $cid=$_POST['cid'];

        $sql="DELETE FROM reply WHERE rid='$cid'";
        $result =$conn->query($sql);
        $a= $_SESSION['id'];
        $url='../views/mainHome.php?$a='.$a;
        header('Location: '.$url);
    }
}
function deleteComments($conn)
{
    if (isset($_POST['deleteComment'])) {
        $cid=$_POST['cid'];

        $sql="DELETE FROM comments WHERE cid='$cid'";
        $result =$conn->query($sql);
        $a= $_SESSION['id'];
        $url='../views/mainHome.php?$a='.$a;
        header('Location: '.$url);
    }
}


/*function userLogout(){
  if(isset($_POST['submitLogout']))
  {
  session_destroy();
  header("Location: ../views/login.php");
  exit();
}
}*/
