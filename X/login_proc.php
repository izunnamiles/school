<?php
session_start();

require_once("function.php");

$connection = mysql_connector("localhost","root","","Company_db");


if(isset($_POST['project_login'])){

    //get the values
   $log_password = mysqli_real_escape_string($connection, $_POST['log_password']);
   $log_email = mysqli_real_escape_string($connection, $_POST['log_email']);

   //validate the values
    $post_array = array($log_email, $log_password);
    $fields_array = array("Email", "Password");

    for($i = 0; $i < count($post_array); $i++){

        if(validator($post_array[$i],'empty') === true){

            $error = $fields_array[$i]." is required";
            header("location:my_login.php?error=$error");
            die();

        }

    }

    if(validator($log_email,'email_validation') === true){
        $error = "Please supply a valid email address";
        header("location:my_login.php?error=$error");
        die();
    }

    //hassh the password
    $hashed_password = md5($log_password);

    //run a select query
    $query = "SELECT * FROM company_tb WHERE Email = '$log_email' AND Password = '$hashed_password'";

    $result = mysqli_query($connection, $query);

    $num_rows = mysqli_num_rows($result);

    echo $num_rows;
    if($num_rows == 1){

        while($row = mysqli_fetch_array($result)){

            $_SESSION['my_login'] = $row['email'];
            $_SESSION['unique_id'] = $row['id'];
            $_SESSION['full_name'] = $row['first_name'].' '.$row['last_name'];

        }
        header("location:main_dashboard.php");

    }else{

        $error = "Incorrect username/Password";
        header("location:my_login.php?error=$error");

    }



}



?>