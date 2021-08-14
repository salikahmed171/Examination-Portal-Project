<?php
session_start();

if(!isset($_SESSION['admloggedin']) || $_SESSION['admloggedin']!=true){
    header("location: admin_login.php");
    exit;
}

include 'dbconnection/CSE_connth.php';

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Teachers Requests</title>
</head>

<h2 style="text-align:center;">Welcome Assam University Admin<br><p>The Requests For Teacher Registration Are Given Below:</p></h2>
<body>

<?php


$sql="Select `Name`,`Aadhar Number`,`Mobile Number`,`5_sem`,`6_sem` From `teacher_request`";

$result=mysqli_query($conn,$sql);

if(!$result){
 echo mysqli_error($conn);
 }

else{

?>

 <div style="margin:70px 0px;">
 <table class="marktable" id="showstreq">
   <tr class="headrow">

     <th>TEACHER NAME</th>
     <th>TEACHER AADHAR NUMBER</th>
     <th>TEACHER MOBILE NUMBER</th>
     <th>TEACHER 5th SEM SUBJECT</th>
     <th>TEACHER 6th SEM SUBJECT</th>
     
   </tr>

   <?php
     while($row=mysqli_fetch_assoc($result)){
       
     echo "<tr><td>".$row['Name']."</td> <td>".$row['Aadhar Number']."</td> <td>".$row['Mobile Number']."</td> <td>".$row['5_sem']."</td> <td>".$row['6_sem']."</td> </tr>";

     } //end of while
       
       
     echo "</table>";
   } //end of else

  


 ?>

<div style="margin: 100px 0px 0px 0px">

    <h2 style="text-align:center; color:green">Enter The Aadhar Number To Confirm Registration Of a Teacher</h2> 

    <form  action="add_teacher_admin.php" style="text-align: center;" class="formsrow" method="POST"> 

          <b style="margin:0px 3px 0px 30px; font-size:20px;">Aadhar Number:</b> <input type="text" name="aadhar" maxlength="11" minlength="11" pattern="\d*" style="width:170px " required title="Please Enter Only Numbers">

          <button class="btn" style="margin:0px 0px 0px 50px;" type="submit">Register</button>

    </form>
         
</div>


<div style="margin:100px 0px">

<p style="text-align:center; color:blue; font-size:22px">Select The Department Below To See Already Registered Teachers With Department</p> 
<form  action="show_regth_admin.php"class="formsrow" method="POST"> 


    <b style="margin:0px 1px 0px 0px; font-size:20px">Select Department:</b> 
    <select id="dep" class="btnrow" name="dep" required>
                <option value="CSE" selected>CSE</option>
                <option value="ECE">ECE</option>
                <option value="AE">AE</option>
                <option value="LAW">LAW</option>
                <option value="MBA">MBA</option>
    </select>

    <button class="btnrow" style="margin:0px 0px 0px 50px; width:370px; font-size:18px" type="submit">See Already Registered Teachers</button>

</form>

</div>



<form action="admin_logout.php " style="text-align: center; margin : 100px"> 
     <button class="btn" type="submit">Logout</button>
</form>


</body>
</html>

    
