<?php
session_start();

if(!isset($_SESSION['admloggedin']) || $_SESSION['admloggedin']!=true){
    header("location: admin_login.php");
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
    <title>Admin Page</title>
</head>




<body>


  <p style=" color:green; font-size: 20px; text-align: center; margin: 0px 0px 2px 0px;" id="logsuccess">You are Successfully logged in now as <?php echo $_SESSION['admusername']?>.</p>  <br> <br>
    <script>
    setTimeout(hidepara,3000);

    function hidepara(){
    document.getElementById('logsuccess').style.visibility='hidden'};
</script>

  <h2 style="text-align: center;">Welcome - <?php echo $_SESSION['adminst']?></h2> <br> <br>


<div class="formsrow">

<form action="dcsn_student_admin.php "> 
     <button class="btn" type="submit" style="width:300px">New Student Registration Request</button>
   </form>
       
        
       
   <form action="dcsn_teacher_admin.php " > 
     <button class="btn" type="submit" style="width:300px">New Teacher Registration Request</button>
   </form>
       

</div>



   <form action="admin_logout.php " style="text-align: center; margin : 100px"> 
     <button class="btn" type="submit">Logout</button>
   </form>
       


</body>
</html>