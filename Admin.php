<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="css/lightbox.min.css">
    <title>Admin</title>
    <?php
      session_start();
        if ($_SESSION['usertype'] != 'Admin'){
          header('Location: ./login.php');
        }
      ?>
</head>
<body style="color:white;">
    <header>
        <nav>
            <ul class="nav">
                <li><a href="Home.php">HOME</a></li>
                <li><a href="about.php">ABOUT</a></li>
                <li><a href="gallery.php">GALLERY</a></li>
                <li><a href="Contact.php">CONTACT</a></li>
                <?php
                if ($_SESSION['usertype'] == "Admin"){
                    echo '<li><a href="php_files/logout.php">Logout</a></li>';
                    echo '<li><a href="Admin.php">Admin</a></li>';
                } else {
                    echo '<li><a href="php_files/logout.php">Logout</a></li>';
                }
                ?>
            </ul>
        </nav>
    </header>
    <main>
    <table border="1" cell style="background-color: #00000061; text-align:center;">
        <caption style="margin-top: 30px;">
            Administrator
            <div class="status">
                <?php
                    if (isset($_SESSION['status_code']) == 'success'){
                        echo ($_SESSION['status']);
                    }
                ?>
            </div>
        </caption>
        <thead>
            <th>ID</th>
            <th>Full Name</th>
            <th>User Name</th>
            <th>Email</th>
            <th>Phone number</th>
            <th>Password</th>
            <th>Repeat Password</th>
            <th>Birthday</th>
            <th>Age</th>
            <th>Gender</th>
            <th>User type</th>
        </thead>

        <?php
			include_once "php_files/dbh.php";
                
            $query = "SELECT * FROM users";
            $run = mysqli_query($conn, $query);
            if (mysqli_num_rows($run) > 0){
                while($row=mysqli_fetch_array($run)){
        ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['fullName']; ?></td>
                <td><?php echo $row['userName']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['phone_num']; ?></td>
                <td><?php echo $row['pwd']; ?></td>
                <td><?php echo $row['repeatpwd']; ?></td>
                <td><?php echo $row['birthdate']; ?></td>
                <td><?php echo $row['age']; ?></td>
                <td><?php echo $row['gender']; ?></td>
                <td><?php echo $row['user_type']; ?></td>
                <td>
                    <form action="php_files/delete.php" method="POST">
                        <input  type="hidden" name="delete_data" value="<?php echo $row['id']; ?>">
                        <button class="delete" name="delete" value="submit">Delete</button>
                    </form>
                </td>
                <td>
                    <form action="Signup.php" method="POST">
                        <input type="hidden" name="edit_data" value="<?php echo $row['id']; ?>">
                        <button class="edit" name="edit_submit_btn" type="submit">Edit</button>
                    </form>
                </td>
            </tr>
        <?php
			}
        }
		?>
    </table>
        <a href="Signup.php"><button class="add_user_btn">Add user</button></a>
    </main>
</body>
</html>