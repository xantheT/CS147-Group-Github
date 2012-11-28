<?php
	//'session_check.php' checks if the session is active and if not 
	// redirects to the splash page
	include("session_check.php");
?>
<!-- SESSION: ABOVE MUST BE PLACED AT VERY BEGINNING OF FILE BEFORE ANYTHING GET'S OUTPUTTED TO BROWSER -->


<!DOCTYPE html>
<html>
	<!-- PROFILE.PHP --></html>

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
		$profile='"active"';
		$settings='""';
		include("banner.php");
		?>

		<!-- PLACE BODY INSIDE HERE - this is within the header and the footer-->
		<div class="container firstOffset">

			<?php 
				if (isset ($_GET['post_quiz']))
				{
				   echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">x</button>Thanks for taking the quiz! Take a look at your results below</div>';
				}
			
			//get the user object from the db
			include("config.php");
			$user = getCurrUser(); //get user - helper fn from 'helper_fns.php'
		
				//--------------------------------
				//-- BELOW IS FOR THE USER'S SCORE! --
				//--------------------------------

			?>

			<?php echo displayUserScore($user)?>

			<!-- FOR THE GRAPH!!!! This get's modified on the fly by jscript-->
			<div id="graph"></div>
			<br />
			<p>Sharpen your score:
			<a href="quiz.php" class="btn btn btn-info">Take the quiz!</a></p>
			<a href="#" class="btn" rel="popover" data-placement="bottom" 
				data-content="
				<p class='muted small'>Scores range from Liberal to Conservative on both Fiscal and Social Scales: <br/>
				<strong>Fiscally Liberal</strong>: You support government-funded programs and believe that the government has a responsibility to evenly distribute wealth. <br/>
				<strong>Fiscally Conservative</strong>: You would believe in less government involvement, free market dynamics and lassaiz-faire. <br/>
				<strong>Socially Liberal</strong>: You tend to take the liberal side on social issues, such as pro-choice, gay rights, affirmative. <br/>
				<strong>Socially Conservative</strong>: You tend to take the conservative side on social issues such as pro-life, gun ownership, and school prayer.
				</p>" 
				data-original-title="What is the political spectrum?">What is the political spectrum?
			</a>
			<br /><br />
			<p class="lead">Recommended reads</p>
			<?php 
				include("config.php");

				$user = getCurrUser();
				$storiesString = $user->stories_read;  //get user's stories
				$storiesArr = explode(',', $storiesString); //put all read stories into array
				
				//--------------------------------
				// --- RECOMMENDED READS PART  ---
				//--------------------------------
				//selects the recomended only!! - query targets only stories within some threshold proxitmity to the users preferences
				//NOTE: this logic is very similar to what's used in the home page 'for you' section. Please mirror changes in both places
				$sql_query = sprintf("SELECT * FROM balance_stories 
										WHERE abs(fiscal_scale - %d)<30 AND abs(social_scale - %d)<30
										ORDER BY RAND() LIMIT 5",
					mysql_real_escape_string($user->fiscal_scale),
					mysql_real_escape_string($user->social_scale)
					);
				$result = mysql_query($sql_query);
				$outputStories= 0;
				while ($row = mysql_fetch_assoc($result)) { //loops through results and output list
					if (!(in_array($row['id'], $storiesArr))) { 
					//the if above makes sure we don't recommend something they've already read!
						echo output_story_brief($row); //this sneaky little function lives in 'helper_fns.php'
									// it takes in a row object from the stories db
									// and outputs the html for the story in list format 
						$outputStories += 1;
					}
				}
				if ($outputStories == 0) { //we have nothing to recommend or they have read all recommendations
					echo "<p class='muted'>You're up to date on all recommended reads. 
						Why don't you try something new? Start balancing by clicking <img src='img/logo.png' class='minilogo'> below.</p>";
				}

				//--------------------------------
				// --- RECENTLY READ PART  ---
				//--------------------------------
				echo "<p class='lead'>Recently read</p>";
				$storiesList = substr($storiesString, 0, -1); //get rid of comma at end
				$storiesList = "( ".$storiesList." )";
				if ($storiesString =="") {  //this would be true if the user is new (no stories read yet)
					echo "<p class='muted'>You haven't read anything yet. Get started by clicking <img src='img/logo.png' class='minilogo'> below.</p>";
				}
				else { //has read some stories
					$displayed = array();
					for ($i=0; $i < 4; $i++) { 
						$subquery = sprintf("SELECT * FROM balance_stories WHERE id = %s",
        					mysql_real_escape_string($storiesArr[$i])); //constructs query	
						$subResult = mysql_query($subquery); //finds the result from db for this story
        				if (($subResult != false) && (array_search($storiesArr[$i], $displayed)===false)) {	 
        					//ensures $i gives something and we haven;t already printed it		
							$singleResult = mysql_fetch_assoc($subResult); 
							echo output_story_brief($singleResult); //output it!
							array_push($displayed, $storiesArr[$i]);
						}	
					}				
				}
			?>
			
			<br><br>
		</div>



	<!-- Footer -->
		<?php
		//partial for the footer of the page
		$story=false;
		include("footer.php");
		?>



