<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>DEPARTMENT LOGIN</title>
</head>

<body>
    
    <h2 style="text-align: center;">WELCOME TO DEPARTMENT LOGIN </h2>

    <div class="container">
        <form action="depart_login.php" method="post" class="formscol">
   
           
               <label for="username">Username</label>
               <input type="text" id="username" name="username" required >
               
           
           
               <label for="password">Password</label>
               <input type="password" id="password" name="password" required>
           
          
            
           <button type="submit" class="btn">Login</button>
        </form>
   
   </div>


   <?php


if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'dbconnection/conndep.php';
    $tusername = $_POST["username"];
    $tpassword = $_POST["password"]; 
    
     
    $sql = "Select * from department where Username='$tusername'";
    $result = mysqli_query($conn_dep, $sql);
    $num = mysqli_num_rows($result);
    if ($num==1){
        while($row=mysqli_fetch_assoc($result)){
            if(password_verify($tpassword, $row['Password'])){ 
                $login = true;
                session_start();
                $_SESSION['deploggedin'] = true;
                $_SESSION['depusername'] = $tusername;
                $_SESSION['depname'] = $row['Department'];
                header("location: show_depdata.php");
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