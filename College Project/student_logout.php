<?php
session_start();

//session_unset($_SESSION['loggedin']);
$_SESSION['stloggedin']=false;
//session_destroy();
header("location: student_login.php");
exit;
?>