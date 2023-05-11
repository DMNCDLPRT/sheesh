<!DOCTYPE html>
<html>
  
<head>
<?php
      session_start();
        if (!isset($_SESSION['userid'])){
          header('Location: ./login.php');
        }
      ?>
<title>GALLERY</title>
<link rel="stylesheet" type="text/css" href="css/gallery.css">
<script type="text/javascript" src="js/lightbox-plus-jquery.min.js"></script>
</head>
<body>
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

    <div class="col">
              <div class="card">
                  <img src="images/me.jpg"> 
                  <img src="images/me2.jpg"> 
                  <img src="images/us.jpg"> 
                  <img src="images/us3.jpg"> 
              </div>
            </div>
</body>
