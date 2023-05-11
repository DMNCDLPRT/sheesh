<!DOCTYPE html>
<html>

<head>
<?php
      session_start();
        if (!isset($_SESSION['userid'])){
          header('Location: ./login.php');
        }
      ?>
    <title>CONTACT</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/Contact.css">
</head>

<body>
    <nav>
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
            <section class="contact"></section>
            <div class="content">
                <h1>Contact Me</h1>
            </div>
            <div class="container">
                <div class="contactinfo">
                    <div class="box">
                        <div class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                        <div class="text">
                            <h2>Address</h2>
                            <p>Norte, <br> Don Carlos, Bukidnon</p>
                        </div>
                    </div>
                    <div class="box">
                        <div class="icon"><i class="fa fa-phone" aria-hidden="true"></i></div>
                        <div class="text">
                            <h2>Phone</h2>
                            <p>09999999999</p>
                        </div>
                    </div>
                    <div class="box">
                        <div class="icon"><i class="fa fa-envelope-o" aria-hidden="true"></i></div>
                        <div class="text">
                            <h2>Email</h2>
                            <p>zorenchuy@gmail.com</p>
                        </div>
                    </div>
                </div>
            </div>
</body>