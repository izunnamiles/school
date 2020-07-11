<?php
session_start();
require_once("../class/library.php");
$lib = new processes();
$lib->getConnection();
if(isset($_POST['admin_login'])){

    //get the values
    $admin_email = mysqli_real_escape_string($lib->con, $_POST['admin_email']);
    $admin_password = mysqli_real_escape_string($lib->con, $_POST['admin_password']);


    //validate the values
    $post_array = array($admin_email, $admin_password);
    $fields_array = array("Email", "Password");

    for($i = 0; $i < count($post_array); $i++){

        if($lib->validator($post_array[$i],'empty') === true){

            $error = $fields_array[$i]." is required";
            header("location:admin_login.php?error=$error");
            die();

        }

    }

    if($lib->validator($admin_email,'email_validation') === true){
        $error = "Please supply a valid email address";
        header("location:admin_login.php?error=$error");
        die();
    }


    //run a select query
    $query = "SELECT * FROM admin_tb WHERE admin_email = '$admin_email' AND admin_password = '$admin_password'";

    $result = mysqli_query($lib->con, $query);

    $num_rows = mysqli_num_rows($result);

    if($num_rows == 1){

        while($row = mysqli_fetch_array($result)){

            $_SESSION['logged_email'] = $row['admin_email'];
            $_SESSION['unique_id'] = $row['id'];
            $_SESSION['full_name'] = $row['admin_first'].' '.$row['admin_last'];


        }
        header("location:admin_table.php");

    }else{

        $error = "Incorrect username/Password";
        header("location:admin_login.php?error=$error");

    }




}
?>