<?php
session_start();

//session_unset($_SESSION['thloggedin']);
$_SESSION['deploggedin']=false;
$_SESSION['thloggedin']=false;
//session_destroy();
header("location: depart_login.php");
exit;
?>