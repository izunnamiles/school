<?php

    function mysql_connector($host, $username, $password, $databasename){

        $con = mysqli_connect($host,$username,$password,$databasename) or die("could not connect to db");

        return $con;
    }

    function query_sql($connection, $query){

        if(mysqli_query($connection,$query)){
            return true;
        }else{
            return mysqli_error($connection);
        }
    }

    //select function
    function selector($connection, $query){

        $result = mysqli_query($connection,$query);

        $row_count = mysqli_num_rows($result);

        if($row_count === 0){

            return "No Result Found";

        }else if($row_count > 0){

            $result_array = array();

            while($row = mysqli_fetch_array($result)){
                $result_array[] = $row;
            }
            return $result_array;

        }

    }

//real application of user defined function
function validator($value, $validation_type, $value2=null){

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

    //password confirmation
    if($validation_type === "password_confirmation"){
        //value = password, value2 = confirm password
        if($value !== $value2){
            return true;
        }

    }

    return false;

}

function multipleFileUploader($files,$file_temp_name,$path){

    $no_of_files = count($files);
    $file_name = array();
    for($i = 0; $i < count($files); $i++){

        //get the file extension
        $extension = explode(".",$files[$i]);

        //get the last value of the array
        //$extension_name = $extension[count($extension) - 1];
        $extension_name = end($extension);

        //rename file
        $new_name = uniqid().".".$extension_name;

        //move file to server
        if(move_uploaded_file($file_temp_name[$i],$path.$new_name)){
            $file_name[] = $new_name;
            if($i == $no_of_files - 1){
                return $file_name;
            }

        }else{
            return false;
        }


    }

}
function generateRandomString($length = 7){
        $char ='0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charlength = strlen($char);
        $randomString='';
        for($i=0; $i < $length; $i++){
            $randomString.= $char[rand(0,$charlength - 1)];
        }
        return $randomString;
}
function getDatetimeNow() {
    $tz_object = new DateTimeZone('WAT');
    //date_default_timezone_set('Brazil/East');

    $datetime = new DateTime();
    $datetime->setTimezone($tz_object);
    return $datetime->format('Y\-m\-d\ h:i:s');
}
?>