
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



if($_SERVER["REQUEST_METHOD"] == "POST"){
$sem= $_POST["sem"];
$_SESSION['sem']=$sem;
}

else{
  $sem=$_SESSION['sem'];
}




    if($_SESSION['depname'] =="CSE"){
        include 'dbconnection/CSE_connth.php';
        
    }

    $thregno=$_SESSION['thregno'];
    $thname=$_SESSION['thname'];
    $semcolumn=$sem."_sem";
   // echo $semcolumn;
    $sql ="Select $semcolumn from teacher_subject where `Reg Number`=$thregno";
    $result = mysqli_query($conn, $sql);
    if(!$result){
      echo mysqli_error($conn);
  }
    $num = mysqli_num_rows($result);
    //echo $num;
    

    if ($num==1){
        $row=mysqli_fetch_assoc($result);
        $sub=$row[$semcolumn];
        
     }
     $_SESSION['sub']=$sub;

    

    ?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Your Subjects</title>
</head>


<body>

 <?php

     if($sub==NULL){
         echo "<h3 style='text-align: center;'>Sorry, You Don't Take Any Subject In This Semester. </h3>";
         ?>

         <form  action="teacher_logout.php" style="text-align: center; margin : 100px"> 
          <button class="btn" type="submit">Logout</button>
         </form>

   <?php
   die();
 }





     echo "<h3 style='text-align: center;'>Welcome ".$thname."<br> Your Subects of ".$sem."th semester are:
  </h3> <br> <br>";

  echo "<h2 style='text-align: center;'>".$sub."</h2> <br> <br>";

    $marks_table=$semcolumn."_std";
    //echo $marks_table;
    $subint=$sub."_INTERNAL";
    $submid=$sub."_MIDSEM";
    $subend=$sub."_ENDSEM";



    $sql="Select `Student Name`,`Roll Number`,`$subint`,`$submid`,`$subend` from $marks_table";
  
    $result = mysqli_query($conn, $sql);
    if(!$result){
        echo mysqli_error($conn);
    }
    
    

if($result){

    ?>


  <div>
    <table class="marktable" id="showmarks">
      <tr class="headrow">
        <th>STUDENT ROLL NO.</th>
        <th>STUDENT NAME</th>
        <th>INTERNAL MARKS</th>
        <th>MID SEM MARKS</th>
        <th>END SEM MARKS</th>
        <th>TOTAL MARKS</th>
      </tr>

      <?php
        while($row=mysqli_fetch_assoc($result)){
          
        echo "<tr><td>".$row['Roll Number']."</td> <td>".$row['Student Name']."</td> <td>".$row[$subint]."</td> <td>".$row[$submid]."</td> <td>".$row[$subend]."</td> <td></td> </tr>";

        } //end of while
          
          
    
        echo "</table>";
      } //end of if(result)

     


       ?>


    
<script>
        var tab = document.getElementById("showmarks");
    
        for (let i = 1; i < tab.rows.length; i++) {
          
          var row = tab.rows[i];
          
          var intr = row.cells[2].innerHTML;
          var mid = row.cells[3].innerHTML;
          var end = row.cells[4].innerHTML;

          if (intr == "") {
            row.cells[2].innerHTML = '-';
  
          }

          if (mid == "") {
            row.cells[3].innerHTML = "-";
          }

          if (end == "") {
            row.cells[4].innerHTML = "-";
          }

          if (intr=="" || mid=="" || end==""){
            row.cells[5].innerHTML = "-";
          }

          else{
            var total=parseFloat(intr)+parseFloat(mid)+parseFloat(end);
            total=Math.round(total);

            row.cells[5].innerHTML=total;
          }



        }
      </script>


    </div>


    <div style="margin: 100px 0px 0px 0px">
        <h3 style="text-align:center;">Enter The Roll Number, And Followed by their Marks in their Respective Exams.</h3> 
    <form  action="update_marks.php" style="text-align: center;" class="formsrow" method="POST"> 

          <b style="margin:0px 3px 0px 30px; font-size:20px">Roll Number:</b> <input type="number" name="rollno" style="width:100px " required>

          <b style="margin:0px 3px 0px 30px; font-size:20px">Internal:</b> <input type="text" name="internal" style="width:50px; border: 2px solid #003cff">

          <b style="margin:0px 3px 0px 30px; font-size:20px">Midsem:</b> <input type="text" name="midsem" style="width:50px;  border: 2px solid #003cff">

          <b style="margin:0px 3px 0px 30px; font-size:20px">Endsem:</b> <input type="text" name="endsem" style="width:50px;  border: 2px solid #003cff">

          <button class="btn" style="margin:0px 0px 0px 50px" type="submit">UPDATE</button>
         </form>
         
    </div>





  

<div class="formsrow" style="margin:100px 0px">
   <form  action="teacher_logout.php"> 
     <button class="btn" type="submit">Logout</button>
   </form>

   <form  action="depart_logout.php"> 
     <button class="btn" type="submit" style="width:200px">Department Logout</button>
   </form>
</div>

       

</body>

</html>

