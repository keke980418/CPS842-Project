<!DOCTYPE html>
<?php
require_once('../db/dbc.php');
if(!isset($_SESSION))
{
    session_start();
}  ?>

<html>
  <head>
    <meta charset = "utf-8">
    <title> Movie Recommender System </title>
    <link rel = "stylesheet" type = "text/css" href = "../css/styles.css"/>
    <link rel = "stylesheet" type = "text/css" href = "../css/login.css"/>
  </head>

  <body>
    <ul id = "menu">
        <li><a href = "../index.php"> Home </a></li>
        <li><a href="reviews.php"> Reviews </a></li>
        <!-- Sign-up page -->
        <?php if (isset($_SESSION['user'])){
          echo "<li style = 'float:right'><a href = '../scripts/logout.php'> Sign Out </a></li>";
          echo "<li style = 'float:right'><a href = ''>Welcome ". $_SESSION['user'] ."</a></li>";
        }
        else {
          echo "<li style = 'float:right'><a href = 'signup.php'> Sign Up </a></li>";
        }
        ?>
        <!-- Log-in page -->
        <?php if (!isset($_SESSION['user'])){
          echo "<li style = 'float:right'><a href = 'login.php'> Log in </a></li>";
        }
        ?>
    </ul>

    <h2> Login Form </h2>
    <form action = "../db/loginProcess.php" method = "post">
    <div class = "imgcontainer">
      <img src = "https://www.w3schools.com/howto/img_avatar2.png" style = "width: 15%;" alt = "Avatar" class = "avatar">
    </div>
    <!-- Empty -->
    <?php
    if(@$_GET['Empty'] == true){
      ?>
      <div class = "alert-light text-danger text-center py-3"><?php echo $_GET['Empty'] ?></div>
    <?php
    }
    ?>
    <!-- Invalid -->
    <?php
    if(@$_GET['Invalid'] == true){
      ?>
      <div class = "alert-light text-danger text-center py-3"><?php echo $_GET['Invalid'] ?></div>
      <?php
    }
    ?>
    <div class = "container">
      <label for = "email"><b>Email</b></label>
      <input type = "email" placeholder = "Enter your Email" name = "email" required>
      <label for = "psw"><b>Password</b></label>
      <input type = "password" placeholder = "Enter your Password" name = "psw" required>
      <button type = "submit" name = "login">Log in</button>
    </div>
  </form>
  </body>
</html>
