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
		$home='""';
		$search='""';
		$profile='""';
		$settings='"active"';
		include("banner.php");
		?>

		<!-- PLACE BODY INSIDE HERE - this is within the header and the footer-->
		<div class="container firstOffset">
			<div data-role="content">
			<?php
				include("config.php");
				$query = "SELECT * FROM balance_users";
				$result = mysql_query($query);
				$successful_login = False;
				while ($row = mysql_fetch_assoc($result)) {
					if ($_POST["username"] == $row["username"] && $_POST["password"] == $row["password"]) {
						$successful_login = True;
						break;
					}
				}
				
			if ($successful_login) {
				?>
				<script type="text/javascript">
					// Save the username in local storage. That way you
					// can access it later even if the user closes the app.
					localStorage.setItem('username', '<?=$_POST["username"]?>');
				</script>
				<?php
				echo "<p>Thank you, <strong>".$_POST["first_name"]."</strong>. You are now logged in as <strong>".$_POST["username"]."</strong></p>";
			} else {
				echo "<p>There seems to have been an error.</p>";
			}

			if ($successful_login) {
				session_start()
				$_SESSION['username'] = $_POST["username"];
			}
			
			// Still need to implement a logout
			// To delete only some session data, you can do
			
			/*
			if(isset($_SESSION['***yourvariablename***']))
				unset($_SESSION['***yourvariablename***'])
			*/
			// We will unset the username of session to logout
			
			// To completely destroy a session, we will use a session_destroy();
			
			?>
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