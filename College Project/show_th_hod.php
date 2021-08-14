<?php
session_start();

if(!isset($_SESSION['deploggedin']) || $_SESSION['deploggedin']!=true){
    header("location: depart_login.php");
    exit;
}

if(!isset($_SESSION['hodloggedin']) || $_SESSION['hodloggedin']!=true){
    header("location: hod_login.php");
    exit;
}



if($_SERVER["REQUEST_METHOD"] == "POST"){
$sem= $_POST["semhod"];
$_SESSION['semhod']=$sem;
}

else{
  $sem=$_SESSION['semhod'];
}

$hodregno=$_SESSION['hodregno'];
$hodname=$_SESSION['hodname'];


?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Subject Teachers</title>
</head>
<body>

<h2 style="text-align: center;">Welcome - <?php echo $hodname?></h2> <br>
<h3 style="text-align: center;">Details of <?php echo $sem?>th Semester are:</h3> <br> <br>





<?php

    if($_SESSION['depname'] =="CSE"){
        include 'dbconnection/CSE_connth.php';
        
    }



    
    $semcolumn=$sem."_sem";
    $sql ="Select `Reg Number`,$semcolumn,`Teacher Name` from teacher_subject where $semcolumn IS NOT NULL";
    $result = mysqli_query($conn, $sql);
    if(!$result){
        echo mysqli_error($conn);
    }

    $num = mysqli_num_rows($result);
    //echo $num;


    if ($num>=1){

    ?>


<div >
    <table class="marktable" id="subjectteacher">
      <tr class="headrow">
        <th>Teacher Registration Number</th>
        <th>Teacher Name</th>
        <th>Subject Concerned</th>
      </tr>

      <?php
    

        while($row=mysqli_fetch_assoc($result)){
    
           
          echo "<tr><td>".$row['Reg Number']."</td> <td>".$row['Teacher Name']."</td> <td>".$row[$semcolumn]."</td></tr>";
        }
          
        
        echo "</table>";
     }
    ?>

</div>



<div style="margin: 100px 0px 0px 0px">
        <h3 style="text-align:center; font-size:21px">Enter The Registration Number Of Teacher To get The Marks Of Students of the Subject Taken By the Teacher</h3> 

    <form  action="show_std_details_hod.php" style="text-align: center;" class="formsrow" method="POST"> 

          <b style="margin:0px 3px 0px 30px; font-size:20px">Regestration Number:</b> <input type="number" name="regno_th" style="width:150px" required>

          <button class="btn" style="margin:0px 0px 0px 50px" type="submit">GET DETAILS</button>
         </form>
         
    </div>



                  
<div class="formsrow" style="margin:100px 0px">
   <form  action="hod_logout.php"> 
     <button class="btn" type="submit">Logout</button>
   </form>

   <form  action="depart_logout.php"> 
     <button class="btn" type="submit" style="width:200px">Department Logout</button>
   </form>
</div>


</body>
</html>
