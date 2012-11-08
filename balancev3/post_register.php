<?php
	$username = $_POST["username"];   //NOTE: do we want to make this unique!!!
	$entered_password = $_POST["password1"];
	//salt then crypt $entered_password to save in db, salt should be unique for each user. Is not right now!
	//Consider building this out. For now, each user has the same salt. Not terribly safe.
	$salt = "kr";
	// This password_to_save will be saved in the database.
	$password_to_save = crypt($entered_password, $salt);

	$email = $_POST["email"];
	$socScore = $_POST["socPref"];
	$fiscScore = $_POST["fiscPref"];

	//Normalize the user's soc and fisc score based on what they said
	//ie. place them in the middle of the quadrant of the graph that fits 
	//their answers to the two questions we asked so they get 1/4 or 3/4 for each Q.
	//NOTE: fiscal conservative = more, liberal = less on our graph
	//soc conservative = more, liberal = less
	if ($socScore == 'c') {
		$socScore = 75;
	} else {
		$socScore = 25;   //MUST CHANGE THIS IF WE CHANGE THE SCORING SYSTEM
	}
	if ($fiscScore == 'c') {
		$fiscScore = 75;
	} else {
		$fiscScore = 25;
	}


	//now insert into db
	include("config.php");
	$query = sprintf("INSERT INTO balance_users (username, password, email, social_scale, fiscal_scale) VALUES ('%s','%s','%s',%d,%d)",
		mysql_real_escape_string($username),
		mysql_real_escape_string($password_to_save),
		mysql_real_escape_string($email),
		mysql_real_escape_string($socScore),
		mysql_real_escape_string($fiscScore) 
		);
	// Actually add into to db now
	$result = mysql_query($query);

	//now get that user out of db to input info into session
	$userQuery = sprintf("SELECT * FROM balance_users WHERE username ='%s' AND password='%s'",
			mysql_real_escape_string($username),
    		mysql_real_escape_string($password_to_save));
	// Perform Query
	$userResult = mysql_query($userQuery);


	//SET SESSION HERE - NOW - start the session and redirect to 'profile'????
	session_start();
	$_SESSION['xanthe'] = "session seemes to work for user: ".$username; // store session data???
	$_SESSION['user_id'] = mysql_result($userResult, 0, 0); //refers to row 0 of the results, and column 0 (in our php table)
	$_SESSION['isActive'] = true;   // This will be used to check the session
	header("Location: ./profile.php");
	exit();
?>

<!-- THIS IS JUST A TEMPLATE FILE - it does calculations 
	to decide whether log in was successful or not and redirects appropriately-->


	<!DOCTYPE html>
	<html>
	<body>
	</body>
	</html>