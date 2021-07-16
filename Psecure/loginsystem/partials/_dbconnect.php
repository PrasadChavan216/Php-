<?php

    $servername = "localhost";
    $username = "root";
    $pass = "";
    $dbname = "users";

    $conn = mysqli_connect($servername,$username,$pass,$dbname);

    // $conn = new mysqli("localhost", "root", "", "users");
    if(!$conn) die(mysqli_connect_error());

?>