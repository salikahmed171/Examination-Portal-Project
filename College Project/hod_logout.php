<?php
session_start();

$_SESSION['hodloggedin']=false;
//session_destroy();
header("location: show_depdata.php");
exit;
?>