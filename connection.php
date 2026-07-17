<?php
$con = mysqli_connect(
    "localhost",
    "Aditya",
    "Aditya@0775",
    "dhurandhar_lms"
);


if(!$con){
    die("Database Connection Failed : " . mysqli_connect_error());
}

?>