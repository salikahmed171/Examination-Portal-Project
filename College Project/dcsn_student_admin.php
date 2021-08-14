<?php
session_start();

if(!isset($_SESSION['admloggedin']) || $_SESSION['admloggedin']!=true){
    header("location: admin_login.php");
    exit;
}

include 'dbconnection/conncnst.php';

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Students Requests</title>
</head>

<h2 style="text-align:center;">Welcome Assam University Admin<br><p>The Requests For Student Registration Are Given Below:</p></h2>
<body>

<?php


$sql="Select `Name`,`Department`,`Mobile Number`,`Aadhar Number` From `student_request`";

$result=mysqli_query($conn_st,$sql);

if(!$result){
 echo mysqli_error($conn_st);
 }

else{

?>

 <div style="margin:70px 0px;">
 <table class="marktable" id="showstreq">
   <tr class="headrow">

     <th>STUDENT NAME</th>
     <th>STUDENT DEPARTMENT</th>
     <th>STUDENT MOBILE NUMBER</th>
     <th>STUDENT AADHAR NUMBER</th>
   </tr>

   <?php
     while($row=mysqli_fetch_assoc($result)){
       
     echo "<tr><td>".$row['Name']."</td> <td>".$row['Department']."</td> <td>".$row['Mobile Number']."</td> <td>".$row['Aadhar Number']."</td></tr>";

     } //end of while
       
       
     echo "</table>";
   } //end of else

  


 ?>

<div style="margin: 100px 0px 0px 0px">

    <h2 style="text-align:center; color:green">Enter The Aadhar Number To Confirm Registration Of a Student</h2> 

    <form  action="addstudent_admin.php" style="text-align: center;" class="formsrow" method="POST"> 

          <b style="margin:0px 3px 0px 30px; font-size:20px;">Aadhar Number:</b> <input type="number" name="aadhar" style="width:170px " required>

          <button class="btn" style="margin:0px 0px 0px 50px;" type="submit">Register</button>

    </form>
         
</div>


<div style="margin:100px 0px">

<p style="text-align:center; color:blue; font-size:22px">Select The Department Below To See Already Registered Students With Department</p> 
<form  action="show_regstu_admin.php"class="formsrow" method="POST"> 


    <b style="margin:0px 1px 0px 0px; font-size:20px">Select Department:</b> 
    <select id="dep" class="btnrow" name="dep" required>
                <option value="CSE" selected>CSE</option>
                <option value="ECE">ECE</option>
                <option value="AE">AE</option>
                <option value="LAW">LAW</option>
                <option value="MBA">MBA</option>
    </select>

    <button class="btnrow" style="margin:0px 0px 0px 50px; width:370px; font-size:18px" type="submit">See Already Registered Students</button>

</form>

</div>



<form action="admin_logout.php " style="text-align: center; margin : 100px"> 
     <button class="btn" type="submit">Logout</button>
</form>


</body>
</html>

    
