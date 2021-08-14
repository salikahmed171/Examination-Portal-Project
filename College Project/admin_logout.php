<?php
session_start();

//session_unset($_SESSION['loggedin']);
$_SESSION['admloggedin']=false;
//session_destroy();
header("location: admin_login.php");
exit;
?>