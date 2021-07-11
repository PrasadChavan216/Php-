<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .login {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: burlywood;
            font-size: larger;
            padding: 40px;
            text-align: center;
            border-radius: 50px;
        }
    </style>
</head>

<body>

    <div class="login">
        <h1>Login</h1>
        <form action="login_php.php" method="POST">
            <label>Email : </label>
            <input type="emial" name="email">
            <br><br>
            <label>Password : </label>
            <input type="password" name="pass">
            <br><br>
            <button type="submit">Login</button>

            <?php if (isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>
        </form>
    </div>

</body>

</html>