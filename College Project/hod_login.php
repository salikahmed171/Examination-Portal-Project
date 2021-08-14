
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

   
    <title>HOD Login</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>



    
        <h2 style="text-align: center;"> <?php echo $depname?> HOD LOGIN TO THE EXAMINATION PORTAL</h2>

    <div class="container">
     <form action="hod_login.php" method="post" class="formscol">

        
            <label for="regno_hod">Registration Number</label>
            <input type="text" id="regno_hod" name="regno_hod" required >
            
        
        
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
        
       
         
        <button type="submit" class="btn">Login</button>
     </form>

</div>


    

    
<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    //include 'CSE_connth.php';

    if($depname=="CSE"){
    include 'dbconnection/CSE_connth.php';
    }
    $hodregno = $_POST["regno_hod"];
    $hodregno = $hodregno+0;
    $hodpassword = $_POST["password"]; 
   // echo var_dump($thregno);
    $sql = "Select * from reg_hod where `Reg Number`=$hodregno and Department='$depname'";
    $result = mysqli_query($conn,$sql);
    $num = mysqli_num_rows($result);
    
    if ($num==1){
        while($row=mysqli_fetch_assoc($result)){
            if(password_verify($hodpassword, $row['Password'])){ 
                $_SESSION['hodloggedin'] = true;
                $_SESSION['hodregno'] = $hodregno;
                $_SESSION['hodname'] = $row['Hod Name'];
                header("location: show_hoddata.php");
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