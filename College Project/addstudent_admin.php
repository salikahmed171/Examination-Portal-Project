<?php
session_start();

if(!isset($_SESSION['admloggedin']) || $_SESSION['admloggedin']!=true){
    header("location: admin_login.php");
    exit;
}

include 'dbconnection/conncnst.php'

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

<div style="margin:250px 0px; text-align:center">

<body>

<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $aadhar=$_POST["aadhar"];

    $sql1 ="Select `Name`,`Department`,`Aadhar Number`,`Mobile Number`,`Password` from student_request Where `Aadhar Number`='$aadhar'";
    $result1 = mysqli_query($conn_st,$sql1);
  
    if(!$result1){
      echo mysqli_error($conn_st);
      die();
    }

    
    $num=mysqli_num_rows($result1);

    if($num==0){
        echo  "<h3 style='text-align:center'>Please Enter Valid Aadhar Number Of Student Requested For Registration</h3>";
    }

  
    
    //echo $num;
    
  
    else{
            $row=mysqli_fetch_assoc($result1);

            $name=$row['Name'];
            $department=$row['Department'];
            $mobileno=$row['Mobile Number'];
            $password=$row['Password'];
  
      

            $sql2="INSERT INTO `st_data` (`Name`,`Department`, `Mobile Number`, `Aadhar Number`, `Password`, `Date`) VALUES ('$name', '$department', '$mobileno', '$aadhar', '$password', current_timestamp())";

            $result2 = mysqli_query($conn_st,$sql2);

            if($result2){


              $sql3="Select `Aadhar Number`,`Reg Number` from st_data where `Aadhar Number`='$aadhar'";
              $result3=mysqli_query($conn_st,$sql3);

              $row=mysqli_fetch_assoc($result3);
              $regno=$row['Reg Number'];

              echo  "<h3 style='text-align:center'>Success!! The Registration Of $name with Registration Number ".$regno." was Successful For The Department Of $department</h3>";

              echo "<h3 style='text-align:center'>You Can See The Details By Clicking On See Already Registered Students.</h3>";

              $sql4="DELETE FROM `student_request` WHERE `Aadhar Number` = '$aadhar'";
              $result4=mysqli_query($conn_st,$sql4);






                   if($department=="CSE"){
                   include 'dbconnection/CSE_connth.php';
                
                  for($i=5;$i<=6;$i++){
         
                    $sttable=$i."_sem_std";
                    $sql="INSERT INTO `$sttable` (`Reg Number`,`Student Name`) VALUES ('$regno','$name')";
                    $result=mysqli_query($conn,$sql);

                  
                   }  //end of forloop

              } //end of if(department check)
                
          
            }  //end of if(result of insert into st_data of sql2)

            else{ 
              echo mysqli_error($conn_st);
              die();
            }


        
          } //end of else that is num is 1

        } // end of if server request method is post


        header("Refresh:2; dcsn_student_admin.php");
  
    ?>



 </div>
</body>
</html>
