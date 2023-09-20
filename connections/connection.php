<?php 

function connection(){
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "student_system";


    $connect = new mysqli ($host, $username, $password, $database);

    if($connect -> connect_error){
        echo $connect -> connect_error;
    }else{
        return $connect;
    }


}