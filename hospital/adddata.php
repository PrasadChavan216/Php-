<?php

$servername = "localhost";
$user = "root";
$pass = "";
$dbname = "practice";

$conn = mysqli_connect($servername,$user,$pass,$dbname);

if($conn) echo "Connected successfully";
else echo "sorry unable to connect ". mysqli_connect_error();
     
echo "<br>";

$name = "Prasad";
$destination = "Japan";

$sql = "INSERT INTO `prasad` (`name`, `dest`) VALUES ('$name', '$destination')";
$result = mysqli_query($conn,$sql);

if($result) echo "Record Inserted SuccessFully..!";
else "Sorry because -->" . mysqli_error($conn);


?>