<?php
session_start();



if(!isset($_SESSION['admloggedin']) || $_SESSION['admloggedin']!=true){
    header("location: admin_login.php");
    exit;
}

include 'dbconnection/CSE_connth.php'

?>





<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Teachers Registration</title>
</head>

<div style="margin:250px 0px; text-align:center">

<body>



<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $aadhar=$_POST["aadhar"];

    $sql1 ="Select * from teacher_request Where `Aadhar Number`='$aadhar'";
    $result1 = mysqli_query($conn,$sql1);
  
    if(!$result1){
        echo "result1";
      echo mysqli_error($conn);
      header("Refresh:2; dcsn_teacher_admin.php");
      die();
    }

    
    $num=mysqli_num_rows($result1);

    if($num==0){
        echo  "<h3 style='text-align:center'>Please Enter Valid Aadhar Number Of Teacher Requested For Registration</h3>";
        header("Refresh:2; dcsn_teacher_admin.php");
        die();
    }

  
    
    //echo $num;
    
  
    else{
            $row=mysqli_fetch_assoc($result1);

            $name=$row['Name'];
            $mobileno=$row['Mobile Number'];
            $sub5sem=$row['5_sem'];
            $sub6sem=$row['6_sem'];
            $password=$row['Password'];
  
      

            $sql2="INSERT INTO `reg_teachers` (`Teacher`,`Aadhar Number`,`Mobile Number`,`Password`,`Department`) VALUES ('$name','$aadhar','$mobileno','$password','CSE')";

            $result2 = mysqli_query($conn,$sql2);

            if($result2){


              $sql3="Select `Aadhar Number`,`Reg Number` from reg_teachers where `Aadhar Number`='$aadhar'";
              $result3=mysqli_query($conn,$sql3);

              $row=mysqli_fetch_assoc($result3);
              $regno=$row['Reg Number'];

              echo  "<h3 style='text-align:center'>Success!! The Registration Of $name with Registration Number ".$regno." was Successful For The Department Of CSE As A Teacher</h3>";

              echo "<h3 style='text-align:center'>You Can See The Details By Clicking On See Already Registered Teachers.</h3>";


                 

              if($sub5sem!="NULL"){
                $sub5sem="'$sub5sem'";
              }

              if($sub6sem!="NULL"){
                $sub6sem="'$sub6sem'";
              }
                      
            
              $sql="INSERT INTO `teacher_subject` (`Reg Number`,`Teacher Name`,`5_sem`,`6_sem`) VALUES ('$regno','$name',$sub5sem,$sub6sem)";

                      
              $result=mysqli_query($conn,$sql);

              if(!$result){
                echo mysqli_error($conn);
              }

                    

                  
                    
              $sql4="DELETE FROM `teacher_request` WHERE `Aadhar Number` = '$aadhar'";
              $result4=mysqli_query($conn,$sql4);

                
          
            }  //end of if(result of insert into reg_teachers of sql2)

            else{ 
              echo "result2";
              echo mysqli_error($conn);
              header("Refresh:2; dcsn_teacher_admin.php");
              die();
            }


        
          } //end of else that is num is 1

        } // end of if server request method is post


       header("Refresh:2; dcsn_teacher_admin.php");
  
    ?>




 </div>
</body>
</html>
