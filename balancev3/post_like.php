<?php
	//'session_check.php' checks if the session is active and if not 
	// redirects to the splash page
	include("session_check.php");
?>
<!-- SESSION: ABOVE MUST BE PLACED AT VERY BEGINNING OF FILE BEFORE ANYTHING GET'S OUTPUTTED TO BROWSER -->

<?php
	include "config.php";
	//THE MACHINE LEARNING PART THAT MOVES YOU SCORE CLOSER TO AN ARTICLE
	// the function lives in helper_fns
	adjustUserScore($_GET["id"]);
	if ($_GET["page"]=="reload") {
		$redirect = "history.go(-1);";
	} elseif ($_GET["page"]=="back") {
		$redirect = "window.history.go(-2);";  //goes back 2: back to story -> back to page prev to story
	} else {
		$redirect = "window.location = './".$_GET["page"].".php';";
	}
?>

<!DOCTYPE html>
<html>
<body>
		<script type="text/javascript">
			<?php echo $redirect; ?>
		</script>
</body>
</html>