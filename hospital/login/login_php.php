<?php
    session_start();
    // echo "this is test";

    $db = mysqli_connect("localhost","root","","practice");

    if(!$db) 
    {
        echo "Connection Failed";
    }

    if(isset($_POST['email']) && isset($_POST['password']))
        {
            function validate($data)
            {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
            }
        
        $email = validate($_POST['email']);
        $pass  = validate($_POST['pass']);

        if(empty($email))
        {
            header("Location: login.php?error=email is required");
            exit();
        }
        else if(empty($pass))
        {
            header("Location: login.php?error=Password is required");
            exit();
        }
    else
    {
            $sql = "SELECT * FROM data_input WHERE email = '$email' AND passoword = '$pass' ";
            
            $result = mysqli_query($db,$sql);

            if(mysqli_num_rows($result) === 1){
                
                $row = mysqli_fetch_assoc($result);

                print_r($row);
                
                // if($row['Email']===$email && $row['username_pass']===$pass)
                // {
                // 	$SESSION['email'] = $row['Email'];
                // 	$SESSION['firstname'] = $row['first_name'];
                // 	$SESSION['id'] = $row['id'];
                // 	header("Location: login_success.php");
                // 	exit();


                // }
                // else
                // {
                // 	header("Location: login.php?error= Incorect Email_ID OR Password");
                // 	exit();
                // }
            }
            else
            {
                header("Location: login.php?error= Incorect Email_ID OR Password");
                exit();
            }
        }
    }
?>
