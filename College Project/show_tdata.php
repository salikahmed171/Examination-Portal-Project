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


?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Welcome Teacher</title>
</head>

<style>
  h2::before{
    background-image: url(cseim.jpeg);
    background-repeat: no-repeat;
    background-size: cover;
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: -1;
    opacity: 0.7;

}
</style>



<body>


  <p style=" color: yellow; font-size: 20px; text-align: center; margin: 0px 0px 2px 0px;" id="logsuccess">You are Successfully logged in now as <?php echo $_SESSION['thname']?>.</p> 
    <script>
    setTimeout(hidepara,3000);

    function hidepara(){
    document.getElementById('logsuccess').style.visibility='hidden'};
    
</script>

  <h2 style="text-align: center;">Welcome <?php echo $_SESSION['thname']?></h2> <br> <br>

  <div class="formsrow">

  
  <form action="show_thsubject.php" method="POST"> 
     <button class="btnrow" type="submit" id="first">FIRST SEMESTER</button>
     <input type="hidden" name="sem" value="1"></input>
  </form>


   <form action="show_thsubject.php" method="POST"> 
     <button class="btnrow" type="submit" id="second">SECOND SEMESTER</button>
     <input type="hidden" name="sem" value="2"></input>
   </form>


   <form action="show_thsubject.php" method="POST"> 
     <button class="btnrow" type="submit" id="third">THIRD SEMESTER</button>
     <input type="hidden" name="sem" value="3"></input>
   </form>



   <form action="show_thsubject.php" method="POST"> 
     <button class="btnrow" type="submit" id="fourth">FOURTH SEMESTER</button>
     <input type="hidden" name="sem" value="4"></input>
  </form>

</div>





    <div class="formsrow">


   <form action="show_thsubject.php" method="POST"> 
     <button class="btnrow" type="submit" id="fifth">FIFTH SEMESTER</button>
     <input type="hidden" name="sem" value="5"></input>
   </form>



   <form action="show_thsubject.php" method="POST"> 
     <button class="btnrow" type="submit" id="sixth">SIXTH SEMESTER</button>
     <input type="hidden" name="sem" value="6"></input>
   </form>


   <form action="show_thsubject.php" method="POST"> 
     <button class="btnrow" type="submit" id="seventh">SEVENTH SEMESTER</button>
     <input type="hidden" name="sem" value="7"></input>
   </form>


   <form action="show_thsubject.php" method="POST"> 
     <button class="btnrow" type="submit" id="eighth">EIGHTH SEMESTER</button>
     <input type="hidden" name="sem" value="8"></input>
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