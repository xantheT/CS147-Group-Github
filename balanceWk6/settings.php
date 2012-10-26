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

		<!-- Footer, can we make this reusable???
		<?php
		//partial for the footer of the page
		//include("footer.php");
		?>
		-->
		<div class=" navbar-fixed-bottom ">
		  <div class="navbar">
		    <div class="navbar-inner">
		      <ul class="nav footer">
		        <li><a href="index.php"><img src="img/icons/home.png"></a></li>
		        <li><a href="profile.php"><img src="img/icons/profile.png"></a></li>
		        <li><a href="search.php"><img src="img/icons/search.png"></a></li>
		        <li class="active"><a href="settings.php"><img src="img/icons/settings.png"></a></li>
		      </ul>
		    </div>
		  </div>
		</div>
		<!-- END FOOTER-->
		
		
		<script type="text/javascript">
		$("a").click(function (event) {
		    event.preventDefault();
		    window.location = $(this).attr("href");
		});
		</script>

	</body>
</html>