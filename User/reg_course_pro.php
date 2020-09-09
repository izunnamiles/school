<?php
session_start();
require_once ('../functions/function.php');
$connection = mysqli_connect("localhost","root","","register_db");
$get = selector($connection,"SELECT * FROM course_tb");
$result = selector($connection,"SELECT * FROM academic_tb");

if(isset( $_POST['course_submit'])){

        //get injection

        $course = $_SESSION['course'] = mysqli_escape_string($connection, $_POST['course']);
        $year = $_SESSION['year'] = mysqli_escape_string($connection, $_POST['year']);


        //checking for empty
        foreach($get as $key => $value){
            if(!empty($course) && ($value != 'value')){
                header("location:Reg_course.php?error=$error");
            }
        }
        foreach($result as $key => $value){
            if(!empty($year) && ($value != 'value')){
               header("location:Reg_course.php?error=$error");
            }
        }

        $post_arrays = array($course, $year);
        if(!empty($post_arrays) && ($course != "v" && $year != " ")){
            header("location:Reg_course.php?error=$error");
        }

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