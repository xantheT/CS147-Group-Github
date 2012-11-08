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
			<form class="navbar-search pull-left" action="search_result.php" method="post">
			<input type="text" name="query" class="search-query" placeholder="Search">
			<button type="submit" class="btnSearch"><i class="icon-search"></i></button>
			</form>
			<!-- Note: minor error is reloading the search_Result.php page from the url without a search query produces errors -->
			<br><br><br>
			<p class="muted"> <!-- Start of container for results-->
			<br/>
			<?php
				$search_query = $_POST["query"];
				echo "Search results for <strong>\"".$search_query."\"</strong>: <br/><br/>";
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
					
					if ((!($pos_title === false)) || (!($pos_source === false)) || (!($pos_text === false)) || (!($pos_url === false)) || (!($pos_keyword === false))) { 
						$no_results = false;
						
						// This triple inequality with a bang before it is necessary. don't ask why, i'm not sure. :(
						/*
						These are the parameters for our stories database:
						$row["title"]
						$row["time"]
						$row["source"]
						$row["fiscal_scale"]
						$row["social_scale"]
						$row["picture"]
						$row["text"]
						$row["url"]
						$row["keywords"]
						However, as of now (Sat 11/3) the database doesn't have any pictures or keywords associated. Amit needs to fix these on the google spreadsheet and enter them into phpmyadmin.
						*/
						echo "<strong>Title: ".$row["title"]."</strong><br/>";
						echo "Time: ".$row["time"]."<br/>";
						echo "Source: ".$row["source"]."<br/>";
						echo "Fiscale Scale: ".$row["fiscal_scale"]."<br/>";
						echo "Social Scale: ".$row["social_scale"]."<br/>";
						echo "Picture Name: ".$row["picture"]."<br/>";
						//echo "Text: ".$row["text"]."<br/>";
						echo "URL: ".$row["url"]."<br/>";
						echo "Keywords: ".$row["keywords"]."<br/>";
						echo "<br/><br/>";
					}
				}
				if ($no_results) {
						echo "<strong> None of the articles matched your query, \"".$search_query."\"</strong><br/><br/";
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