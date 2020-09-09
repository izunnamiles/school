<?php
session_start();
//$con = mysqli_connect("localhost","root","","register_db");
if(isset($_POST['update_info'])){
    include_once "../Processor.php";
    $update_address = mysqli_escape_string($conn,$_POST['update_address']);
    $update_state = mysqli_escape_string($conn,$_POST['update_state']);

    $post_array = array($update_address,$update_state);
    $field_array = array("update_address","update_state");

    for($i = 0; $i < count($post_array); $i++){

        if(validator($post_array[$i], "empty") === true){
            $error = $field_array[$i]." is required!";
            header("location:user.php?error=$error&id=$id");
            die();
        }

    }

//    if(empty($post_array) && empty($field_array)){
//       header("location:user.php?success =$error");
//    }
    $id = $_SESSION['unique_id'];
//    $id = $_GET['id'];
    $query = "UPDATE regform_tb SET address = '$update_address', state = '$update_state' WHERE id = '$id'";

    //run the query
    $result = mysqli_query($conn,$query);
    if($result === true){

        $error = "Y!";
        $success = "Your details has been successfully submitted!";
        header('Refresh: 0; url=user.php');
        die();
    }else{

        header("location:user.php?error=$result&id=$id");
        die();
    }

}else{
    header("location:user.php?error=$error");

}