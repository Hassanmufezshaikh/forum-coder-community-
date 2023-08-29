<?php 
$showError="false";
if($_SERVER["REQUEST_METHOD"]=="POST"){
    include'_dbconnect.php';
    $user_email = $_POST['signupemail'];
    $pass = $_POST['signuppassword'];
    $cpass = $_POST['signupcpassword'];
    
    // check whether username exsists or not

    $existSql = "SELECT * FROM `users` WHERE user_email = '$user_email'";
    $result = mysqli_query($conn, $existSql);
    $numRows = mysqli_num_rows($result);
    if($numRows>0){
        $showError = " Email  Already exsits";

    }
    else{
        if($pass == $cpass){
            $hash = password_hash($pass,PASSWORD_DEFAULT);
            $sql= "INSERT INTO `users` (`user_email`, `user_password`) 
            VALUES ('$user_email ', '$hash')";
            $result = mysqli_query($conn, $sql);
            if($result){
                $showAlert= true;
                header("Location:/forum/index.php?signupsuccess=true");
                exit();
            }
            
        } else{
            $showError=" Password donot Match";
          
        }
    }
    header("Location:/forum/index.php?signupsuccess=false&error=$showError");
}
?>