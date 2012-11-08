<!DOCTYPE html>
<html>

<!-- SPLASH.PHP  - MAKE A USER ARRIVE HERE if they go to index.php but do not have an active session -->

	<?php
	//'head.php' includes all header information for all of our pages
	// ie. everything that lives within <head>...info..</head> 
	include("head.php");
	?>

	<body>

		<!-- PLACE BODY INSIDE HERE - this is within the header and the footer-->
		<div class="container">
			
			<h1><img src="img/logo.png" class="logo splash"> Balance</h1>

			<?php 
				if (isset ($_GET['logout']))
				{
				   echo '<div class="alert"><button type="button" class="close" data-dismiss="alert">x</button>You have been successfully logged out!</div>';
				}
			?>

			<div data-role="content">
			<p> Welcome! Please login or register.</p>
			<br>
			<a class="plain" href="login.php"><button class="btn btn-large btn-block btn-info" type="button">Login</button></a>
			<br>
			<a class="plain" href="register.php"><button class="btn btn-large btn-block" type="button">Register</button></a>
				
			</div>
		
		
		
		</div>


		
		



		<!-- Below java script from twitter bootstrap-->
		<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>

		<script src="js/bootstrap-button.js"></script>
	    <script src="js/jquery.js"></script>
	    <script src="js/bootstrap-transition.js"></script>
	    <script src="js/bootstrap-alert.js"></script>
	    <script src="js/bootstrap-modal.js"></script>
	    <script src="js/bootstrap-dropdown.js"></script>
	    <script src="js/bootstrap-scrollspy.js"></script>
	    <script src="js/bootstrap-tab.js"></script>
	    <script src="js/bootstrap-tooltip.js"></script>
	    <script src="js/bootstrap-popover.js"></script>
	    <script src="js/bootstrap-button.js"></script>
	    <script src="js/bootstrap-collapse.js"></script>
	    <script src="js/bootstrap-carousel.js"></script>
	    <script src="js/bootstrap-typeahead.js"></script>
	    <script src="js/bootstrap-affix.js"></script>
	    <script src="js/application.js"></script>


	    <script type="text/javascript">
		$("a").click(function (event) {
		    event.preventDefault();
		    window.location = $(this).attr("href");
		});
		</script>

	</body>
</html>