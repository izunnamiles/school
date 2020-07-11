<?php
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