<!-- STUFF FOR THE GRAPH OUTPUT OF SOMEONE'S POLITICAL STANCE-->
				<script src="http://d3js.org/d3.v3.min.js"></script>
				<script>
				 //can put in multiple types of data, just get x,y at same data index
				var xdata = [<?php echo $user->fiscal_scale; ?>], //User data inout from db
					ydata = [<?php echo $user->social_scale; ?>],
					name = ["you"];
					dataset = [[41,34, "Obama"],[78, 91, "Reagan"], [13, 87, "Fidel Castro"], [7,12, "Ghandi"], [81,36,"Thatcher"]];
					//toggle data sets - countries, publications, US regions, celebs???


				/*TO DRAG YOUR STUFF*/
				//http://jsfiddle.net/ZrCQE/2/
				var dragCircle = d3.behavior.drag()
			    .on('dragstart', function() {
			        d3.event.sourceEvent.stopPropagation();
			        console.log('Start Dragging Circle');
			    })
			    .on('drag', function(d, i) {
			        d.cx += d3.event.dx;
			        d.cy += d3.event.dy;
			        d3.select(this).attr("cx", d.cx).attr("cy", d.cy)
			    });


				var margin = {top: 25, right: 5, bottom: 25, left: 20},
				    width = 270 - margin.left - margin.right,
				    height = 270 - margin.top - margin.bottom;

				var x0 = Math.max(0, 100);
				var y0 = Math.max(0, 100);

				var x = d3.scale.linear()
				    .domain([0, x0])
				    .range([0, width])
				    .nice();

				var y = d3.scale.linear()
				    .domain([0, y0])
				    .range([height, 0])
				    .nice();

				// set the axes
				var xAxis = d3.svg.axis()
				    .scale(x)
				    .orient("bottom")
				    //.tickValues([]);
				    .tickValues([]);

				var yAxis = d3.svg.axis()
				    .scale(y)
				    //.tickValues([])
				    .tickValues([])
				    .orient("left");

				var chart = d3.select(document.getElementById("graph"))
					.append('svg:svg')
					.attr('width', width + margin.right + margin.left)
					.attr('height', height + margin.top + margin.bottom)
					.attr('class', 'chart');

				var main = chart.append('g')
					.attr('transform', 'translate(' + margin.left + ',' + margin.top + ')')
					.attr('width', width)
					.attr('height', height)
					.attr('class', 'main')  



				//=====  draw the axes  ====
				main.append('g')
					.attr('transform', 'translate(0,' + height/2 + ')')
					.attr('class', 'main axis')
					.call(xAxis)
				    /*.append("text") //Puts on the axis label
				      .attr("class", "label")
				      .attr("x", width)
				      .attr("y", -6)
				      .style("text-anchor", "end")
				      .text("Fiscal Scale")*/;


				main.append('g')
					.attr('transform', 'translate(' + width/2 + ',0)')
					.attr('class', 'main axis')
					.call(yAxis)
					/*.append("text")  //Puts on the axis label
				      .attr("class", "label")
				      .attr("transform", "rotate(-90)")
				      .attr("y", 6)
				      .attr("dy", ".71em")
				      .style("text-anchor", "end")
				      .text("Social Scale")*/;

				d3.selection.prototype.moveToFront = function() { 
				  return this.each(function() { 
				    this.parentNode.appendChild(this); 
				  }); 
				};

				
				// ======  add YOUR DOT!  =======
				main.append("svg:circle")
				    .attr("class", "dot")
				    .attr("cy", function (d,i) { return y(ydata[i]); } ) 
				    .attr("cx", function (d,i) { return x(xdata[i]); } ) 
				    .attr("r", 10) //size of the dot//another axis label 
				    .on("click", function() {
      						var sel = d3.select(this);
     						 sel.moveToFront();
    				})
    				//.call(dragCircle);  
				   
				 
				main.append("text")
				   .text("you") 
				   .attr("y", function (d,i) { return y(ydata[i]+ 3.5); } )
				   .attr("x", function (d,i) { return x(xdata[i]+ 3.5); } )
				   .attr("font-size", "11px")
				   .attr("fill", "gray");

				//==== end of your dot stuff ====


				//=======draw the background colors==========
				var g = main.append("svg:g");
				g.selectAll("scatter-dots")
				      .data(ydata)
				      .enter().append("svg:circle")
				      	  .attr("class", "backDot")
				          .attr("cy", function (d,i) { return y(50); } )
				          .attr("cx", function (d,i) { return x(50); } )
				          .attr("r", 40); //size of the dots
				g.selectAll("scatter-dots")
				      .data(ydata)
				      .enter().append("svg:circle")
				      	  .attr("class", "backDot")
				          .attr("cy", function (d,i) { return y(50); } )
				          .attr("cx", function (d,i) { return x(50); } )
				          .attr("r", 80); 
				g.selectAll("scatter-dots")
				      .data(ydata)
				      .enter().append("svg:circle")
				      	  .attr("class", "backDot")
				          .attr("cy", function (d,i) { return y(50); } )
				          .attr("cx", function (d,i) { return x(50); } )
				          .attr("r", 120); 
				g.selectAll("scatter-dots")
				      .data(ydata)
				      .enter().append("svg:circle")
				      	  .attr("class", "backDot")
				          .attr("cy", function (d,i) { return y(50); } )
				          .attr("cx", function (d,i) { return x(50); } )
				          .attr("r", 160); 
				//======= end background circles ==========



				//============ Comparison peeps ===========
				//Add the comparison dots for other peeps
				var gNew = main.append("svg:g");
				gNew.selectAll("circle")
					   .data(dataset)
					   .enter()
					   .append("circle")
				       .attr("class", "dotOther")
				       .attr("cy", function (d,i) { return y(dataset[i][1]); } )
				       .attr("cx", function (d,i) { return x(dataset[i][0]); } )
				       .attr("r", 6) //size of the dots
				       .on("click", function() {
      						var sel = d3.select(this);
     						 sel.moveToFront();
    					});



				
				//labels for all data points
				gNew.selectAll("text")
				   .data(dataset)
				   .enter()
				   .append("text")
				   .text(function (d,i) { return dataset[i][2]}) //The label
				   .attr("y", function (d,i) { return y(dataset[i][1] + 3); } )
				   .attr("x", function (d,i) { return x(dataset[i][0]+ 3); } )
				   .attr("font-size", "11px")
				   .attr("fill", "gray");


				// ============  AXES LABELS  ================
				//another axis label   
				main.append('g')
				   .append("text")
				   .text("Fiscal Liberal") 
				   .attr("y", function (d) { return y(53); } )
				   .attr("x", function (d) { return x(-5); } )
				   .attr("class", "label");

				//another axis label   
				main.append('g')
				   .append("text")
				   .text("Fiscal Conservative") 
				   //.attr("transform", "rotate(-90)")
				   .attr("y", function (d) { return y(53); } )
				   .attr("x", function (d) { return x(56); } )
				   .attr("class", "label")
				   
				   ;

				//another axis label   
				main.append('g')
				   .append("text")
				   .text("Social Liberal") 
				   .attr("y", function (d) { return y(-10); } )
				   .attr("x", function (d) { return x(34); } )
				   .attr("class", "label");

				//another axis label   
				main.append('g')
				   .append("text")
				   .text("Social Conservative") 
				   .attr("y", function (d) { return y(105); } )
				   .attr("x", function (d) { return x(28); } )
				   .attr("class", "label");

				//another axis label - MODERATE  
				/*main.append('g')
				   .append("text")
				   .text("Moderate") 
				   .attr("y", function (d) { return y(43); } )
				   .attr("x", function (d) { return x(40); } )
				   .attr("class", "label");
				   */


				</script>
<!-- End of graph javascript-->

		
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