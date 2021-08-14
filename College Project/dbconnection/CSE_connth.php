<?php
$server="localhost";
$username="root";
$password="";
$database="cse";

$conn=mysqli_connect($server,$username,$password,$database);

if(!$conn)
{
    die("Error due to :".mysqli_connect_error());
}
 ?>