<!DOCTYPE html>
<html>

<!-- LOGIN.PHP -->

	<?php
	//'head.php' includes all header information for all of our pages
	// ie. everything that lives within <head>...info..</head> 
	include("head.php");
	?>

	<body>
	
		<?php
		//partial for the top banner of the page
		$home='""';
		$search='""';
		$profile='""';
		$settings='"active"';
		include("banner.php");
		?>

		<!-- PLACE BODY INSIDE HERE - this is within the header and the footer-->
		<div class="container firstOffset">
			<div data-role="content">
		
			<form id="form" action="enter.php" method="post">
				<div data-role="fieldcontain">
			     <label for="foo">Username:</label>
			     <input type="text" name="username" id="foo" value="" autocapitalize="off" />
				</div>
				<div data-role="fieldcontain">
			     <label for="foo">Password:</label>
			     <input type="password" name="password" id="foo" value=""  />
				</div>
				
				<button type="submit" data-theme="b" name="submit" value="submit-value">Submit</button>
			</form>
				
			<div id="info">
				<p>Once you log in, you should be able to see all of your user information!.</p>
			</div>	
			</div>
		
		
		
		</div>

		<!-- Footer -->
		<?php
		//partial for the footer of the page
		$story=false;
		include("footer.php");
		?>
		
		
		<script type="text/javascript">
		$("a").click(function (event) {
		    event.preventDefault();
		    window.location = $(this).attr("href");
		});
		</script>


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


	</body>
</html>