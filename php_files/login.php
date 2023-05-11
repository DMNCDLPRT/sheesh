<?php 

if (isset($_POST['button'])) {
	require 'dbh.php';

	$username = $_POST['username'];
	$password = $_POST['password'];

	if (empty($username) && empty($password)){
		header("location: ../login.php?login=emptyfield");
		exit();
	} else {
        $query = "SELECT * FROM users WHERE email=? OR userName=? OR phone_num=? ";
        $statement = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($statement, $query)) {
			header("location: ../login.php?error=sqlerror");
			exit();
		} 
		else {
			mysqli_stmt_bind_param($statement, "sss", $username, $username, $username);
			mysqli_stmt_execute($statement);
			$result = mysqli_stmt_get_result($statement);
			if ($row = mysqli_fetch_assoc($result)) {
				$password_check = password_verify($password, $row['pwd']);

				if (!$password_check){
					header("location: ../login.php?login=wrongpassword&username=$username");
					exit();
				} else if ($password_check){
					session_start();
					$_SESSION['userid'] = $row['id'];
					$_SESSION['usertype'] = $row['user_type'];
					$_SESSION['userUid'] = $row['email'];
					$_SESSION['userUid'] = $row['phone_num'];
                    $_SESSION['userUid'] = $row['username'];

					header("location: ../Home.php?=Welcome!$username");
					exit();
				} 
			} else {
				header("location: ../login.php?login=nouser");
				exit();
			}
		}	
	}
}else{
	header("Location: ../login.php");
	exit();
}