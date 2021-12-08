<?php
require 'dbc.php';
if(!isset($_SESSION))
{
    session_start();

}
//If user_table doesn't exist, create table
$tableCheck = mysqli_query($dbc,'select 1 from `reviews_table` LIMIT 1');
if($tableCheck == FALSE){
    $sql = "CREATE TABLE reviews_table(
        userID VARCHAR(10),
        movie VARCHAR(100),
        rate VARCHAR(1)
        )";
    $result = mysqli_query($dbc,$sql) or die("Unable to create Reviews Table $sql");
}
// insert into sql database
if(isset($_POST['submit'])){
    $userID = $_SESSION['userID'];
    $movie =$_POST['movie'];
    $rate = $_POST['rate'];
    if(empty($rate)){
      $rate = 0;
    }

    $sql = mysqli_query($dbc, "SELECT movie FROM reviews_table WHERE movie = '$movie';");
    if (mysqli_num_rows($sql) > 0)
    {
      //update if exist
      $sqlUpdate = "UPDATE reviews_table SET rate = '$rate' WHERE movie = '$movie';";
      mysqli_query($dbc, $sqlUpdate) or die("Error Updating user to reviews_table");
    }
    else {
      //insert if not exist
      $sqlInsert="INSERT INTO reviews_table (userID, movie, rate)
          VALUES ('$userID', '$movie', '$rate');";
      mysqli_query($dbc, $sqlInsert) or die("Error Inserting user to reviews_table");
    }
    //Redirect To Reviews
    header("Location: ../templates/reviews.php");
}
$dbc -> close();
?>
