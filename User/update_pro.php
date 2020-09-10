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
if(isset($_POST['uploadSubmit'])){
    include_once "../Processor.php";
    //$uploadFile = mysqli_escape_string($conn, $_POST['uploadFile']);
    $uploadFile = $_FILES['uploadFile']['name'];
    $uploadFile_tmp = $_FILES['uploadFile']['tmp_name'];

    $allowed = array("png", "jpg", "jpeg", "gif");

    //get the file extension
    $extension = explode(".", $uploadFile);

    //get the last value of the array
    //$extension_name = $extension[count($extension) - 1];
    $extension_name = end($extension);

    if (!in_array($extension_name, $allowed)) {

        header("location:user.php?error=Please upload a file of image format");
        exit();

    }

    //declare path
    $path = "Images/Uploads/";

    //rename file
    $new_name = uniqid() . "." . $extension_name;

    //move file to server
    if($uploadFile_tmp != ""){
    move_uploaded_file($_FILES['uploadFile']["tmp_name"], $path . $new_name);

    }else {
        header("location:user.php?error=couldn't upload the file");
        exit();
    }
    if ($uploadFile === false) {

        $error = "Image upload failed, Try again!";
        header("location:form.php?error=$error");
        exit();
    }else {

        $id = $_SESSION['unique_id'];
//    $id = $_GET['id'];
        $sql = "UPDATE regform_tb SET passport = '$new_name' WHERE id = '$id'";

        //run the query
        $result = mysqli_query($conn,$sql);

        if($result === true){

            $success = "Your details has been successfully submitted!";
            header("Refresh: 0; url=user.php");
            die();
        }else{

            header("location:user.php?error=$result&id=$id");
            die();
        }
    }

}else{
    header("location:user.php?error=$error");
}