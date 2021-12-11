<?php
require '../db/dbc.php';


/**
 * This function takes in a username and recommend another movie this user should
 * watch based on their current ratings of movies and other user's ratings in our database
 **/
function recommender(string $user)
{
	$predictedRating = array();

	$moviesYetToRate = array("SELECT DISTINCT movieTitle FROM movie_database WHERE userID != '$user'");
	for ($z = 0; $z <= count($moviesYetToRate); $z++) {
		$tempMovie = $moviesYetToRate[$z];
		$rated = ratingScore($user, $tempMovie);
		array_push($predictedRating, $rated => $tempMovie)
	}
	arsort($predictedRating); //sorts this array into decending array of values
	echo "We recommend you watch: " . reset($predictedRating) . " next!"; //this gives the top predictedRated movie of the user.
}


/**
 * array $user1 and array $user2 must be same length
 * assume each indexed rating corresponds to the same movie for both users where not null for both.
 * This function takes in two arrays and returns a similarity score between the two.
 * @user1 -> array
 * @user2 -> array
 * return -> float
 **/
function sim($user1, $user2)
{
	$avg1 = array_sum($user1) / count($user1);
	$avg2 = array_sum($user2) / count($user2);

	$numer = 0;
	$u1den = 0;
	$u2den = 0;

	for ($x = 0; $x <= count($user1); $x++) {
		$i = $user1[$x];
		$j = $user2[$x];
		if (($i && $j) != null) {
			$numer = $numer + ($i - $avg1) * ($j - $avg2);
			$u1den = $u1den + (($i - $avg1) ** 2);
			$u2den = $u2den + (($j - $avg2) ** 2);
		}
	}

	return $numer / sqrt($u1den * $u2den);
}


/**This function takes in a username and an array of movie names
 * and returns an array of rating corresponding to the movies.
 **/

function getRatingArray($a, $b): array
{
	$rating = array(); //intialize
	for ($w = 0; $w <= count($b); $w++) {
		$curr = $b[0];
		$sql = mysqli_query($dbc, "SELECT rating FROM movie_database WHERE userID = '$a' && movieTitle = '$curr'  ");
		while ($row = mysqli_fetch_array($sql)) {
			$rating[] = $row['rate'];
		}
	} //add to rating array
	return $rating;
}

/**This function takes the current user and a movie name and
 * returns a possible rating the user might give that movie based
 * on the similarity of this users and users already in the database.
 * @currUser -> String
 * @movie -> String
 * return -> float
 **/
function ratingScore(string $currUser, string $movie)
{
	$alluserIDs = array("SELECT DISTINCT userID FROM movie_database WHERE userID != '$currUser'");
	$currUserMovies = array("SELECT movieTitle FROM movie_database WHERE userID = '$currUser'");
	$currUserRatings = array("SELECT rating FROM movie_database WHERE userID = '$currUser'");
	$ratingNum = 0;
	$ratingDen = 0;

	for ($y = 0; $y <= count($alluserIDs); $y++) {
		$tempUser = $alluserIDs[$y];
		$tempUserRatings = getRatingArray($tempUser, $currUserMovies);
		$simscore = sim($currUserRatings, $tempUserRatings);
		if ($simscore > 0) {
			$r = mysqli_query($dbc, "SELECT rating FROM movie_database WHERE userId = '$tempUser' && movieTitle ='$movie'");
			$result = mysqli_fetch_array($r);
			$temp = $result['r'];
			$ratingNum += $simscore * $temp;
			$ratingDen += $simscore;
		}
	}
	if ($ratingDen != 0) {
		return $ratingNum / $ratingDen;
	} else {
		return 0;
	}
}
$dbc -> close();
?>
