<!DOCTYPE html>
<?php
require_once('../db/dbc.php');
if(!isset($_SESSION))
{
    session_start();
}  ?>

<html>
  <head>
    <meta charset="utf-8">
    <title> Movie Recommender System </title>
    <link rel = "stylesheet" type = "text/css" href = "../css/styles.css"/>
    <link rel = "stylesheet" type = "text/css" href = "../css/reviews.css"/>
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
  <h2> Reviews </h2>
  <center><img src="../img/logo.png" style = "width:20%"></center>
  <h3> Please rate the movie based on your preference. </h3>
  <!-- Review Form -->
    <form name="form" action="../db/reviewProcess.php" method="POST">
    <label for = "movie"> Choose a movie to rate: </label>
    <select name = "movie">
      <option value = "The Godfather" >The Godfather</option>
      <option value = "The Wizard of Oz" >The Wizard of Oz</option>
      <option value = "The Power of the Dog" >The Power of the Dog</option>
      <option value = "The Avengers" >The Avengers</option>
      <option value = "Titanic" >Titanic</option>
      <option value = "Me Before You" >Me Before You</option>
      <option value = "La La Land" >La La Land</option>
      <option value = "Frozen" >Frozen</option>
      <option value = "Avatar" >Avatar</option>
      <option value = "It" >It</option>
    </select>
    <br>
    <div class = "rate">
      <input type="radio" id="star5" name="rate" value="5"/>
      <label for="star5" title="text">5 stars</label>
      <input type="radio" id="star4" name="rate" value="4"/>
      <label for="star4" title="text">4 stars</label>
      <input type="radio" id="star3" name="rate" value="3"/>
      <label for="star3" title="text">3 stars</label>
      <input type="radio" id="star2" name="rate" value="2"/>
      <label for="star2" title="text">2 stars</label>
      <input type="radio" id="star1" name="rate" value="1"/>
      <label for="star1" title="text">1 star</label>
    </div>
    <br>
    <input type = "submit" value = "submit" name = "submit">
  </form>

  <br>
  <form name = "form" action = "" method = "GET">
    <label> Click button to retrieve information: </label>
    <input type = "submit" value = "retrieve" name = "retrieve">
    <h4> Recommended Movie:</h4>
  </form>

  <script>
    function retrieve() {
      var retrieve = document.getElementById("retrieve");
      if (retrieve.style.display == "none") {
        retrieve.style.display = "block";
      }
      else{
        retrieve.style.display = "none";
      }
    }
  </script>

  <?php
  if(isset($_GET['retrieve'])){
    $userID = $_SESSION['userID'];
    $sql = "SELECT * FROM reviews_table WHERE userID = $userID;";
    $result = $dbc->query($sql);

    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        echo $row["movie"]." ".$row["rate"]."<br>";
      }
    } else {
      echo "0 results";
    }
  }
  ?>
  </body>
</html>
