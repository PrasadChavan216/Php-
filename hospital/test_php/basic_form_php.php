<?php

$db = mysqli_connect('localhost','root','','practice');

if(isset($_POST))
{
    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $sql_E = "SELECT *FROM data_input WHERE email = '$email' ";
    $result = mysqli_query($db,$sql_E);

    if(mysqli_num_rows($result)>0)
    {
        header("LOCATION: basic_form.php?error=Oops Data Already Exist..!");
        // echo "Data Already Exist";
        exit();
    }
    else
    {
        $query = "INSERT INTO data_input(first_name, last_name, email, password) 
                    VALUES ('$firstname','$lastname','$email', '$pass')";
        $result1 = mysqli_query($db,$query);
        if($result1)
        {
            header("LOCATION: basic_form.php?error= Data Added Successfully in DATABASE");
            // echo "Data Added SuccessFully..!!";
        }
        else
        {
            header("LOCATION: basic_form.php?error= Unknown Error Occured :(..!");
        }
    }
}
