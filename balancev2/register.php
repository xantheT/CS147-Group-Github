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
		
		<!-- Random Submit Action Specified for this Form But Not Created Yet. Ideally want to post to database -->
				<form action="submit.php" method="post">
					<div data-role="fieldcontain">
				     <label for="foo">Username:</label>
				     <input type="text" name="name" id="foo" value=""  />
					</div>
					<!-- WARNING: names are all the same for these fields -->
					<div data-role="fieldcontain">
				     <label for="foo">Password:</label>
				     <input type="text" name="name" id="foo" value=""  />
					</div>
					
					<div data-role="fieldcontain">
				     <label for="foo">First Name:</label>
				     <input type="text" name="name" id="foo" value=""  />
					</div>
					
					<div data-role="fieldcontain">
				     <label for="foo">Last Name:</label>
				     <input type="text" name="name" id="foo" value=""  />
					</div>
					
					<div data-role="fieldcontain">
				     <label for="foo">Email Address:</label>
				     <input type="text" name="name" id="foo" value=""  />
					</div>
				
					<div data-role="fieldcontain">
					<fieldset data-role="controlgroup">
				    	<legend>I Identify As Socially:</legend>
				         	<input type="radio" name="gender" id="radio-female" value="c" />
				         	<label for="radio-female">Conservative</label>
				
				         	<input type="radio" name="gender" id="radio-male" value="l" />
				         	<label for="radio-male">Liberal</label>
				    </fieldset>
				    </div>
				    
				    <div data-role="fieldcontain">
					<fieldset data-role="controlgroup">
				    	<legend>I Identify As Fiscally:</legend>
				         	<input type="radio" name="gender" id="radio-female" value="c" />
				         	<label for="radio-female">Conservative</label>
				
				         	<input type="radio" name="gender" id="radio-male" value="l" />
				         	<label for="radio-male">Liberal</label>
				    </fieldset>
				    </div>
				    
				    <div class="ui-block-b"><button type="submit" data-theme="a">Register</button></div>
			
				</form>

				
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