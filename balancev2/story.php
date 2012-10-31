<!DOCTYPE html>
<html>
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


		<div class="container firstOffset">
			<!-- Insert php stuff to pull from db and populate story here!!! -->
		<!-- source OF STORY-->
		<p class="muted small">NBCNews.com, 6s ago   <span class="label label-important">52%</span></p>
		<!-- HEADLINE OF STORY-->
		<h4>Romney: Election outcome will be defining for American families</h4>
		<!-- PIC FOR STORY-->
		<p><img src="img/examples/politics.jpg" alt="" /></p>
		<!-- BODY OF STORY-->
		<p>With just under a week to go before Election Day, the Romney campaign has a case of the blues -- the electoral kind.</p>
		<p>Yesterday brought the news that the campaign was wading into Pennsylvania, traditionally safe Democratic territory, with a flight 
			of televised campaign ads set to begin today.</p>
		<p>According to a source tracking television ad buys in the battleground states, the Romney campaign has already reserved nearly $600,000 worth of air time in the Philadelphia media market, 
			and the GOP campaign's move comes close on the heels of the news that the Obama campaign is also going on the air in the Keystone State. The initial size of the Obama ad buy is $650,000 on broadcast and cable in the Philadelphia and Pittsburgh areas from Oct. 31 through Nov. 6.</p>
		<p>And it's not just Pennsylvania. Late last week, both campaigns took to the airwaves in another typically blue state -- Minnesota --- and now there are signs of movement in Michigan too. ABC News recently changed Pennsylvania and Minnesota's rating from "safe" to "lean" Democratic.
		 Michigan remains in solid Obama territory.</p>
		<p>It is possible that both campaigns' investments will grow before next Tuesday. And Romney's buy is bolstering the effort of several GOP outside groups, including the pro-Romney super PAC, Restore Our Future, which announced
		 a multi-million advertising blitz in many of these states. So, why are the Romney campaign and Republican outside groups moving into blue territory like Minnesota, Pennsylvania and Michigan?</p>
		</div>




		<?php
		//partial for the footer of the page
		$story=true;
		include("footer.php");
		?>
		
		
		
		<!-- The javascript
    	================================================== -->
    	<!-- Placed at the end of the document so the pages load faster -->
		<script type="text/javascript">
		$("a").click(function (event) {
		    event.preventDefault();
		    window.location = $(this).attr("href");
		});
		</script>




		<!-- This does the js for the buttons just below the header-->
		<!-- WOULD BE COOL IF YOU COULD SWIPE ACROSS TO change THESE too-->
		<script type="text/javascript">
			$('#btnTab a').click(function (e) {
			  	e.preventDefault();
			  $(this).tab('show');
			})

			$('#btnTab a[href="#trending"]').tab('show'); // Select tab by name
			$('#btnTab a:first').tab('show'); // Select first tab
			$('#btnTab a:last').tab('show'); // Select last tab
			$('#btnTab li:eq(2) a').tab('show'); // Select third tab (0-indexed)
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