<?php
$server="localhost";
$username="root";
$password="";
$database="students";

$conn_st=mysqli_connect($server,$username,$password,$database);

if(!$conn_st)
{
    die("Error due to :".mysqli_connect_error());
}
 ?>