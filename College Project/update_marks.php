<?php
session_start();

if(!isset($_SESSION['deploggedin']) || $_SESSION['deploggedin']!=true){
    header("location: depart_login.php");
    exit;
}

if(!isset($_SESSION['thloggedin']) || $_SESSION['thloggedin']!=true){
    header("location: teacher_login.php");
    exit;
}


if($_SESSION['depname'] =="CSE"){
    include 'dbconnection/CSE_connth.php';
    
}

?>



<!doctype html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   
    <title>Update Marks</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
   
  <div style="margin:250px 0px; text-align:center">


<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $rollno= $_POST["rollno"];
    $internal= $_POST["internal"];
    $midsem= $_POST["midsem"];
    $endsem= $_POST["endsem"];

    $sem=$_SESSION['sem'];
    $sub=$_SESSION['sub'];

    $marks_table=$sem."_sem_std";
    $subint=$sub."_INTERNAL";
    $submid=$sub."_MIDSEM";
    $subend=$sub."_ENDSEM";

    $check="Select `Roll Number` from $marks_table WHERE `Roll Number`=$rollno";
    $res=mysqli_query($conn,$check);
    $num=mysqli_num_rows($res);

    if($num==0){
        echo "<h3 style='text-align:center'>NO SUCH ROLL NUMBER EXISTS</h3>";
    }

    if($num==1){

        if($internal=="" && $midsem=="" && $endsem==""){
            echo "<h3 style='text-align:center'>Please Enter At Least One Marks To Update.</h3>";
            header("Refresh:3; show_thsubject.php");

        }


    if($internal!=""){

      if(is_numeric($internal)){

            
         $sql="UPDATE `$marks_table` SET `$subint` = $internal WHERE `Roll Number` = $rollno";
         $result = mysqli_query($conn, $sql);
           if(!$result){
              echo mysqli_error($conn);
                }

           else{
              echo "<h3 style='text-align:center'>Internal Marks Updated</h3>";
              }
         }

       else{
        echo "<h3 style='text-align:center'>Please Enter Valid Marks In Numbers For Internal</h3>";
       }

    }

    


    if($midsem!=""){

        if(is_numeric($midsem)){

        $sql="UPDATE `$marks_table` SET `$submid` = $midsem WHERE `Roll Number` = $rollno";
        $result = mysqli_query($conn, $sql);
        if(!$result){
            echo mysqli_error($conn);
        }

        else{
            echo "<h3 style='text-align:center'>Midsem Marks Updated</h3>";
        }

    }

     else {
        echo "<h3 style='text-align:center'>Please Enter Valid Marks In Numbers For Midsem</h3>";
     }
 }
    



    if($endsem!=""){

        if(is_numeric($endsem)){

    $sql="UPDATE `$marks_table` SET `$subend` = $endsem WHERE `Roll Number` = $rollno";
    $result = mysqli_query($conn, $sql);
    if(!$result){
        echo mysqli_error($conn);
    }

    else{
        echo "<h3 style='text-align:center'>End Sem Marks Updated</h3>";
      }

    }

else{
    echo "<h3 style='text-align:center'>Please Enter Valid Marks In Numbers For Endsem</h3>";
}

 }

 }
}

header("Refresh:2; show_thsubject.php");

?>

</div>

</body>
</html>

  