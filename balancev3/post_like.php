<?php
	//'session_check.php' checks if the session is active and if not 
	// redirects to the splash page
	include("session_check.php");
?>
<!-- SESSION: ABOVE MUST BE PLACED AT VERY BEGINNING OF FILE BEFORE ANYTHING GET'S OUTPUTTED TO BROWSER -->

<?php

//THE MACHINE LEARNING PART THAT MOVES YOU SCORE CLOSER TO AN ARTICLE
	$normalizer = 50; //NB: this is randomly chose as the normalizer. IS THIS RIGHT???


        include "config.php";
     	$story = getCurrStory($_GET["id"]);
        $user = getCurrUser();

        //now move the user's scores closer to the article
        //Soc score
        $moveScoreBy = ($story->social_scale - $user->social_scale)/$normalizer;
        $newSocScore = $user->social_scale + $moveScoreBy;
        //fisc score
		$moveScoreBy = ($story->fiscal_scale - $user->fiscal_scale)/$normalizer;  
		$newFiscScore = $user->fiscal_scale + $moveScoreBy;

		//put new score in DB
       	$query = sprintf("UPDATE balance_users SET fiscal_scale=%d, social_scale=%d WHERE id=%d",
			mysql_real_escape_string($newFiscScore),
			mysql_real_escape_string($newSocScore),
			mysql_real_escape_string($_SESSION['user_id'])
			);
		// Actually update db now
		$result = mysql_query($query);

?>

<!DOCTYPE html>
<html>
<body>
		<script type="text/javascript">
			window.location = "./story.php";
		</script>

</body>
</html>