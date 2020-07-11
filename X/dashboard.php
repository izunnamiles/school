
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
    $reg_image = $_FILES['reg_image']['name'];
    $reg_image_tmp = $_FILES ['reg_image']['tmp_name'];
    $reg_image_size = $_FILES['reg_image_size']['size'];


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
    }*/

    //check if an image was uploaded
    if(count($reg_image) == 0){
        $error = "Picture is required!";
        header("location:Sign_up.php?error=$error");
        die();
    }

    if(count($reg_image) > 1){
        $error = "You can only upload one image!";
        header("location:Sign_up.php?error=$error");
        die();
    }

    /*if($_FILES['passport']['size'] > 120000000){
        $error = "File size has been exceeded!";
        header("location:form.php?error=$error");
        die();
    }*/

    //succesful upload will return an array of file names
    $file = multipleFileUploader($reg_image,$reg_image_tmp,"images/uploaded/");

    //while unsuccessful upload will return false
    if($file === false){

        $error = "Image upload failed, Try again!";
        header("location:Sign_up.php?error=$error");
        die();

    }

    $hashed_password = md5($password);

    //insert the values into the data base
    $query = "INSERT INTO company_tb (id,Company,Username,Email,First_Name,Last_Name,Address,Phone,City,Country,Zip_code,Date_of_Birth,About_Me,Password,image)
    VALUES (null,'".$company."','".$username."','".$email."','".$first_name."','".$last_name."','".$address."','".$phone_no."','".$city."','".$country."'
    ,'".$zip_code."','".$dob."','".$about_me."','".$hashed_password."','".$file[0]."')";

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

if(isset($_POST['update'])){

    //get the values from the form and validate against injection
    $edi_company = mysqli_real_escape_string($connection, $_POST['edi_company']);
    $edi_username = mysqli_real_escape_string($connection, $_POST['edi_username']);
    $edi_email = mysqli_real_escape_string($connection, $_POST['edi_email']);
    $edi_first_name = mysqli_real_escape_string($connection, $_POST['edi_first_name']);
    $edi_last_name = mysqli_real_escape_string($connection, $_POST['edi_last_name']);
    $edi_address = mysqli_real_escape_string($connection, $_POST['edi_address']);
    $edi_city = mysqli_real_escape_string($connection, $_POST['edi_city']);
    $edi_country = mysqli_real_escape_string($connection, $_POST['edi_country']);
    $edi_phone_no = mysqli_real_escape_string($connection, $_POST['edi_phone_no']);
    $edi_zip_code = mysqli_real_escape_string($connection, $_POST['edi_zip_code']);
    $edi_dob = mysqli_real_escape_string($connection, $_POST['edi_dob']);
    $edi_about_me = mysqli_real_escape_string($connection, $_POST['edi_about_me']);
    $edi_reg_image = $_FILES['edi_reg_image']['name'];
    $edi_reg_image_tmp = $_FILES ['edi_reg_image']['tmp_name'];
    $edi_reg_image_size = $_FILES['edi_reg_image_size']['size'];
    $id = mysqli_real_escape_string($connection, $_POST['id_holder']);


    //check for empty values
    //create an array of the values
    $post_array = array($edi_company, $edi_username, $edi_email, $edi_first_name, $edi_last_name, $edi_address,
    $edi_city, $edi_country, $edi_phone_no, $edi_dob, $edi_zip_code, $edi_about_me);

    //craete the field name
    $field_array = array("Company Name", "Username", "Email", "First Name", "Last Name", "Address", "City", "Country", "Phone No.", "Date of Birth", "Zip Code", "About Me");
    for($i = 0; $i < count($post_array); $i++){

        if(validator($post_array[$i], "empty") === true){
            $error = $field_array[$i]." is required!";
            header("location:user.php?error=$error&id=$id");
            die();
        }

    }

    //validate email
    if(validator($edi_email, "email_validation") === true){
        $error = "Provide a valid email address";
        header("location:user.php?error=$error&id=$id");
        die();
    }

    //check if right value was supplied for gendr
   /* if($gender === "Select Gender"){
        $error = "Please select a gender!";
        header("location:edit.php?error=$error&id=$id");
        die();
    }

    //check if an image was uploaded
    if(count($edi_reg_image) == 0){
        $error = "Picture is required!";
        header("location:user.php?error=$error&id=$id");
        die();
    }*/

    if(count($edi_reg_image) > 1){
        $error = "You can only upload one image!";
        header("location:user.php?error=$error");
        die();
    }

    /*if($_FILES['edi_reg_image']['size'] > 12000){
        $error = "File size has been exceeded!";
        header("location:edit.php?error=$error&id=$id");
        die();
    }*/

    //succesful upload will return an array of file names
    $file = multipleFileUploader($edi_reg_image,$edi_reg_image_tmp,"images/uploaded/");

    //while unsuccessful upload will return false
    if($file === false){

        $error = "Image upload failed, Try again!";
        header("location:user.php?error=$error&id=$id");
        die();

    }

    $query = "UPDATE company_tb SET Company = '$edi_company', Username = '$edi_username', Email = '$edi_email', First_Name = '$edi_first_name', Last_Name = '$edi_last_name',
    Address = '$edi_address', City = '$edi_city', Country = '$edi_country', Phone = '$edi_phone_no', Zip_code = '$edi_zip_code', Date_of_Birth = '$edi_dob', About_Me = '$edi_about_me', image = '$file[0]' WHERE id = '$id'";

    //run the query
    $result = query_sql($connection,$query);
    if($result === true){

        $error = "You have successfully updated your profile!";
        header("location:user.php?success=$error&id=$id");
        die();
    }else{

        header("location:user.php?error=$result&id=$id");
        die();
    }



}


