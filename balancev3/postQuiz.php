<?php
	//'session_check.php' checks if the session is active and if not 
	// redirects to the splash page
	include("session_check.php");
?>
<!-- SESSION: ABOVE MUST BE PLACED AT VERY BEGINNING OF FILE BEFORE ANYTHING GET'S OUTPUTTED TO BROWSER -->



<!DOCTYPE html>
<html>
	<?php
	//'head.php' includes all header information for all of our pages
	// ie. everything that lives within <head>...info..</head> 
	include("head.php");
	?>

		<body>

		<!-- NOte,back button to the header... make invisible on homepage??? -->
		<?php
		//partial for the top banner of the page
		$home='""';
		$search='""';
		$profile='""';
		$settings='""';
		include("banner.php");
		?>

			<div class ="container firstOffset">
		
				<?php
					$econScore = 0;
					$socScore = 0;
					for ($i=1; $i<=10; $i++)
					  {
					  	$econVal = $_POST["econRadios".(string)$i.""];
					  	$econScore += (int)$econVal;
					  	$socVal = $_POST["socRadios".(string)$i.""];
					  	$socScore += (int)$socVal; 
					  }
					  $normalizedSocScore = ($socScore - 500)/5;
					  $normalizedEconScore = ($econScore - 500)/5;
					  //NOTE: make social scale the y-axis, econ the x-axis

				?>

		<p class="lead">Well done, here are your results:</p>
		<p> Your Economic score is <?php echo $normalizedEconScore; ?></p>
		<p> Your Social score is <?php echo $normalizedSocScore; ?></p>
		<p class="muted">Scores range from -100 to 100. For Economics that means from Left to Right politically
			and for Social matters that means from Libertarian to Authoritarian.</p>


			<a href="#" class="btn btn-mini btn-info" rel="popover" data-placement="right" data-content="<img src='./img/politicalSpec1'><br><img src='./img/politicalSpec2'>" data-original-title="What is the political spectrum?">What?</a>

			</div>



			<div class="container">

				<!-- STUFF FOR THE GRAPH OUTPUT OF SOMEONE'S POLITICAL STANCE-->
				<style>
				.axis text {
				  font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
				  font-size: 10px;
				  color: #333;
				}
				.axis path,
				.axis line {
				  fill: none;
				  stroke: #333;
				  shape-rendering: crispEdges;
				}
				.dot {
				  stroke: red;
				  fill: blue;
				}
				</style>
				<script src="http://d3js.org/d3.v3.min.js"></script>
				<script>

				 //can put in multiple types of data, just get x,y at same data index
				var xdata = [<?php echo $normalizedEconScore; ?>],
					ydata = [<?php echo $normalizedSocScore; ?>];

				var margin = {top: 20, right: 20, bottom: 20, left: 20},
				    width = 300 - margin.left - margin.right,
				    height = 300 - margin.top - margin.bottom;

				var x0 = Math.max(-100, 100);
				var y0 = Math.max(-100, 100);

				var x = d3.scale.linear()
				    .domain([-x0, x0])
				    .range([0, width])
				    .nice();

				var y = d3.scale.linear()
				    .domain([-y0, y0])
				    .range([height, 0])
				    .nice();

				// set the axes
				var xAxis = d3.svg.axis()
				    .scale(x)
				    .orient("bottom");

				var yAxis = d3.svg.axis()
				    .scale(y)
				    .orient("left");


				var chart = d3.select('body')
					.append('svg:svg')
					.attr('width', width + margin.right + margin.left)
					.attr('height', height + margin.top + margin.bottom)
					.attr('class', 'chart')

				var main = chart.append('g')
					.attr('transform', 'translate(' + margin.left + ',' + margin.top + ')')
					.attr('width', width)
					.attr('height', height)
					.attr('class', 'main')  


				//draw the axes
				main.append('g')
					.attr('transform', 'translate(0,' + height/2 + ')')
					.attr('class', 'main axis date')
					.call(xAxis)
				    .append("text") //Puts on the axis label
				      .attr("class", "label")
				      .attr("x", width)
				      .attr("y", -6)
				      .style("text-anchor", "end")
				      .text("Economic Scale");


				main.append('g')
					.attr('transform', 'translate(' + width/2 + ',0)')
					.attr('class', 'main axis date')
					.call(yAxis)
					.append("text")  //Puts on the axis label
				      .attr("class", "label")
				      .attr("transform", "rotate(-90)")
				      .attr("y", 6)
				      .attr("dy", ".71em")
				      .style("text-anchor", "end")
				      .text("Social Scale")
				  

				var g = main.append("svg:g");

				//draw the dots
				g.selectAll("scatter-dots")
				      .data(ydata)
				      .enter().append("svg:circle")
				      	  .attr("class", "dot")
				          .attr("cy", function (d) { return y(d); } )
				          .attr("cx", function (d,i) { return x(xdata[i]); } )
				          .attr("r", 10) //size of the dots
				          .style("opacity", 0.6);

				</script>

			</div>



		<!-- The javascript
    	================================================== -->
    	<!-- Placed at the end of the document so the pages load faster -->





    	<!-- Usual stuff-->
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