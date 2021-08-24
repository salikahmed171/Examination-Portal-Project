<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Teacher Registration Request</title>
</head>


<body>
    <h2 style="text-align: center;">Welcome to Teachers Registration of Dept of CSE ASSAM UNIVERSITY</h2>


    

        <div style="width: 60%; margin: auto">
        <form action="threg_request.php" method="POST" class="formscol">
            Enter Your Name: <input type="text" name="name" id="name" required>
            Enter Your Aadhar Number: <input type="text" pattern="\d*" maxlength="11" minlength="11" name="aadharth" id="aadharth" required title="Please Enter Only Numbers">
            Enter Your Mobile Number: <input type="text" pattern="\d*" maxlength="10" minlength="10" name="mobileno" id="mobileno" required title="Please Enter Only Numbers">
           

            Choose Your Subject In 5th Semester:
            <select id="sub5sem" name="sub5sem" style="font-size:15px; margin: 11px 0px;padding: 7px; width: 100%; border: 3px solid green;border-radius: 8px;text-align: center;">
                <option></option>
                <option value="OPERATING SYSTEM" >OPERATING SYSTEM</option>
                <option value="MICROPROCESSOR">MICROPROCESSOR</option>
                <option value="AUTOMATA">AUTOMATA</option>
                <option value="COMPUTER GRAPHICS">COMPUTER GRAPHICS</option>
                <option value="SCRIPT PROGRAMMING">SCRIPT PROGRAMMING</option>
            </select> <br>
            
            Choose Your Subject In 6th Semester:
            <select id="sub6sem" name="sub6sem" style="font-size:15px; margin: 11px 0px;padding: 7px; width: 100%; border: 3px solid green;border-radius: 8px;
            text-align: center;">
                <option></option>
                <option value="WEB TECHNOLOGY" >WEB TECHNOLOGY</option>
                <option value="ALGORITHMS">ALGORITHMS</option>
                <option value="COMPUTER NETWORKS">COMPUTER NETWORKS</option>
                <option value="ADV DIGITAL ELEC.">ADVANCED DIGITAL ELECTRONICS</option>
                <option value="SOFTWARE ENGINEERING">SOFTWARE ENGINEERING</option>
            </select> <br>

            Enter Your Password : <input type="password" minlength="8" maxlength="20" name="password" id="password" required>
            Confirm Your Password : <input type="password" minlength="8" maxlength="20" name="cpassword" id="cpassword" required> <br>

            <input type="submit" class="btn" style="width: 100%;" value="SUBMIT">

    

    </form>
</div>




    <?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
   
    include 'dbconnection/CSE_connth.php';

    $name = $_POST["name"];
    $aadharth = $_POST["aadharth"];
    $mobileno = $_POST["mobileno"];
    $sub5sem = $_POST["sub5sem"];
    $sub6sem = $_POST["sub6sem"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];



    if($sub5sem=="" && $sub6sem=="")
    {
        echo"<p class='error'>Please Select Any One Subject.</p>";
        die();
    }



    
    $exist_req = "SELECT `Aadhar Number` FROM `teacher_request` WHERE `Aadhar Number` = '$aadharth'";
    $exist_th = "SELECT `Aadhar Number` FROM `reg_teachers` WHERE `Aadhar Number` = '$aadharth'";

    $existSub = "SELECT * FROM `teacher_subject` WHERE (`5_sem` = '$sub5sem') or (`6_sem`='$sub6sem')";

    
    $result_req = mysqli_query($conn,$exist_req);
    if(!$result_req){
        echo mysqli_error($conn);
    }

    $result_th = mysqli_query($conn,$exist_th);
    if(!$result_th){
        echo mysqli_error($conn);
    }

    $result_sub = mysqli_query($conn,$existSub);
    if(!$result_sub){
        echo mysqli_error($conn);
    }

    $num_Existreq = mysqli_num_rows($result_req);
    $num_Existth = mysqli_num_rows($result_th);
    $num_ExistSub = mysqli_num_rows($result_sub);
    
   
        
        if($num_Existreq > 0){
            echo"<p class='error'>The Request From This Teacher Already Exists.</p>";
            die();
            
        }
     
    


        
        else if($num_Existth> 0){
            
            echo"<p class='error'>The Teacher Is Already Registered With The Department.</p>";
            die();
            }
    
    
       
        else if($num_ExistSub> 0){
            echo"<p class='error'>The Subject Is Already Taken By A Teacher!! <br> Please Choose Other Subject.</p>";
            die();
        
             }
        
    

    
  else {

        if($sub5sem==""){
        $sub5sem="NULL";
         }

        if($sub6sem==""){
        $sub6sem="NULL";
         }


  if($password==$cpassword){
        $hpassword = password_hash($password,PASSWORD_DEFAULT);
        $sql = "INSERT INTO `teacher_request` (`Name`, `Aadhar Number`,`Mobile Number`,`5_sem`,`6_sem`, `Password`) VALUES ('$name', '$aadharth','$mobileno','$sub5sem','$sub6sem','$hpassword')";
        $result = mysqli_query($conn,$sql);

        if($result){
          
          echo"<p class='success'>$name, your request has been submitted and you can login after verification by Admin.</p>";

          echo"<form action='index.html' style='text-align: center; margin : 20px'>
          
          <button type='submit' class='btn'>Go To Home</button>
     </form>";
        }
    }

    else{
        echo"<p class='error'>Passwords do not match.</p>";
    }

}

  }
    
  ?>

</body>

</html>
