<!DOCTYPE html>
<html>
<head>
    <?php
      session_start();
        if (!isset($_SESSION['userid'])){
          header('Location: ./login.php');
        }
      ?>
        <title>HOME</title>
        <link rel="stylesheet" type="text/css" href="css/Home.css">
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
    <div class="images">
        <div class="row">
            <div class="col">
                <h1>My name is Zorren lhenard Uayan, 23 years old. A BSIT student of Bukidnon State University.</h1>
                <h2>Hello Good Day, I am Zoren Lhenard Uayan a simple boy from Don Carlos Bukidnon. Living in this world for more than 22 years, I am thankful for my parents namely Mrs.Lorenzo and Jean Uayan who help me grow and guide me through all this years of happiness and sadness. I am the 2nd of the five siblings in the family, Continuing my dreams is my focus in life to have a brighter future.</h2>
            </div>
            <div class="col">
              <div class="card">
                  <img src="images/me.jpg"> 
                  <img src="images/me2.jpg"> 
                  <img src="images/us.jpg"> 
                  <img src="images/us3.jpg"> 
              </div>
            </div>
        </div>
    </div>
</body>