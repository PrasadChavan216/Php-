<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basic Data INput form</title>
    <style>
        .f {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: burlywood;
            font-size: larger;
            padding: 50px;
            text-align: center;
        }

        .f .btn {
            padding: 10px;
        }
    </style>
</head>

<body>
    <div class="f">
        <form action="basic_form_php.php" method="POST">
            <label>First Name : </label>
            <input type="text" name="fname">
            <br><br>
            <label>Last Name : </label>
            <input type="text" name="lname">
            <br><br>
            <label>Email : </label>
            <input type="email" name="email" class="em">
            <br><br>
            <label for="">Password : </label>
            <input class="firstname" type="Password" name="pass" required="">
            <br><br>
            <button type="submit" name="add_data" class="btn">ADD DATA</button>
            
            <?php if (isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>
            
        </form>
    </div>

</body>

</html>