//admin update starts here
if(isset($_POST['admin_update'])){

    //get the values from the form and validate against injection
    $edi_company = mysqli_real_escape_string($connection, $_POST['edi_company']);
    $edi_username = mysqli_real_escape_string($connection, $_POST['edi_username']);
    $edi_email = mysqli_real_escape_string($connection, $_POST['edi_email']);
    $edi_first_name = mysqli_real_escape_string($connection, $_POST['edi_first_name']);
    $edi_last_name = mysqli_real_escape_string($connection, $_POST['edi_last_name']);
    $edi_address = mysqli_real_escape_string($connection, $_POST['edi_address']);
    $edi_city = mysqli_real_escape_string($connection, $_POST['edi_city']);
    $edi_country = mysqli_real_escape_string($connection, $_POST['edi_country']);
    $edi_phone_no = mysqli_real_escape_string($connection, $_POST['edi_phone_no']);
    $edi_zip_code = mysqli_real_escape_string($connection, $_POST['edi_zip_code']);
    $edi_dob = mysqli_real_escape_string($connection, $_POST['edi_dob']);
    $edi_about_me = mysqli_real_escape_string($connection, $_POST['edi_about_me']);
    $edi_reg_image = $_FILES['edi_reg_image']['name'];
    $edi_reg_image_tmp = $_FILES ['edi_reg_image']['tmp_name'];
    $edi_reg_image_size = $_FILES['edi_reg_image_size']['size'];
    $id = mysqli_real_escape_string($connection, $_POST['id_holder']);


    //check for empty values
    //create an array of the values
    $post_array = array($edi_company, $edi_username, $edi_email, $edi_first_name, $edi_last_name, $edi_address,
    $edi_city, $edi_country, $edi_phone_no, $edi_dob, $edi_zip_code, $edi_about_me);

    //craete the field name
    $field_array = array("Company Name", "Username", "Email", "First Name", "Last Name", "Address", "City", "Country", "Phone No.", "Date of Birth", "Zip Code", "About Me");
    for($i = 0; $i < count($post_array); $i++){

        if(validator($post_array[$i], "empty") === true){
            $error = $field_array[$i]." is required!";
            header("location:admin_page.php?error=$error&id=$id");
            die();
        }

    }

    //validate email
    if(validator($edi_email, "email_validation") === true){
        $error = "Provide a valid email address";
        header("location:admin_page.php?error=$error&id=$id");
        die();
    }

    //check if right value was supplied for gendr
   /* if($gender === "Select Gender"){
        $error = "Please select a gender!";
        header("location:edit.php?error=$error&id=$id");
        die();
    }

    //check if an image was uploaded
     if(count($edi_reg_image) == 0){
        $error = "Picture is required!";
        header("location:admin_page.php?error=$error&id=$id");
        die();*/
     if(count($edi_reg_image) > 1){
        $error = "You can only upload one image!";
        header("location:admin_page.php?error=$error");
        die();
    }

    /*if($_FILES['edi_reg_image']['size'] > 12000){
        $error = "File size has been exceeded!";
        header("location:admin_page.php?error=$error&id=$id");
        die();
    }*/

    //succesful upload will return an array of file names
    $file = multipleFileUploader($edi_reg_image,$edi_reg_image_tmp,"images/uploaded/");

    //while unsuccessful upload will return false
    if($file === false ){

        $error = "Image upload failed, Try again!";
        header("location:admin_page.php?error=$error&id=$id");
        die();

    }


     $query = "UPDATE company_tb SET Company = '$edi_company', Username = '$edi_username', Email = '$edi_email', First_Name = '$edi_first_name', Last_Name = '$edi_last_name',
    Address = '$edi_address', City = '$edi_city', Country = '$edi_country', Phone = '$edi_phone_no', Zip_code = '$edi_zip_code', Date_of_Birth = '$edi_dob', About_Me = '$edi_about_me', image = '$file[0]' WHERE id = '$id'";

    //run the query
    $result = query_sql($connection,$query);
    if($result === true){

        $error = "You have successfully updated your profile!";
        header("location:admin_page.php?success=$error&id=$id");
        die();
    }else{

        header("location:admin_php.php?error=$result&id=$id");
        die();
    }

  }

 if(isset($_POST['register_course'])){

    $course_name = mysqli_real_escape_string($connection, $_POST['course_name']);
    $course_code = mysqli_real_escape_string($connection, $_POST['course_code']);
    $academic_year = mysqli_real_escape_string($connection, $_POST['academic_year']);
    $id = mysqli_real_escape_string($connection, $_POST['id_holder']);
    $unique_id = mysqli_real_escape_string($connection, $_POST['unique_id']);


 }


?>