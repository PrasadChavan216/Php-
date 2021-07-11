<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "practice";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if(!$conn) echo "Sorry because -->". mysqli_connect_error($conn);

$sql = "SELECT * FROM `contact`";
$result = mysqli_query($conn, $sql);

// Fetch number of rows 
$num_rows = mysqli_num_rows($result);


if($num_rows > 0){
    // echo var_dump($rows);
    // echo "<br>";
    while($rows = mysqli_fetch_assoc($result)){
        echo "SR.no : " .$rows['srno']. " , Name : ".$rows['name']. " , email : ".$rows['email']. " , Concern :"
                . $rows['concern'] . " , Date and time : " . $rows['dt'];
        echo "<br>";
    }
}

?>