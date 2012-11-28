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
			<form class="form-search searchForm" action="search_result.php" method="post">
  			   <div class="input-append searchBox">
			    <input type="text" class="span2 search-query" name="query" placeholder="Search..." value=<?php echo $_POST["query"];?> >
			    <button type="submit" class="btn searchBtn"><i class="icon-search"></i></button>
			  </div>
			</form>

			<!-- Note: minor error is reloading the search_Result.php page from the url without a search query produces errors -->
			<!-- Think above worry is fixed now -->
			<p class="muted"> <!-- Start of container for results-->
			<?php
				$search_query = $_POST["query"];
				if ($search_query == "") {
					echo "Begin your search for a story above";
				} else {
					include("config.php");
					$sql_query = "SELECT * FROM balance_stories";
					$result = mysql_query($sql_query);
					$no_results = true;
					while ($row = mysql_fetch_assoc($result)) {
						$pos_title = strpos(strtolower($row["title"]), strtolower($search_query));
						$pos_source = strpos(strtolower($row["source"]), strtolower($search_query));
						$pos_text = strpos(strtolower($row["text"]), strtolower($search_query));
						$pos_url = strpos(strtolower($row["url"]), strtolower($search_query));
						$pos_keyword = strpos(strtolower($row["keyword"]), strtolower($search_query));
						
						if ((!($pos_title === false)) || (!($pos_source === false)) 
								|| (!($pos_text === false)) || (!($pos_url === false)) 
								|| (!($pos_keyword === false))) 
						{ 
							$no_results = false;
							echo output_story_brief($row);//this sneaky little function lives in 'helper_fns.php'
										// it takes in a row object from the stories db
										// and outputs full and correct html for the story in list format 
						}
					}
					if ($no_results) {
							echo "No results found for <strong>\"".$search_query."\"</strong><br/>";
						}
				}
				?>
			</p>
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