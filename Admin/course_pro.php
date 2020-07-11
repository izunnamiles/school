<?php
session_start();
require_once ('../X/function.php');
$connection = mysqli_connect("localhost","root","","register_db");
if(isset( $_POST['reg_submit'])) {

    //get the values from the form and validate against injection
    $course_title = $_SESSION['course_title'] = mysqli_real_escape_string($connection, $_POST['course_title']);
    $code = $_SESSION['code'] = mysqli_real_escape_string($connection, $_POST['code']);
    $credit_load = $_SESSION['credit_load'] = mysqli_real_escape_string($connection, $_POST['credit_load']);


    $names = array($course_title, $code, $credit_load);

    $field = array("course_title", "code", "credit_load");

    for ($k = 0; $k < count($names); $k++) {
        if (validator($names[$k], "empty") === true) {
            $error = $field[$k] . " is required!";
            header("location:reg_course.php?error=$error");
            die();
        }

        $uid = generateRandomString(7);

        //insert the values into the data base
        $query = "INSERT INTO course_tb (id, unique_id, course_title, course_code, credit_load)
    VALUES (null,'" .$uid. "','" .$course_title. "','" .$code. "','" .$credit_load. "')";

        //run the query
        $result = query_sql($connection, $query);
        if ($result === true) {
            $error = "Course table updated";
            header("location:reg_course.php?success=$error");
            die();
        } else {

            header("location:reg_course.php?error=$result");
            die();
        }

    }
}