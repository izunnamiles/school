<?php
session_start();

if(isset( $_POST['submit'])) {
    include_once 'Processor.php';
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone_no = mysqli_real_escape_string($conn, $_POST['phone_no']);
    $dob = mysqli_real_escape_string($conn, $_POST['dob']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $passcode = mysqli_real_escape_string($conn, $_POST['passcode']);
    $con_passcode = mysqli_real_escape_string($conn, $_POST['con_passcode']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $region = mysqli_real_escape_string($conn, $_POST['region']);
    $state = mysqli_real_escape_string($conn, $_POST['state']);
    $country = mysqli_real_escape_string($conn, $_POST['country']);
    $passport = $_FILES['passport']['name'];
    $passport_tmp = $_FILES['passport']['tmp_name'];

    $arrayError = array($first_name, $last_name, $email, $phone_no, $dob,
        $gender, $passcode, $con_passcode, $address,$region, $state,
        $country, $passport
    );

    if (empty($arrayError)) {
        header("Location: Sign_Up.php? empty field");
        exit();
    }else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header("Location: Sign_Up.php? Invalid email");
            exit();
        } else {
            $query = "SELECT * FROM regForm_tb WHERE email= '$email'";
            $result = mysqli_query($conn, $query);
            $resultCheck = mysqli_num_rows($result);
            if ($resultCheck > 1) {

                header("Location:Sign_Up.php?Email taken");
                exit();
            }else {
            $allowed = array("png", "jpg", "jpeg", "gif");

            //get the file extension
            $extension = explode(".", $passport);

            //get the last value of the array
            //$extension_name = $extension[count($extension) - 1];
            $extension_name = end($extension);

            if (!in_array($extension_name, $allowed)) {

                header("location:Sign_up.php?error=PLease upload a file of image format");
                exit();

            }

            //declare path
            $path = "Images/Uploads/";

            //rename file
            $new_name = uniqid() . "." . $extension_name;

            //move file to server
            if (move_uploaded_file($_FILES['passport']["tmp_name"], $path . $new_name)) {

            }else{
                header("location:Sign_up.php?error=couldn't upload the file");
                exit();
            }
            if ($passport === false) {

                $error = "Image upload failed, Try again!";
                header("location:form.php?error=$error");
                exit();
            } else {
                if ($passcode > $con_passcode) {
                    header("location:Sign_Up.php?error=password not equal");
                    exit();
                } else {
                    $hashedpassword = md5($passcode);

                    $query = "INSERT INTO regForm_tb (id,first_name,last_name,email,phone_no,dob,gender,passcode,address,region,state,country,passport) VALUES (null,'".$first_name."','".$last_name."','".$email."','".$phone_no."','".$dob."','".$gender."','".$hashedpassword."','".$address."','".$region."','".$state."','".$country."','".$new_name."')";

                    $result = mysqli_query($conn, $query);
                    if ($result === true) {
                        unset($_SESSION['first_name']);
                        unset($_SESSION['last_name']);
                        unset($_SESSION['email']);
                        unset($_SESSION['phone_no']);
                        unset($_SESSION['dob']);
                        unset($_SESSION['gender']);
                        unset($_SESSION['address']);
                        unset($_SESSION['region']);
                        unset($_SESSION['state']);
                        unset($_SESSION['country']);
                        unset($_SESSION['passport']);
                        $success = "Your details has been successfully submitted!";
                        header("Location:Dashboard/dashboard.html?Login success=$success");
                        exit();


                    } else {
                         echo mysqli_error($conn); die();
                         header("location:Sign_Up.php?error=".mysqli_error($conn));
                    }

                }

                }
            }
        }

    }
}else{
    header("location: Sign_Up.php");
    exit();
}

