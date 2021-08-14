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
  <title>Registered Teachers</title>
</head>


<body>




<?php


if($_SERVER["REQUEST_METHOD"] == "POST"){
  $dep= $_POST["dep"];
  
  include 'dbconnection/CSE_connth.php';


  $sql ="Select `Teacher`,`Reg Number`,`Aadhar Number`,`Mobile Number`,`Department` from `reg_teachers`";
  $result = mysqli_query($conn, $sql);

  if(!$result){
    echo mysqli_error($conn);
  }

  
  //echo $num;
  

  else{

  ?>

<h2 style="text-align:center;">Welcome Assam University Admin<br><p>The Registered Teachers of <?php echo $dep ?> Depaerment Are Given Below:</p></h2>
    
<div style="margin:70px 0px;">
 <table class="marktable" id="showregst">
   <tr class="headrow">

     <th>Teacher NAME</th>
     <th>Teacher DEPARTMENT</th>
     <th>Teacher REGISTRATION NUMBER</th>
     <th>Teacher MOBILE NUMBER</th>
     <th>Teacher AADHAR NUMBER</th>
   </tr>



<?php
  while($row=mysqli_fetch_assoc($result)){
  
    echo "<tr><td>".$row['Teacher']."</td> <td>".$row['Department']."</td> <td>".$row['Reg Number']."</td> <td>".$row['Mobile Number']."</td> <td>".$row['Aadhar Number']."</td></tr>";

  } //end of while
  
  
   echo "</table>";
} //end of else


} //end of request method
  

?>

<div class="formsrow" style="margin : 100px">

<form action="dcsn_Teacher_admin.php"> 
     <button class="btn" type="submit">Go Back</button>
</form>

<form action="admin_logout.php"> 
     <button class="btn" type="submit">Logout</button>
</form>

</div>

</body>
</html>


