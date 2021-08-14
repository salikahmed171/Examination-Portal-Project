<?php
session_start();

if(!isset($_SESSION['deploggedin']) || $_SESSION['deploggedin']!=true){
    header("location: depart_login.php");
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
    <title>Department Data</title>
</head>

<style>
  .container::before{
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



<div class="container">
  <p style=" color: yellow; font-size: 20px; text-align: center; margin: 0px 0px 2px 0px;" id="logsuccess">You are Successfully logged in now as <?php echo $_SESSION['depusername']?>.</p> 
    <script>
    setTimeout(hidepara,3000);

    function hidepara(){
    document.getElementById('logsuccess').style.visibility='hidden'};
</script>

  <h2 style="text-align: center;">Welcome <?php echo $_SESSION['depname']?> Department</h2> <br> <br>

  <?php
    include 'dbconnection/conndep.php';
    $depname=$_SESSION['depname'];
    $sql ="Select * from reg_teachers where Department='$depname'";
    $result = mysqli_query($conn_dep, $sql);
    $sem = 1;
    
  

      ?>




</body>

</html>



  <div class="formsrow">
  
  <form action="teacher_login.php"> 
     <button class="btnrow" type="submit"><?php echo"$depname" ?> TEACHER LOGIN</button>
   </form>

   <form action="hod_login.php"> 
     <button class="btnrow" type="submit"><?php echo"$depname" ?> HOD LOGIN</button>
   </form>

    </div>
  





   <form  action="depart_logout.php" style="text-align: center; margin : 100px"> 
     <button class="btn" type="submit" style="width:200px">Department Logout</button>
   </form>
       
    </div>

</body>
</html>