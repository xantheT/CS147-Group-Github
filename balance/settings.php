<!DOCTYPE html>
<html>

<!-- SETTINGS.PHP -->

	<?php
	//'head.php' includes all header information for all of our pages
	// ie. everything that lives within <head>...info..</head> 
	include("head.php");
	?>

	<body>
	
		<?php
		//partial for the top banner of the page
		include("banner.php");
		?>

		<div><p>SETTINGS</p></div>

		<?php
		//partial for the footer of the page
		include("footer.php");
		?>
		
		
		<script type="text/javascript">
		$("a").click(function (event) {
		    event.preventDefault();
		    window.location = $(this).attr("href");
		});
		</script>

	</body>
</html>