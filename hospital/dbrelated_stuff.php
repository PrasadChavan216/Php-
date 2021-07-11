<?php

    $servername = "localhost";
    $user = "root";
    $pass = "";
    // $dbname = "practice";

    $conn = mysqli_connect($servername,$user,$pass);

    if($conn) echo "Connected successfully";
    else echo "sorry unable to connect ". mysqli_connect_error();


    echo "<br>";

    // creating a new database

    $sql = "CREATE DATABASE testing1";
    $result = mysqli_query($conn, $sql);

    if($result){
        echo "Databse created successfully";
    }
    else{
        echo "Sorry because -->  " . mysqli_error($conn); 
    }

?>