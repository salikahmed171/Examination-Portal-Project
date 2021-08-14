<?php
session_start();

//session_unset($_SESSION['thloggedin']);
$_SESSION['thloggedin']=false;
//session_destroy();
header("location: show_depdata.php");
exit;
?>