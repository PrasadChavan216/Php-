<?php

    $servername = "localhost";
    $username = "thedigim_prasadchavan";
    $pass = "Prasad@216";
    $dbname = "thedigim_prasad";

    $conn = mysqli_connect($servername,$username,$pass,$dbname);

    if($conn){
        echo "Database connected Successfully..!";
    }
    else
    {
        echo "Databse is not connected..!";
    }

?>