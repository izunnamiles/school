<?php


$connector = mysqli_connect("localhost","root","","");

//create a database
/*$query = "CREATE DATABASE Company1_db";

$create_db = mysqli_query($connector,$query) or die(mysqli_error($connector));
if($create_db){
    echo "Database was created";
}*/
    //company username email first_name last_name address phone_no city country zip_code dob about_me

$query = "INSERT INTO student_tb (id,first_name,last_name,gender,dob,phone_number,passport,email,feedback,password)";

$result = query_sql($connector, $query);

if($result === true){
    echo "Your details was successfully submitted";
}else{
    echo $result;
}*/

?>