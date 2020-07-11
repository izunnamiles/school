<?php
require_once ('Processor.php');
$conn = mysqli_connect("localhost","root","","register_db");
/*function mysql_connector($host, $username, $password, $databasename){

    $con = mysqli_connect($host,$username,$password,$databasename) or die("could not connect to db");

    return $con;
}

function query_sql($connection, $query){

    if(mysqli_query($connection,$query)){
        return true;
    }else{
        return mysqli_error($connection);
    }
}*/
/*$query = "CREATE DATABASE register_db";
if(mysqli_query($conn,$query))
{
    echo "Database created successfully";
} else{
    echo "Error creating database: ". mysqli_error($conn);
}
mysqli_close($conn);*/

/*$query = "CREATE TABLE IF NOT EXISTS regForm_tb (id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
first_name VARCHAR(100),
last_name VARCHAR(100),
email VARCHAR(100),
phone_no VARCHAR(20),
dob DATE,
gender CHAR(1),
passcode VARCHAR(100),
address VARCHAR(100),
region VARCHAR(100),
state VARCHAR(100),
country VARCHAR(100),
passport VARCHAR(100)
)";
$create_tb = mysqli_query($conn,$query) or die (mysqli_error($conn));
if ($create_tb)
{
echo "Table was created";

}*/


/*$query = "CREATE TABLE IF NOT EXISTS course_tb (id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
 unique_id VARCHAR(100),
course_title VARCHAR(100),
course_code VARCHAR(100),
credit_load VARCHAR(20))";


$create_tb = mysqli_query($conn,$query) or die (mysqli_error($conn));
if ($create_tb) {
    echo "Table was created";
}*/
/*$query = "CREATE TABLE IF NOT EXISTS academic_tb (id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
 academic_unique_id VARCHAR(100),
section_yr VARCHAR(100))";


$create_tb = mysqli_query($conn,$query) or die (mysqli_error($conn));
if ($create_tb) {
    echo "Table was created";
}*/

$query = "CREATE TABLE IF NOT EXISTS registeredCourse_tb (id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
 unique_id VARCHAR(100),
 user_unique_id VARCHAR(100),
 course_unique_id VARCHAR(100),
 academic_year_unique_id VARCHAR(100),
date_of_registraion DATE)";

$create_tb = mysqli_query($conn,$query) or die (mysqli_error($conn));
if ($create_tb) {
    echo "Table was created";
}
?>