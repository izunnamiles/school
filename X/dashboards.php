<?php
session_start();
require_once("function.php");

$connection = mysql_connector("localhost","root","","Company_db");


if(isset($_POST['submit'])){

    //get the values from the form and validate against injection
    $company = $_SESSION['company'] = mysqli_real_escape_string($connection, $_POST['company']);
    $username = $_SESSION['username'] = mysqli_real_escape_string($connection, $_POST['username']);
    $email = $_SESSION['email'] = mysqli_real_escape_string($connection, $_POST['email']);
    $first_name = $_SESSION['first_name'] = mysqli_real_escape_string($connection, $_POST['first_name']);
    $last_name = $_SESSION['last_name'] = mysqli_real_escape_string($connection, $_POST['last_name']);
    $address = $_SESSION['address'] = mysqli_real_escape_string($connection, $_POST['address']);
    $phone_no = $_SESSION['phone_no'] = mysqli_real_escape_string($connection, $_POST['phone_no']);
    $city = $_SESSION['city'] = mysqli_real_escape_string($connection, $_POST['city']);
    $country = $_SESSION['country'] = mysqli_real_escape_string($connection, $_POST['country']);
    $zip_code = $_SESSION['zip_code'] = mysqli_real_escape_string($connection, $_POST['zip_code']);
    $dob = $_SESSION['dob'] = mysqli_real_escape_string($connection, $_POST['dob']);
    $about_me = $_SESSION['about_me'] = mysqli_real_escape_string($connection, $_POST['about_me']);
    $password = mysqli_real_escape_string($connection,$_POST['password']);
    $confirm_password = mysqli_real_escape_string($connection,$_POST['confirm_password']);

    $names = array($company,$username,$email,$first_name,$last_name,$address,$phone_no,$city,$country
    ,$zip_code,$dob,$about_me,$password,$confirm_password);


    $value_names = array("Company Name","Username","Email Address","First Name","Last Name","Address",
    "Phone No","City","Country","Zip code","Date of Birth","About Me","Password","Confirm Password");

    for($k = 0; $k < count($names); $k++){
        if(validator($names[$k], "empty") === true){
            $error = $value_names[$k]." is required!";
            header("location:Sign_up.php?error=$error");
            die();
        }



    }
if(validator($email, "email_validation") === true){
        $error = "Provide a valid email address";
        header("location:Sign_up.php?error=$error");
        die();
    }


    //validate email
    if(validator($password, "password_confirmation", $confirm_password) === true){
        $error = "Passwords does not match!";
        header("location:Sign_up.php?error=$error");
        die();
    }

    //check if right value was supplied for gendr
    /*if($gender === "Select Gender"){
        $error = "Please select a gender!";
        header("location:form.php?error=$error");
        die();
    }

    //check if an image was uploaded
    if(count($passport) == 0){
        $error = "Passport is required!";
        header("location:form.php?error=$error");
        die();
    }

    if(count($passport) > 1){
        $error = "You can only upload one image!";
        header("location:form.php?error=$error");
        die();
    }

    /*if($_FILES['passport']['size'] > 120000000){
        $error = "File size has been exceeded!";
        header("location:form.php?error=$error");
        die();
    }

    //succesful upload will return an array of file names
    $file = multipleFileUploader($passport,$passport_tmp,"images/passport/");

    //while unsuccessful upload will return false
    if($file === false){

        $error = "Image upload failed, Try again!";
        header("location:form.php?error=$error");
        die();

    }*/

    $hashed_password = md5($password);

    //insert the values into the data base
    $query = "INSERT INTO company_tb (id,Company,Username,Email,First_Name,Last_Name,Address,Phone,City,Country,Zip_code,Date_of_Birth,About_Me,Password)
    VALUES (null,'".$company."','".$username."','".$email."','".$first_name."','".$last_name."','".$address."','".$phone_no."','".$city."','".$country."'
    ,'".$zip_code."','".$dob."','".$about_me."','".$hashed_password."')";

    //run the query
    $result = query_sql($connection,$query);
    if($result === true){
        $error = "Congratulation! your account have been successfully created";
        header("location:my_login.php?success=$error");
        die();
    }else{

        header("location:Sign_up.php?error=$result");
        die();
    }

}




?>