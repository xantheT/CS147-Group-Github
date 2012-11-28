<?php
	//'session_check.php' checks if the session is active and if not 
	// redirects to the splash page
	include("session_check.php");
?>
<!-- SESSION: ABOVE MUST BE PLACED AT VERY BEGINNING OF FILE BEFORE ANYTHING GET'S OUTPUTTED TO BROWSER -->



<!DOCTYPE html>
<html>

<!-- SEARCH.PHP -->

	<?php
	//'head.php' includes all header information for all of our pages
	// ie. everything that lives within <head>...info..</head> 
	include("head.php");
	?>

	<body>
	
		<?php
		//partial for the top banner of the page
		$home='""';
		$search='"active"';
		$profile='""';
		$settings='""';
		include("banner.php");
		?>

		<!-- PLACE BODY INSIDE HERE - this is within the header and the footer-->
		<div class="container firstOffset">
			<form class="form-search" action="search_result.php" method="post">

			    <input type="text" class="span2 search-query" id="appendedInputButtons" name="query" placeholder="Search...">
			    <button type="reset" class="btn"><i class="icon-remove"></i></button>
			    <button type="submit" class="btn"><i class="icon-search"></i></button>

			  <!-- Code from bootstrap for appended two buttons: 
			  
			  <div class="input-append">
				<input class="span2" id="appendedInputButtons" type="text">
				<button class="btn" type="button">Search</button>
			  <button class="btn" type="button">Options</button>
  			  </div>
				-->
				
				<!-- previous code without clear button (xanthe: delete if you don't want to keep this)
				<div class="container firstOffset">
			<form class="form-search searchForm" action="search_result.php" method="post">
  			   <div class="input-append searchBox">
			    <input type="text" class="span2 search-query" name="query" placeholder="Search...">
			    <button type="submit" class="btn searchBtn"><i class="icon-search"></i></button>
			  </div>
			</form>
			<p class="muted">Begin your search for a story above.</p>
		</div>
		-->
			</form>
			<div class="muted" style="margin-left:auto; margin-right:auto; width:90%;">Begin your search for a story above.</p>
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