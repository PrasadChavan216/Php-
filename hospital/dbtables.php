<?php

    $servername = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "practice";

    $conn = mysqli_connect($servername,$user,$pass,$dbname);

    if($conn) echo "Connected successfully";
    else echo "sorry unable to connect ". mysqli_connect_error();
         
    echo "<br>";

    $sql = "CREATE TABLE `prasad` ( `sno` INT(6) NULL AUTO_INCREMENT , `name` VARCHAR(12) NULL ,
             `dest` VARCHAR(12) NULL , PRIMARY KEY (`sno`), UNIQUE (`name`))";
    
    $result = mysqli_query($conn, $sql);

    if($result) echo "Table created successfully..!";
    else echo"Sorry because -->". mysqli_error($conn);


?>