<?php
session_start();
require_once ('../X/function.php');
$connection = mysqli_connect("localhost","root","","register_db");

if(isset( $_POST['course_submit'])){

        //get injection

        $course = $_SESSION['course'] = mysqli_escape_string($connection, $_POST['course']);
        $year = $_SESSION['year'] = mysqli_escape_string($connection, $_POST['year']);


//checking for empty
        $post_arrays = array($course, $year);

//field arrays
        $field_array = array("course", "year");


        for ($i = 0; $i < count($post_arrays); $i++) {

            if (validator($post_arrays[$i], 'empty') === true) {

                $error = $field_array[$i] . " is required";
                header("location:Reg_course.php?error=$error");
                die();

            }

        }



        $user = $_SESSION['unique_id'];
        $time = getDatetimeNow();
        $result = generateRandomString(7);

        $query = "INSERT INTO  registeredcourse_tb (id,unique_id,user_unique_id,course_unique_id,academic_year_unique_id,date_of_registration)
VALUES ( null,'" .$result. "','" .$user. "','" .$course. "','" .$year. "','" .$time. "')";

        $result = query_sql($connection,$query);

        if ($result === true) {
            unset($_SESSION['course']);
            unset($_SESSION['year']);


            $error = "your details has been successfully uploaded!";
            header("location:course_table.php?success=$error");
            die();
        } else {
            header("location:Reg_course.php?error=$result");
        }




}


?>