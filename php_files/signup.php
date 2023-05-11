<?php
session_start();

// REGISTER USER
if (isset($_POST['signup_btn'])) {
    require 'dbh.php';

    $name = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $psswrd = $_POST['password'];
    $confirm = $_POST['confirm_password'];
    $bday = $_POST['birthday'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $type = $_POST['usertype'];

    if (empty($name) || empty($username) || empty($email) || empty($psswrd) || empty($confirm) || empty($bday) || empty($age) || empty($gender)) {
        header("location: ./signup.php?error=emptyfields");
        exit();
    }else{
        $user_check_query = "SELECT * FROM users WHERE userName='$username' OR email='$email' OR phone_num='$phone' LIMIT 1";
        $result = mysqli_query($conn, $user_check_query);
        $statements = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($statements, $user_check_query)) {
            header("Location: ../signup.php?error=user_check_query_not_conn");
            exit();
        } else {
        
            if (mysqli_num_rows($result) > 0) { 
                $row = mysqli_fetch_assoc($result);
                if ($row['phone_num'] == $phone){
                    header("location: ../signup.php?signup=phonenumberalreadytaken");
                    exit();
                }else if  ($row['email'] == $email){
                    header("location: ../signup.php?signup=emailalreadytaken");
                    exit();
                } elseif ($row['userName'] == $username){
                    header("location: ../signup.php?username laready taken");
                    exit();
                }
            } else { 
                $query = "INSERT INTO users (fullName, userName, email, phone_num, pwd, repeatpwd, birthdate, age, gender, user_type) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
                $statements = mysqli_stmt_init($conn);

                if (!mysqli_stmt_prepare($statements, $query)) {
                    header("location: ../signup.php?error=sqlerror");
                    exit();
                } else {
                    $new_password_hashed = password_hash($psswrd, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($statements, "ssssssssss", $name, $username, $email, $phone, $new_password_hashed, $confirm, $bday, $age, $gender, $type);
                    mysqli_stmt_execute($statements);

                    header("location: ../signup.php?signup=success");
                    exit();
                }
            }
        }
    }
    mysqli_stmt_close($mysqli_query);
    mysqli_close($conn);
}

else {
    header("location: ../signup.php?error");
    exit();
}