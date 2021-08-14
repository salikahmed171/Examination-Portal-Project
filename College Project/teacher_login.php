
<?php
session_start();

if(!isset($_SESSION['deploggedin']) || $_SESSION['deploggedin']!=true){
    header("location: depart_login.php");
    exit;
}


else{
    $depname=$_SESSION['depname'];
}
?>




<!doctype html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   
    <title>Teacher Login</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>



    
        <h2 style="text-align: center;"> <?php echo $depname?> TEACHER LOGIN TO THE EXAMINATION PORTAL</h2>

    <div class="container">
     <form action="teacher_login.php" method="post" class="formscol">

        
            <label for="regno_th">Registration Number</label>
            <input type="text" id="regno_th" name="regno_th" required >
            
        
        
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
        
       
         
        <button type="submit" class="btn">Login</button>
     </form>

</div>


<h3 style="text-align: center;">New Teacher Registration! Register Yourself</h3>

     <form action="threg_request.php" style="text-align: center;">
        <button type="submit" class="btn">Register</button>
     </form>
    


    
<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    //include 'CSE_connth.php';

    if($depname=="CSE"){
    include 'dbconnection/CSE_connth.php';
    }
    $thregno = $_POST["regno_th"];
    $thregno = $thregno+0;
    $thpassword = $_POST["password"]; 
   // echo var_dump($thregno);
    $sql = "Select * from reg_teachers where `Reg Number`=$thregno and Department='$depname'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    
    if ($num==1){
        while($row=mysqli_fetch_assoc($result)){
            if(password_verify($thpassword, $row['Password'])){  
                $_SESSION['thloggedin'] = true;
                $_SESSION['thregno'] = $thregno;
                $_SESSION['thname'] = $row['Teacher'];
                header("location: show_tdata.php");
            } 
            else{
                echo"<p class='error'>Invalid Password</p>";
            }
        }
        
    } 
    else{
        echo"<p class='error'>Invalid Username or Password</p>";
    
    }
}
    
?>





  </body>
</html>