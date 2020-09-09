<?php

$dbServername ="localhost";
$dbUsername ="root";
$dbPassword ="";
$dbName="register_db";

$conn = mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbName);
if(!$conn){
    die("connection failed: " .mysqli_connect_error());
}

//function
function validator($value, $validation_type){

    //empty value
    if($validation_type === "empty"){

        if(empty($value)){
            return true;
        }

    }

    //check for valid email
    if($validation_type === "email_validation"){

        if(!filter_var($value, FILTER_VALIDATE_EMAIL)){
            return true;
        }

    }

    //check for numbers
    if($validation_type === "numeric"){

        if(!is_numeric($value)){
            return true;
        }

    }

    return false;

}

