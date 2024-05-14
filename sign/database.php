<?php
    // Database Connection
    $host = "localhost";
    $username = "root";
    $password = "";
    $db = "login_db";

    // create an object and pass the parameters of the database
    $mysqli = new mysqli( $host,$username, $password, $db);

    // Using connect_errno function with mysqli to handle errors during attempts
    // to connect to the database

    // Chech if there is an error during the connection , if then display it
    if($mysqli->connect_errno){
        die("connection error : ".$mysqli->connect_errno);
    }
    return $mysqli;










?>