<?php
session_start();

if(!isset($_SESSION['admloggedin']) || $_SESSION['admloggedin']!=true){
    header("location: admin_login.php");
    exit;
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Registered Students</title>
</head>


<body>




<?php


if($_SERVER["REQUEST_METHOD"] == "POST"){
  $dep= $_POST["dep"];
  
  include 'dbconnection/conncnst.php';


  $sql ="Select `Name`,`Department`,`Reg Number`,`Aadhar Number`,`Mobile Number` from st_data Where `Department`='$dep'";
  $result = mysqli_query($conn_st, $sql);

  if(!$result){
    echo mysqli_error($conn_st);
  }

  
  //echo $num;
  

  else{

  ?>

<h2 style="text-align:center;">Welcome Assam University Admin<br><p>The Registered Students of <?php echo $dep ?> Depaerment Are Given Below:</p></h2>
    
<div style="margin:70px 0px;">
 <table class="marktable" id="showregst">
   <tr class="headrow">

     <th>STUDENT NAME</th>
     <th>STUDENT DEPARTMENT</th>
     <th>STUDENT REGISTRATION NUMBER</th>
     <th>STUDENT MOBILE NUMBER</th>
     <th>STUDENT AADHAR NUMBER</th>
   </tr>



<?php
  while($row=mysqli_fetch_assoc($result)){
  
    echo "<tr><td>".$row['Name']."</td> <td>".$row['Department']."</td> <td>".$row['Reg Number']."</td> <td>".$row['Mobile Number']."</td> <td>".$row['Aadhar Number']."</td></tr>";

  } //end of while
  
  
   echo "</table>";
} //end of else


} //end of request method
  

?>

<div class="formsrow" style="margin : 100px">

<form action="dcsn_student_admin.php"> 
     <button class="btn" type="submit">Go Back</button>
</form>

<form action="admin_logout.php"> 
     <button class="btn" type="submit">Logout</button>
</form>

</div>

</body>
</html>


