<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="signup.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="container">
        <?php
            if (isset($_POST['edit_submit_btn'])){
                echo "<div class='title'>Edit Users Data</div>";
            }
            else {
                echo "<div class='title'>Sign up Form</div>";
            }
            ?>

        <div class="content">
            <?php
            if(isset($_POST['edit_submit_btn'])){
                include_once 'php_files/dbh.php';
                $id = $_POST['edit_data'];
                
                $sql = "SELECT * FROM users WHERE id='$id'";
                $run = mysqli_query($conn, $sql);   
                foreach($run as $row){
            ?>

        <form action="php_files/edit.php" method="post">
            <input type="hidden" name="edit_data" value="<?php echo $row['id']; ?>">
            <div class="user-details">
                <div class="input-box">
                    <span class="details">Full Name</span>
                    <input type="text" placeholder="Enter your name" value="<?php echo $row['fullName'] ?>" name="fullname">
                </div>
                <div class="input-box">
                    <span class="details">Username</span>
                    <input type="text" id="username" placeholder="Enter your username" value="<?php echo $row['userName'] ?>" name="username">
                </div>
                <div class="input-box">
                    <span class="details">Email</span>
                    <input type="email" placeholder="Enter your email" value="<?php echo $row['email'] ?>" name="email">
                </div>
                <div class="input-box">
                    <span class="details">Phone Number</span>
                    <input type="text" placeholder="Enter your number" value="<?php echo $row['phone_num'] ?>" name="phone" >
                </div>
                <div class="input-box">
                    <span class="details">Password</span>
                    <input type="password" id="password" placeholder="Enter your password" value="<?php echo $row['repeatpwd'] ?>" name="password">
                </div>
                <div class="input-box">
                    <span class="details">Confirm Password</span>
                    <input type="password" id="password_confirm" placeholder="Confirm your password" value="<?php echo $row['repeatpwd'] ?>" name="confirm_password">
                </div>
                <div class="input-box">
                    <span class="details">Birthday</span>
                    <input type="date" placeholder="Enter your birthdate" value="<?php echo $row['birthdate'] ?>" name="birthday">
                </div>
                <div class="input-box">
                    <span class="details">Age</span>
                    <input type="text" placeholder="Enter your age" value="<?php echo $row['age'] ?>" name="age">
                </div>
            </div>
            <div class="gender-details">
                <span class="gender-title">Gender</span>
                    <label for="Male">male</label>
                    <input type="radio" name="gender" value="Male" <?php if ($row['gender'] == 'Male') { echo 'checked'; }?>>
                    <label for="Female">Female</label>
                    <input type="radio" name="gender" value="Female" <?php if ($row['gender'] == 'Female') { echo 'checked'; }?>>
                    <label for="Other">Other</label>
                    <input type="radio" name="gender" value="Other" <?php if ($row['gender'] == 'Other') { echo 'checked'; }?>>
            </div>
            <div class="gender-details">
                <span class="gender-title">Select user type</span>
                <label for="usertype">Admin</label>
                <input type="radio" name="usertype" value="Admin" <?php if ($row['user_type'] == 'Admin') { echo 'checked'; }?>>
                <label for="usertype">User</label>
                <input type="radio" name="usertype" value="User" <?php if ($row['user_type'] == 'User') { echo 'checked'; }?>>
            </div>
            <div class="button">
                <input type="submit" name="edit_submit_btn" value="submit">
            </div>
            <p><a href="Admin.php">Cancel</a></p>
        </form>
        <?php
                }  
            }
            if (!isset($_POST['edit_submit_btn'])){
        ?>

        <form action="php_files/signup.php" method="post">
            <div class="user-details">
                <div class="input-box">
                    <span class="details">Full Name</span>
                    <input type="text" placeholder="Enter your name" name="fullname">
                </div>
                <div class="input-box">
                    <span class="details">Username</span>
                    <input type="text" id="username" placeholder="Enter your username" name="username">
                </div>
                <div class="input-box">
                    <span class="details">Email</span>
                    <input type="text" placeholder="Enter your email" name="email">
                </div>
                <div class="input-box">
                    <span class="details">Phone Number</span>
                    <input type="text" placeholder="Enter your number" name="phone">
                </div>
                <div class="input-box">
                    <span class="details">Password</span>
                    <input type="password" id="password" placeholder="Enter your password" name="password">
                </div>
                <div class="input-box">
                    <span class="details">Confirm Password</span>
                    <input type="password" id="password_confirm" placeholder="Confirm your password" name="confirm_password">
                </div>
                <div class="input-box">
                    <span class="details">Birthday</span>
                    <input type="date" placeholder="Enter your birthdate" name="birthday">
                </div>
                <div class="input-box">
                    <span class="details">Age</span>
                    <input type="text" placeholder="Enter your age" name="age">
                </div>
            </div>
            <div class="gender-details">
                <span class="gender-title">Gender</span>
                    <label for="Male">male</label>
                    <input type="radio" name="gender" value="Male">
                    <label for="Female">Female</label>
                    <input type="radio" name="gender" value="Female">
                    <label for="Other">Other</label>
                    <input type="radio" name="gender" value="Other">
            </div>
            <div class="gender-details">
                <span class="gender-title">Select user type</span>
                <label for="usertype">Admin</label>
                <input type="radio" name="usertype" value="Admin">
                    <label for="usertype">User</label>
                <input type="radio" name="usertype" value="User">
            </div>
                <div class="button">
                    <input type="submit" name="signup_btn" value="submit" onclick="validate()">
                </div>
                <p>Already have an account!<a href="login.php">  Login here!</a></p>
        </form>
        <?php
        }
        ?>
    </div>
    </div>
</body>
</html>