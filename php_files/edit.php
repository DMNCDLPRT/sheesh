<?php

if(isset($_POST['edit_submit_btn'])) {
    include_once 'dbh.php';

    $id = $_POST['edit_data'];  

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

    if (empty($name) && empty($username) && empty($email) && empty($psswrd) && empty($confirm) && empty($bday) && empty($age) && empty($gender)) {
        header("location: ./Admin.php?error=emptyfields");
        exit();
    }else{

        $hasedpwd = password_hash($psswrd, PASSWORD_DEFAULT);

        $query = "UPDATE users SET fullName='$name', userName='$username', email='$email', phone_num='$phone', pwd='$hasedpwd', repeatpwd='$confirm',
         birthdate='$bday', age='$age', gender='$gender', user_type='$type' WHERE id='$id'";
        $run = mysqli_query($conn, $query);

        if($query){
            $_SESSION['status'] = "Your Data is Updated";
            $_SESSION['status_code'] = "success";
            header('Location: ../Admin.php?edit=success&id=$id'); 
        }
        else{
            $_SESSION['status'] = "Your Data is NOT Updated";
            $_SESSION['status_code'] = "error";
            header('Location: ../Admin.php?error'); 
        }
    }   
}

else {
    header("location: ../Admin.php?error");
    exit();
}