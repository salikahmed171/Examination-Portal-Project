<?php
session_start();

if(!isset($_SESSION['stloggedin']) || $_SESSION['stloggedin']!=true){
    header("location: student_login.php");
    exit;
}

if($_SESSION['stdep']=="CSE"){
  include 'dbconnection/CSE_connth.php';
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Your Marks</title>
</head>




<body>


    

  <?php

    if($_SERVER["REQUEST_METHOD"] == "POST"){
    $stsem= $_POST["stsem"];
    $_SESSION['stsem']=$stsem;
    $stregno=$_SESSION['stregno'];

   echo" <h2 style='text-align: center;'>Welcome -". $_SESSION['stname']."</h2>";
   echo" <h3 style='text-align: center;'>Your Marks Of ".$stsem."th Semester:</h3> <br> <br>";

    $semcolumn=$stsem."_sem";

    $sql ="Select $semcolumn from teacher_subject where $semcolumn IS NOT NULL";
    $result = mysqli_query($conn,$sql);

    if(!$result){
        echo mysqli_error($conn);
    }

    $num = mysqli_num_rows($result);

    if($num>=1){
        while($row=mysqli_fetch_array($result)){
            $subjects[]=$row[$semcolumn];
        }
    }

    //print_r($subjects);
    $numsubjects=sizeof($subjects);

    $std_marks_table=$semcolumn."_std";

    $sql ="Select * from $std_marks_table where `Reg Number`=$stregno";
    $result = mysqli_query($conn,$sql);

    if(!$result){
        echo mysqli_error($conn);
    }

    $numb = mysqli_num_rows($result);
    
    
    if($numb==1){
        $row=mysqli_fetch_assoc($result);
    
      ?>

  <div>
    <table class="marktable" id="stdmarks">
      <tr class="headrow">
        <th>SUBJECTS</th>
        <th>Internal</th>
        <th>Mid Sem</th>
        <th>End Sem</th>
        <th>Total</th>
      </tr>

      <?php

        for($i=0;$i<$numsubjects;$i++){
          $sub=$subjects[$i];
          //echo $sub;
          $sub_int=$sub."_INTERNAL";
          $sub_mid=$sub."_MIDSEM";
          $sub_end=$sub."_ENDSEM";

          
       echo "<tr><td>".$sub."</td> <td>".$row[$sub_int]."</td> <td>".$row[$sub_mid]. "</td> <td>".$row[$sub_end]."</td> <td></td></tr>";

        }
          
          
          echo "</table>";
      }

    }
      

?>

<script>
        var tab = document.getElementById("stdmarks");
    
        for (let i = 1; i < tab.rows.length; i++) {
          
          var row = tab.rows[i];
          
          var intr = row.cells[1].innerHTML;
          var mid = row.cells[2].innerHTML;
          var end = row.cells[3].innerHTML;

          if (intr == "") {
            row.cells[1].innerHTML = '-';
  
          }

          if (mid == "") {
            row.cells[2].innerHTML = "-";
          }

          if (end == "") {
            row.cells[3].innerHTML = "-";
          }

          if (intr=="" || mid=="" || end==""){
            row.cells[4].innerHTML = "-";
          }

          else{
            var total=parseFloat(intr)+parseFloat(mid)+parseFloat(end);
            total=Math.round(total);
            row.cells[4].innerHTML=total;
          }



        }
      </script>



  </div>






  <form action="student_logout.php" style="text-align: center; margin : 100px">
    <button class="btn" type="submit">Logout</button>
  </form>


</body>

</html>