<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Login form</title>
    <link rel="stylesheet" href="login.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        session_start();
        if (isset($_SESSION['userUid'])){
            header('Location: Home.php');
        }
    ?>
</head>

<body>
    <form class="container login" action="php_files/login.php" method="post">
        <h1>Login form</h1>
        <input type="text" name="username" id="username" placeholder="username">
        <input type="password" name="password" id="password" placeholder="password">
        <input type="submit" id="submit" name="button" value="Login">
        <p>Don't have an account yet? <a href="Signup.php"> Sign up here!</a></p>
    </form>
    <script src="javascript.js"></script>
</body>

</html>