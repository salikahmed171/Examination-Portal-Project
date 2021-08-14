<?php
session_start();

if(!isset($_SESSION['stloggedin']) || $_SESSION['stloggedin']!=true){
    header("location:student_login.php");
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
    <title>Student Data</title>
</head>




<body>




  <p style=" color: green; font-size: 20px; text-align: center; margin: 0px 0px 2px 0px;" id="logsuccess">You are Successfully logged in now as <?php echo $_SESSION['stname']?>.</p>  <br>
    <script>
    setTimeout(hidepara,3000);

    function hidepara(){
    document.getElementById('logsuccess').style.visibility='hidden'};
</script>

  <h2 style="text-align: center;">Welcome <?php echo $_SESSION['stname']?></h2> <br> <br>

  <div class="formsrow">

  
  <form action="show_student_marks.php" method="POST"> 
     <button class="btnrow" type="submit" id="first">FIRST SEMESTER</button>
     <input type="hidden" name="stsem" value="1"></input>
  </form>


   <form action="show_student_marks.php" method="POST"> 
     <button class="btnrow" type="submit" id="second">SECOND SEMESTER</button>
     <input type="hidden" name="stsem" value="2"></input>
   </form>


   <form action="show_student_marks.php" method="POST"> 
     <button class="btnrow" type="submit" id="third">THIRD SEMESTER</button>
     <input type="hidden" name="stsem" value="3"></input>
   </form>



   <form action="show_student_marks.php" method="POST"> 
     <button class="btnrow" type="submit" id="fourth">FOURTH SEMESTER</button>
     <input type="hidden" name="stsem" value="4"></input>
  </form>

</div>





    <div class="formsrow">


   <form action="show_student_marks.php" method="POST"> 
     <button class="btnrow" type="submit" id="fifth">FIFTH SEMESTER</button>
     <input type="hidden" name="stsem" value="5"></input>
   </form>



   <form action="show_student_marks.php" method="POST"> 
     <button class="btnrow" type="submit" id="sixth">SIXTH SEMESTER</button>
     <input type="hidden" name="stsem" value="6"></input>
   </form>


   <form action="show_student_marks.php" method="POST"> 
     <button class="btnrow" type="submit" id="seventh">SEVENTH SEMESTER</button>
     <input type="hidden" name="stsem" value="7"></input>
   </form>


   <form action="show_student_marks.php" method="POST"> 
     <button class="btnrow" type="submit" id="eighth">EIGHTH SEMESTER</button>
     <input type="hidden" name="stsem" value="8"></input>
   </form>


    </div>
  
    




   <form  action="student_logout.php" style="text-align: center; margin : 100px"> 
     <button class="btn" type="submit">Logout</button>
   </form>

  
   

       

</body>
</html>