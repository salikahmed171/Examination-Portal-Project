<!doctype html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   
    <title>Student Login</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>



    
        <h2 style="text-align: center;">LOGIN TO THE EXAMINATION PORTAL</h2>
<div class="container">
     <form action="student_login.php" method="post" class="formscol">
        
            <label for="stregno">Registration Number</label>
            <input type="text" id="stregno" name="stregno" required >
            
        
        
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
        
       
         
        <button type="submit" class="btn">Login</button>
        
</form>

</div>


<h3 style="text-align: center;">Not Registered? Register Yourself</h3>
<form action="student_reg.php" style="text-align: center ">


        <button type="submit" class="btn">Register</button>
     </form>



    
<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'dbconnection/conncnst.php';
    $stregno = $_POST["stregno"];
    $password = $_POST["password"]; 
    
     
    $sql = "Select * from st_data where `Reg Number`=$stregno";
    $result = mysqli_query($conn_st, $sql);
    $num = mysqli_num_rows($result);
    if ($num==1){
        while($row=mysqli_fetch_assoc($result)){
            if(password_verify($password, $row['Password'])){ 
                session_start();
                $_SESSION['stloggedin'] = true;
                $_SESSION['stregno'] = $stregno;
                $_SESSION['stname'] = $row['Name'];
                $_SESSION['stdep'] = $row['Department'];
                header("location: show_stdata.php");
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