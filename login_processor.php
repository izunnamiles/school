<?php
session_start();
$conn = mysqli_connect("localhost","root","","register_db");
if(isset( $_POST['login'])){
    $email_login = mysqli_real_escape_string($conn, $_POST{'email_login'});
    $password = mysqli_real_escape_string($conn, $_POST{'password'});

    if (empty($email_login) || empty($password)){
        header("location:Log_In.php?empty field");
        exit();
    }else{
        $query = "SELECT * FROM regForm_tb WHERE email= '$email_login'";
        $result = mysqli_query($conn, $query);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck < 1){

            header("Location:Log_In.php?error");
            exit();
        }else{
            if($row = mysqli_fetch_assoc($result)){
                $hashedpwdcheck = password_verify($password,$row['passcode']);
                if ($hashedpwdcheck == false){
                    header("Location:Log_In.php?Incorrect password");
                    exit();
                }elseif ($hashedpwdcheck == true){
                    $_SESSION['u_id'] = $row['id'];
                    $_SESSION['email_login'] = $row['email'];
                    header("Location:Dashboard/dashboard.html?Login successful");
                    exit();
                }

                }
            }


        }


}else{
    header("location:Log_In.php?login-error");
}

