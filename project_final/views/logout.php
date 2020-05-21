<?php
session_unset($_SESSION['id']);
session_destroy();
header("Location: ../views/mainHome.php");
