<!DOCTYPE html>
<?php
require('./db/dbc.php');
if(!isset($_SESSION))
{
    session_start();

}  ?>

<html>
  <head>
    <meta charset = "utf-8">
    <title> Movie Recommender System </title>
    <link rel = "stylesheet" type = "text/css" href = "./css/styles.css">
  </head>
  <body>
    <ul id = "menu">
        <li><a href = "./index.php"> Home </a></li>
        <li><a href="./templates/reviews.php"> Reviews </a></li>
        <!-- Sign-up page -->
        <?php if (isset($_SESSION['user'])){
          echo "<li style = 'float:right'><a href = 'scripts/logout.php'> Sign Out </a></li>";
          echo "<li style = 'float:right'><a href = ''> Welcome ". $_SESSION['user'] ."</a></li>";
        }
        else {
          echo "<li style = 'float:right'><a href = './templates/signup.php'> Sign Up </a></li>";
        }
        ?>
        <!-- Log-in page -->
        <?php if (!isset($_SESSION['user'])){
          echo "<li style = 'float:right'><a href = './templates/login.php'> Log in </a></li>";
        }
        ?>
    </ul>
    <h1> Movie </h1>
    <h2> Recommender System </h2>
    <center> <img src = "./img/logo.png" width = 40% height = 40%> </center>
    <br><br>
    <center> <button id = "click" onclick = "location.href='./templates/reviews.php'" type = "button"> Click Here & Go to Reviews </button> </center>
  </body>
</html>
