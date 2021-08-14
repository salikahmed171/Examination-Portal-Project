<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <title>Admin Login</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>



    <div class="container">
        <h2 style="text-align: center;">WELCOME TO ADMIN LOGIN</h2>
        <form action="admin_login.php" method="post" class="formscol">
        
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>

            
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>


            <button type="submit" class="btn">Login</button>

        </form>

</div>

    



    <?php

$server="localhost";
$username="root";
$password="";
$database="admin";

$conn_ad=mysqli_connect($server,$username,$password,$database);
session_start();


if(!$conn_ad)
{
    die("Error due to :".mysqli_connect_error());
}
 

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST["username"];
    $password = $_POST["password"]; 
    
     
    $sql = "Select * from admins where Username='$username'";
    $result = mysqli_query($conn_ad, $sql);
    $num = mysqli_num_rows($result);
    if ($num==1){
        while($row=mysqli_fetch_assoc($result)){
            if (password_verify($password, $row['Password'])){ 
                session_start();
                $_SESSION['admloggedin'] = true;
                $_SESSION['admusername'] = $username;
                $_SESSION['adminst'] = $row['Institution'];
                header("location: show_addata.php");
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