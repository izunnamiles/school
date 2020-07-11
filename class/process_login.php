<?php
session_start();
require_once("library.php");
$lib = new processes();
$lib->getConnection();

if(isset($_POST['login'])){

    //get the values
    $email_login = mysqli_real_escape_string($lib->con, $_POST['email_login']);
   $password = mysqli_real_escape_string($lib->con, $_POST['password']);


   //validate the values
    $post_array = array($email_login, $password);
    $fields_array = array("Email", "Password");

    for($i = 0; $i < count($post_array); $i++){

        if($lib->validator($post_array[$i],'empty') === true){

            $error = $fields_array[$i]." is required";
            header("location:../Log_In.php?error=$error");
            die();

        }

    }

    if($lib->validator($email_login,'email_validation') === true){
        $error = "Please supply a valid email address";
        header("location:../Log_In.php?error=$error");
        die();
    }

    //hassh the password
    $hashed_password = md5($password);

    //run a select query
    $query = "SELECT * FROM regForm_tb WHERE email = '$email_login' AND passcode = '$hashed_password'";

    $result = mysqli_query($lib->con, $query);

    $num_rows = mysqli_num_rows($result);

    if($num_rows == 1){

        while($row = mysqli_fetch_array($result)){

            $_SESSION['logged_email'] = $row['email'];
            $_SESSION['unique_id'] = $row['id'];
            $_SESSION['full_name'] = $row['first_name'].' '.$row['last_name'];
            $_SESSION['u_country'] = $row['country'];
            $_SESSION['u_address'] = $row['address'];
            $_SESSION['u_state'] = $row['state'];
            $_SESSION['u_first'] = $row['first_name'];
            $_SESSION['u_last'] = $row['last_name'];
            $_SESSION['u_passport'] = $row['passport'];

        }
        header("location:../User/dashboard.php");

    }else{

        $error = "Incorrect username/Password";
        header("location:../log_In.php?error=$error");

    }

}