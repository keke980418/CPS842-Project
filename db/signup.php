<?php
require 'dbc.php';
/** @var mysqli $dbc */

//If user_table doesn't exist, create table
$tableCheck = mysqli_query($dbc,'select 1 from `user_table` LIMIT 1');
if($tableCheck == FALSE){
    $sql = "CREATE TABLE user_table(
        userID INT(50) NOT NULL UNIQUE AUTO_INCREMENT,
        first_name VARCHAR(18),
        last_name VARCHAR(18),
        phone_number VARCHAR(12),
        email VARCHAR(50),
        postalCode VARCHAR(6),
        pw VARCHAR(120)
        )";
    $result = mysqli_query($dbc,$sql) or die("Unable to create User Table $sql");
}

if(isset($_POST['submit'])){
  $email =$_POST['email'];
  $psw = $_POST['psw'];
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $phone = $_POST['phone'];
  $postalCode = $_POST['postalCode'];

  $sql = "SELECT email FROM user_table WHERE email = '$email'";
  $result = mysqli_query($dbc,$sql);

  //Check if the email isn't taken
  if(mysqli_num_rows($result) == 0){
    //Add SHA1 + Salt encryption
    $salt = 'kdfhu24n21sdmxh3889';
    $psw = $_POST['psw'].$salt;
    $psw = sha1($psw);

    $sql = "INSERT INTO user_table
    (first_name, last_name, phone_number, email, postalCode, pw)
    VALUES ('$fname','$lname', '$phone', '$email', '$postalCode', '$psw');";

    $result = mysqli_query($dbc,$sql) or die("Error Inserting user to user_table");
    //Redirect To login
    header("Location: ../templates/login.php");
   }
}
$dbc -> close();
?>
