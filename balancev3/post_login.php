<?php
				$username = $_POST["username"];
				$entered_password = $_POST["password"];


				//salt $entered_password to check in db, salted pwd should be saved in db and be unique for each user.
				//Consider building this out. For now, each user has the same salt. Not terribly safe.
				$salt = "kr";
				// This saved_password would be saved in the database.
				$saved_password = crypt($entered_password, $salt); 

				//now check against db
				include("config.php");
				$query = sprintf("SELECT * FROM balance_users WHERE username ='%s' AND password='%s'",
					  mysql_real_escape_string($username),
    				  mysql_real_escape_string($saved_password));
				// Perform Query
				$result = mysql_query($query);
			     // This tells you how many rows were returned
				$num_rows = mysql_num_rows($result);
				if ($num_rows == 1) {
					//SET SESSION HERE
					session_start();
					$_SESSION['user_id'] = mysql_result($result, 0, 0); //refers to row 0 of the results, and column 0 (in our php table)
					$_SESSION['isActive'] = true;
					header("Location: ./index.php");
					exit();
				} else {
					//SET ERROR MESSAGE HERE
					header("Location: ./login.php?error");
					exit();			
				}

			?>

<!-- THIS IS JUST A TEMPLATE FILE - it does calculations 
	  to decide whether log in was successful or not and redirects appropriately-->


<!DOCTYPE html>
<html>
	<body>
	</body>
</html>