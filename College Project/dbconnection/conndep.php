<?php
$server="localhost";
$username="root";
$password="";
$database="departments";

$conn_dep=mysqli_connect($server,$username,$password,$database);

if(!$conn_dep)
{
    die("Error due to :".mysqli_connect_error());
}
 ?>