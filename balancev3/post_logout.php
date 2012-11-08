<?php session_start();
	$_SESSION['isActive']=false;
	session_destroy();
	header("Location: ./splash.php?logout"); //SET logout confirm MESSAGE HERE by extending url query
	exit();
?>

<!-- this file just confirms logout, ends the session and then redirects to the splash page-->

<!DOCTYPE html>
<html>
	<body>
	</body>
</html>