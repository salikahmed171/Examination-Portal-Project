<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Student Registration</title>
</head>

<body>
    <h2 style="text-align: center;">Welcome to Student Registration of Assam University</h2>

        <div class="container">

        <form action="student_reg.php" method="POST" class="formscol">
            Enter Your Name: <input type="text" name="name" id="name" required>

            Select Your Department:  
            <select id="department" name="department" style="font-size:15px; margin: 11px 0px;padding: 7px; width: 100%; border: 3px solid green;border-radius: 8px;
            text-align: center;" required>

                <option value="CSE" selected>CSE</option>
                <option value="ECE">ECE</option>
                <option value="AE">AE</option>
                <option value="LAW">LAW</option>
                <option value="MBA">MBA</option>

            </select>

            Enter Your Mobile Number: <input type="text" name="mobileno" id="mobileno" pattern="\d*" maxlength="10" minlength="10" required title="Please Enter Only Numbers">
            Enter Your Aadhar Number: <input type="text" pattern="\d*" maxlength="11" minlength="11" name="aadhar" id="aadhar" required  title="Please Enter Only Numbers">
            Enter Your Password : <input type="password" name="password" id="password" minlength="8" maxlength="20" required>
            Confirm Your Password : <input type="password" name="cpassword" id="cpassword" minlength="8" maxlength="20" required> <br>

            <button type="submit" class="btn" style="width: 25%;">SUBMIT</button>


    </form>

</div>




    <?php

if($_SERVER["REQUEST_METHOD"] == "POST"){

    if($_POST["aadhar"] == ""){
        echo"<p class='error'>Please Enter the Aadhar Number.</p>";
        die();
    }
    include 'dbconnection/conncnst.php';

    $name = $_POST["name"];
    $department = $_POST["department"];
    $mobileno = $_POST["mobileno"];
    $aadhar = $_POST["aadhar"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    
    
    $existSql1 = "SELECT * FROM `student_request` WHERE `Aadhar Number`=$aadhar";
    $existSql2 = "SELECT * FROM `st_data` WHERE `Aadhar Number`=$aadhar";
    $result1 = mysqli_query($conn_st,$existSql1);
    $result2 = mysqli_query($conn_st,$existSql2);

    $numExistRows1 = mysqli_num_rows($result1);
    $numExistRows2 = mysqli_num_rows($result2);
    

    if($numExistRows2>0){
        echo"<p class='error'>The Student Is Already Registered With The University.</p>";
    }
      

    else if($numExistRows1>0){
        echo"<p class='error'>Request Has  Already Been Given For This Aadhar Number.</p>";
    }
    
  

   else if($password==$cpassword){
        $hpassword = password_hash($password,PASSWORD_DEFAULT);
        $sql="INSERT INTO `student_request` (`Name`,`Department`,`Mobile Number`,`Aadhar Number`,`Password`) VALUES ('$name','$department','$mobileno','$aadhar','$hpassword')";
        $result3=mysqli_query($conn_st,$sql);

        if($result3){

          echo"<p class='success'>$name, Your Request For Registration has been sent to Admin.</p><br>";
          echo"<p style='text-align:center;font-size:25px'>You Will Be Registered After Verification By Admin.</p>";

          echo"<form action='examination.html' style='text-align: center; margin : 30px'>
          
          <button type='submit' class='btn'>Back To Home</button>

          </form>";

        }

        else{
            echo mysqli_error($conn_st);
        }
    }

    else{
        echo"<p class='error'>Passwords do not match.</p>";
    }

   

  }


    

  ?>

</body>

</html>