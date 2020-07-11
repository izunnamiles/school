<?php
session_start();
require_once ('../X/function.php');
$connection = mysqli_connect("localhost","root","","register_db");
if(isset( $_POST['academic_submit'])) {

    //get the values from the form and validate against injection
    $academic_year = $_SESSION['academic_year'] = mysqli_real_escape_string($connection, $_POST['academic_year']);

   /* $names = array($course_title, $course, $credit_load);

    $field = array("course_title", "course", "credit_load");

    for ($k = 0; $k < count($names); $k++) {
        if (validator($names[$k], "empty") === true) {
            $error = $field[$k] . " is required!";
            header("location:reg_course.php?error=$error");
            die();
        }*/

        $unique = generateRandomString(7);

        //insert the values into the data base
        $query = "INSERT INTO academic_tb (id, academic_unique_id, academic_year)
    VALUES (null,'" .$unique. "','" .$academic_year. "')";

        //run the query
        $result = query_sql($connection, $query);
        if ($result === true) {
            $error = "Academic year updated";
            header("location:academic_yr.php?success=$error");
            die();
        } else {

            header("location:academic_yr.php?error=$result");
            die();
        }


}