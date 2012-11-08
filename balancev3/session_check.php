<?php session_start();
	if ($_SESSION['isActive']==false) {
	 	header("Location: ./splash.php");
		exit();		 
	 } else {
		echo "<br><br><br><br>other user info, id: ". $_SESSION['user_id'].", user name: ". $_SESSION['user_name']."";//test the session variable to see if session persists;
	 }
	
?>