                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                . Click on any of the links or buttons to see what they do! </p>
		       <?php
				include("config.php");
				//Get the ID from the URL argument after .../story.php?id=x
				$id = $_GET["id"];
				
				if ($id == '') {
					$query = "SELECT * FROM balance_stories";
					$all_stories = mysql_query($query);
					$num_stories = mysql_num_rows($all_stories);
					$random_index = rand(1, $num_stories);
					$id = (string)$random_index;
					$_GET["id"] = $id;
				}
				//check for story against db
				$query = sprintf("SELECT * FROM balance_stories WHERE id='%s'", mysql_real_escape_string($id));
				// Perform Query
				$result = mysql_query($query);
				// This tells you how many rows were returned
				$num_rows = mysql_num_rows($result);
				if ($num_rows == 0) {  // if we did not find a single user
					//SET ERROR MESSAGE HERE
					//header("Location: ./login.php?error");
					echo "Error! \nNo stories were found from the database with for your query: ".$query."!\n This is not your search query's fault but a team of acrobatic pokemon have been dispatched to fix our database. Pika!";
					// This below exit code makes the back button and everything nonfunctional because it doesn't execute anything after this point and the javascript is at the bottom :( :(
					//exit();
				} else {
					$row = mysql_fetch_object($result);
				
				$source = $row->source;
				$time = $row->time;
				$social_scale = $row->social_scale;
				$fiscal_scale = $row->fiscal_scale;
				$title = $row->title;
				$picture = "img/stories/".$row->picture;
				$text = $row->text;
				$url = $row->url;
	
	
				//logic to get correct 'ago' time format
				$time = time_ago($time);
				
				// HEADLINE OF STORY
				echo "<h4>".$title."</h4>";
				// source OF STORY
				echo "<p class=\"muted small\">".$source.", ".$time
					." ".get_social_score_html($row)." ".get_fiscal_score_html($row);
				// PIC FOR STORY
				echo "<p><img src=\"".$picture."\" alt=\"alternative text here\"/></p>";
				// BODY OF STORY
				$text = wordwrap($text,150);
				$text = explode("\n",$text);
				$text = $text[0]."…*<br/><br/>";
				
				echo "<p> ".$text."</p>";
				echo "<a href=\"#\" rel=\"popover\" data-placement=\"right\"
data-content=\"Clicking this will take you away from the application and open your browser to view the story in the original website source\" data-original-title=\"Read In Full Link\"><p>Click here to read in full</p></a>";
				echo "<br />";	
				echo "*Normally the rest of the story text would appear here but here, the story text has been shortened for tutorial purposes <br/><br/>";
				}
			
			?>
			<p> Finished checking out what all of the buttons on the story page do? Click <a href="index.php"> here </a> to start balancing! <br/><br/></p>
        </div>

        
		<!-- This is the footer for the story part of the tutorial -->
		
		<!-- This div is a hack to give space between the content and the footer :(-->
		<div class="container footerBuffer"></div>
		
		<!-- Footer start-->
		<div class=" navbar-fixed-bottom ">
		  <div class="navbar">
		    <div class="navbar-inner">
		          <span class="footLogo" id="balance"><img src="img/logofooter.png" class="logo"></span>
		
		      <!-- Alter footer options if viewing a story-->
		      <?php
		        // This is the footer for story
		        echo '<ul class="nav footer">
		        <li><a href="#"><!--<i class="icon-share icon-white">--></i></a></li>
		        <li class="thumbsUp">
		        	<a href="#" rel="popover" data-placement="top"
data-content="This button will let you like a story. When you like a story, it is added to the list of stories that you liked in your Profile page and it will factor into where you fall on the political spectrum" data-original-title="Like Button"><img src="img/logofooter.png" class="hiddenLogo"></a>
					<div id="like">
						<img src="img/icons/thumbs-up-light.png" />
		                <img src="img/icons/thumbs-up-blue.png" style="display:none"/>
			        </div>
			        </a>
		        </li>
		        <li id="balance2"><img src="img/logofooter.png" class="hiddenLogo"></li>
		        <li class="thumbsDown">
		        <div id="dislike"><img src="img/icons/thumbs-down-light.png" />
		                        <img src="img/icons/thumbs-down-red.png" style="display:none"/>
		        </div>
		        </li>
		        <li><a href="#"><!--<i class="icon-arrow-down icon-white">--></i></a></li>
		      </ul>';
		      ?>
		
		    </div>
		  </div>
		</div>
				
		
		
		
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