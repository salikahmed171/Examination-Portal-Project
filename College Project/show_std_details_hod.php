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

else{
    $sem=$_SESSION['semhod'];
    $hodname=$_SESSION['hodname'];
}

    
    
if($_SESSION['depname'] =="CSE"){
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
   <title>STUDENT DETAILS</title>
 </head>
 
 <body>

 <?php

 if($_SERVER["REQUEST_METHOD"] == "POST"){
        $thregno_hod= $_POST["regno_th"];
        $semcolumn=$sem."_sem";
       // echo $semcolumn;
        $sql ="Select `Teacher Name`,$semcolumn from teacher_subject where `Reg Number`=$thregno_hod";
        $result = mysqli_query($conn, $sql);
        if(!$result){
          echo mysqli_error($conn);
         }
        $num = mysqli_num_rows($result);
        //echo $num;

        if($num==0){
            echo "<h3 style='text-align:center'>NO SUCH REGISTRATION NUMBER EXISTS<br>Please Enter A Valid Registration Number</h3>";
            header("Refresh:2; show_th_hod.php");
            die();
        }
        
    
        if ($num==1){
            $row=mysqli_fetch_assoc($result);
            $thsub=$row[$semcolumn];
            $subthname=$row['Teacher Name'];


             if($thsub==NULL){
                echo "<h3 style='text-align:center'>The Teacher Do Not Take Any Subject In This Semester.<br>Please Enter A Valid Registration Number.</h3>";
            
                header("Refresh:2; show_th_hod.php");
                die();
                }
        
        
        
        
        
             echo "<h3 style='text-align: center;'>Welcome ".$hodname."<br> The Details of ".$sem."th semester are:
          </h3> <br> <br>";
        
          echo "<h2 style='text-align: center;'>".$thsub." <br><br> Teacher: ".$subthname."</h2> <br> <br>";
        
            $marks_table=$semcolumn."_std";
            //echo $marks_table;
            $subint=$thsub."_INTERNAL";
            $submid=$thsub."_MIDSEM";
            $subend=$thsub."_ENDSEM";
        
        
        
            $sql="Select `Student Name`,`Roll Number`,`$subint`,`$submid`,`$subend` from $marks_table";
          
            $result = mysqli_query($conn, $sql);
            if(!$result){
                echo mysqli_error($conn);
            }
            else{
                $numb=mysqli_num_rows($result);
            }
            
            
        
        if($numb>=1){
        
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
              } //end of if(numb)

         } //end of if(num)

    }// end of request method
        
             
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
        
        