<?php
require 'dbc.php';

//If movie_database doesn't exist, create table
$tableCheck = mysqli_query($dbc,'select 1 from `movie_database` LIMIT 1');
if($tableCheck == FALSE){
    $sql = "CREATE TABLE movie_database(
    userID VARCHAR(20),
    movieTitle VARCHAR(100),
    rating INT(2)
    )";
$result = mysqli_query($dbc,$sql) or die("Unable to create movie_database Table $sql");

    //Insert data into Car table
    $sql = "INSERT INTO movie_database(userID, movieTitle, rating)
    VALUES
    ('user0', 'The Godfather', 3),
    ('user0', 'The Wizard of Oz', 1),
    ('user0', 'The Power of the Dog', 4),
    ('user0', 'The Avengers', 5),
    ('user0', 'Titanic', 5),
    ('user0', 'Me Before You', 5),
    ('user0', 'La La Land', 2),
    ('user0', 'Frozen', 2),
    ('user0', 'Avatar', 4),
    ('user0', 'It', 0),
    ('user1', 'The Godfather', 4),
    ('user1', 'The Wizard of Oz', 4),
    ('user1', 'The Power of the Dog', 3),
    ('user1', 'The Avengers', 5),
    ('user1', 'Titanic', 2),
    ('user1', 'Me Before You', 4),
    ('user1', 'La La Land', 3),
    ('user1', 'Frozen', 2),
    ('user1', 'Avatar', 3),
    ('user1', 'It', 1),
    ('user2', 'The Godfather', 5),
    ('user2', 'The Wizard of Oz', 0),
    ('user2', 'The Power of the Dog', 3),
    ('user2', 'The Avengers', 4),
    ('user2', 'Titanic', 5),
    ('user2', 'Me Before You', 4),
    ('user2', 'La La Land', 1),
    ('user2', 'Frozen', 4),
    ('user2', 'Avatar', 3),
    ('user2', 'It', 2),
    ('user3', 'The Godfather', 2),
    ('user3', 'The Wizard of Oz', 1),
    ('user3', 'The Power of the Dog', 4),
    ('user3', 'The Avengers', 2),
    ('user3', 'Titanic', 4),
    ('user3', 'Me Before You', 1),
    ('user3', 'La La Land', 2),
    ('user3', 'Frozen', 1),
    ('user3', 'Avatar', 4),
    ('user3', 'It', 2),
    ('user4', 'The Godfather', 5),
    ('user4', 'The Wizard of Oz', 3),
    ('user4', 'The Power of the Dog', 5),
    ('user4', 'The Avengers', 5),
    ('user4', 'Titanic', 0),
    ('user4', 'Me Before You', 3),
    ('user4', 'La La Land', 2),
    ('user4', 'Frozen', 3),
    ('user4', 'Avatar', 4),
    ('user4', 'It', 5),
    ('user5', 'The Godfather', 5),
    ('user5', 'The Wizard of Oz', 4),
    ('user5', 'The Power of the Dog', 5),
    ('user5', 'The Avengers', 5),
    ('user5', 'Titanic', 3),
    ('user5', 'Me Before You', 0),
    ('user5', 'La La Land', 1),
    ('user5', 'Frozen', 3),
    ('user5', 'Avatar', 5),
    ('user5', 'It', 3),
    ('user6', 'The Godfather', 0),
    ('user6', 'The Wizard of Oz', 3),
    ('user6', 'The Power of the Dog', 4),
    ('user6', 'The Avengers', 3),
    ('user6', 'Titanic', 3),
    ('user6', 'Me Before You', 4),
    ('user6', 'La La Land', 4),
    ('user6', 'Frozen', 3),
    ('user6', 'Avatar', 4),
    ('user6', 'It', 2),
    ('user7', 'The Godfather', 0),
    ('user7', 'The Wizard of Oz', 3),
    ('user7', 'The Power of the Dog', 4),
    ('user7', 'The Avengers', 3),
    ('user7', 'Titanic', 3),
    ('user7', 'Me Before You', 4),
    ('user7', 'La La Land', 4),
    ('user7', 'Frozen', 3),
    ('user7', 'Avatar', 3),
    ('user7', 'It', 2),
    ('user8', 'The Godfather', 3),
    ('user8', 'The Wizard of Oz', 3),
    ('user8', 'The Power of the Dog', 5),
    ('user8', 'The Avengers', 3),
    ('user8', 'Titanic', 3),
    ('user8', 'Me Before You', 2),
    ('user8', 'La La Land', 4),
    ('user8', 'Frozen', 3),
    ('user8', 'Avatar', 4),
    ('user8', 'It', 4),
    ('user9', 'The Godfather', 4),
    ('user9', 'The Wizard of Oz', 2),
    ('user9', 'The Power of the Dog', 4),
    ('user9', 'The Avengers', 5),
    ('user9', 'Titanic', 4),
    ('user9', 'Me Before You', 3),
    ('user9', 'La La Land', 2),
    ('user9', 'Frozen', 3),
    ('user9', 'Avatar', 4),
    ('user9', 'It', 3);
    ";
    $result = mysqli_query($dbc,$sql) or die("Error inserting data to movie_database Table");
}
echo"Successful Connection";
$dbc -> close();
?>
