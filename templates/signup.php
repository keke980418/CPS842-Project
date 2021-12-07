<!DOCTYPE html>
<?php
require_once('../db/dbc.php');
 ?>
<html>
  <head>
    <meta charset="utf-8">
    <title> Movie Recommender System </title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css"/>
    <link rel="stylesheet" type="text/css" href="../css/signup.css"/>
    <script>
      function validatepsw() {
        var password = document.forms["form"]["psw"].value;
        var passwordRepeat = document.forms["form"]["psw-repeat"].value;
        var email = document.forms["form"]["email"].value;
        var check = true;
        //var flag = new Boolean(1);
        if(password != passwordRepeat){
          check = false;
          alert("Passwords do not match!");
        }
      }
    </script>
  </head>

  <body>
    <ul id = "menu">
        <li><a href = "../index.php"> Home </a></li>
        <li><a href="reviews.php"> Reviews </a></li>
        <!-- Sign-up page -->
        <?php if (isset($_SESSION['user'])){
          echo "<li style = 'float:right'><a href = '../scripts/logout.php'> Sign Out </a></li>";
          echo "<li style = 'float:right'><a href = ''> Welcome ". $_SESSION['user'] ."</a></li>";
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

      <form name="form" onsubmit="validatepsw();" action="../db/signup.php" method="POST" style="border:1px solid #ccc">
        <div class="container">
          <h2>Sign Up</h2>
          <h3>Please fill in this form to create an account.</h3>
          <hr>

          <label for="email"><b>Email</b></label>
          <input type="email" placeholder="Enter your Email" name="email" required>

          <label for="psw"><b>Password</b></label>
          <input type="password" placeholder="Enter your Password" name="psw" required>

          <label for="psw-repeat"><b>Repeat Password</b></label>
          <input type="password" placeholder="Repeat your Password" name="psw-repeat" required>

          <label for="fname"><b>First Name</b></label>
          <input type="text" placeholder="Enter your First Name" name="fname" required>

          <label for="lname"><b>Last Name</b></label>
          <input type="text" placeholder="Enter your Last Name" name="lname" required>

          <label for="phone"><b>Phone Number</b></label>
          <input type="tel" id="phone" name="phone" placeholder="012-345-6789" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" maxlength="12" required>

          <label for="postalCode"><b>Home Postal Code</b></label>
          <input type="text" id="postalCode" name="postalCode" placeholder="Enter your Postal Code" maxlength="6" required>

          <div class="clearfix">
            <button type="submit" name="submit">Sign Up</button>
          </div>
        </div>
      </form>
  </body>
</html>
