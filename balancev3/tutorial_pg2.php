<?php
//	include 'Mobile_Detect.php';
//	$detect = new Mobile_Detect();
//	
//	if (!$detect->isMobile()) {
//	    // Any mobile device.
//	    header("Location: mobiletest/iphone.php?url=stanford.edu/~szheng0/cgi-bin/balancev3/mobile.php");
//	}
	
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
	//include("head.php");
	?>
	
	<!--======================================= -->
	<!-- REMOVE THIS AFTER THE OPTIMIZELY!!!!! and put the include above back in  -->
	<head>
		<title>Balance</title>

		<!--Favicon and touch icons-->
		<!-- Deal with these later -->
		<link rel="shortcut icon" href="img/favicon.ico">
		<link rel="apple-touch-icon" href="img/appicon.png" /> 
		<link rel="apple-touch-startup-image" href="img/startup.png"> 

		<!-- Stuff for displaying on mobile-->
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta name="viewport" content="width=device-width, user-scalable=no" />

		<!--Below line, from Rio's examples, ask him if we don't know what it is-->
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
		
		<!-- Our style sheet-->
		<link href="css/style.css" rel="stylesheet">
		<!-- Bootstrap stylesheets-->
		<link href="css/bootstrap.css" rel="stylesheet">
		<!--<link href="css/bootstrap-responsive.css" rel="stylesheet">-->
		<!-- NOTE: there are more specific bootstrap css files we can get and js files too - ask Xan-->		
	</head>
	<!--======================================= -->
	<!--======================================= -->


	<body>
	
		<!-- Note,back button to the header... make invisible on homepage??? -->
		<!-- Simon: removed partial for banned and copied code below for tutorial page -->
		<div class=" navbar-static-top navbar-inverse navbar">
		  <div class="navbar">
		    <div class="navbar-inner">
		    	<div class="container">
		          <button type="button" class="btnMenu collapsed" data-toggle="collapse" data-target=".nav-collapse">
		            <img src="img/icons/menu.png">
		          </button>
		          <span class="navbarText brand">
		          <!-- back button--> 
		          	<a href="#" rel="popover" data-placement="bottom"
data-content="Use the back button to return to previous pages" data-original-title="Back Button" data-trigger="hover"><img src="img/icons/back.png" class="backBtn"></a>
		          	balance</span>
		          <div class="nav-collapse collapse" style="height: 0px; ">
		            <ul class="nav headerList">
		              <li class="">
		              	<!-- Page refresh icon, perhaps only have this present in news pages, e.g. not on profile-->
		                <a href="javascript:document.location.reload();"><i class="icon-repeat icon-white"></i>reload</a>
		              </li>
		              <li class=<?php echo $home;?>>
		                <a href="./index.php"><i class="icon-home icon-white"></i>home</a> <!-- CHANGE THIS BACK TO MOBILE.PHP AFTER A/B/ TEST-->
		              </li>
		              <li class=<?php echo $search;?>>
		                <a href="./search.php"><i class="icon-search icon-white"></i>search</a>
		              </li>
		              <li class=<?php echo $profile;?>>
		                <a href="./profile.php"><i class="icon-user icon-white"></i>profile</a>
		              </li>
		              <li class=<?php echo $settings;?>>
		                <a href="./settings.php"><i class="icon-cog icon-white"></i>settings</a>
		              </li>
		            </ul>
		          </div>
		
				</div>
		    </div>
		  </div>
		</div>
		
		
		<!-- This is after the header -->
        <div class="container firstOffset">
	       <div class="alert"><button type="button" class="close" data-dismiss="alert">x</button><p> <strong> Welcome to Balance! </strong> <br/> This is a replicated version of a story page. Click or hover over anything to see what it does!</p></div>		       
	       <div class='profile-score-container'>
        	Hello <a href="#" rel="popover" data-placement="bottom"
data-content="This link will take you to your profile, where you can view your political score!" data-original-title="Your Profile" data-trigger="hover"> 
        		<?php
        			include "config.php";
        			$user = getCurrUser();
        			echo $user->username; 
        		?> </a>
        		, our data suggests you are:
        		<table class='profileScores'><th>Socially:</th><th>Fiscally:</th>
        		<tr><td>
					<a href="#" rel="popover" data-placement="bottom"
data-content="This shows our calculated social score for you. Our calculations are not perfect but but will improve as you read and like more stories!" data-original-title="Social Score" data-trigger="hover"> <?php echo get_social_score_html($user); ?></a>
				</td><td>
					<a href="#" rel="popover" data-placement="bottom"
data-content="This shows our calculated fiscal score for you. Our calculations are not perfect but but will improve as you read and like more stories!" data-original-title="Fiscal Score" data-trigger="hover"> <?php echo get_fiscal_score_html($user); ?></a>
				</td></tr></table></div>

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
				// source OF STORY, time, social score, fiscal score
				echo "<p class=\"muted small\">".$source.", ".$time
					." "."<a href=\"#\" rel=\"popover\" data-placement=\"right\"
data-content=\"This represents this story's social score. Dull colors (light blue, light red, gray) indicate more moderate views while bright colors (bright blue, bright red) represent stronger views\" data-original-title=\"Story Social Score\" data-trigger=\"hover\">".get_social_score_html($row)." "."</a><a href=\"#\" rel=\"popover\" data-placement=\"right\"
data-content=\"This represents this story's fiscal score. Dull colors (light blue, light red, gray) indicate more moderate views while bright colors (bright blue, bright red) represent stronger views\" data-original-title=\"Story Fiscal Score\" data-trigger=\"hover\">".get_fiscal_score_html($row)." "."</a>";
				// PIC FOR STORY
				echo "<p><img src=\"".$picture."\" alt=\"alternative text here\"/></p>";
				// BODY OF STORY
				$text = wordwrap($text,100);
				$text = explode("\n",$text);
				$text = $text[0]."... <br/><font size=\"-1\">[Normally we'd display the rest of the story but here, it has been shortened for tutorial purposes]</font><br/>";
				
				echo "<p> ".$text."</p>";
				echo "<a href=\"#\" rel=\"popover\" data-placement=\"right\"
data-content=\"Clicking this will take you away from the application and open your browser to view the story in the original website source\" data-original-title=\"Read In Full Link\" data-trigger=\"hover\"><p>Click here to read in full</p></a>";
				echo "<br/>";	
				}
			
			?>
			<div class="alert-success"><button type="button" class="close" data-dismiss="alert">x</button><p> Finished checking out what all of the buttons on the story page do? Click <a href="index.php"> here </a> to start balancing!</p></div><br/>

			
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
					<div id="like">
						<a href="#" rel="popover" data-placement="top"
data-content="This button will let you like a story. When you like a story, it is added to the list of stories that you liked in your Profile page and it will factor into where you fall on the political spectrum" data-original-title="Like Button" data-trigger="hover"><img src="img/logofooter.png" class="hiddenLogo">
						<img src="img/icons/thumbs-up-light.png" />
						</a>
			        </div>
		        </li>
		        <li id="balance2">
		        	<a href="#" rel="popover" data-placement="top"
data-content="This button will give you a random story to read" data-original-title="Random Story Button" data-trigger="hover">
		        	<img src="img/logofooter.png" class="hiddenLogo">
		        	</a>
		        </li>
		        <li class="thumbsDown">
			        <div id="dislike">
				        <a href="#" rel="popover" data-placement="top"
		data-content="This button will let you dislike a story. When you dislike a story, it is added to the list of stories that you disliked in your Profile page and it will factor into where you fall on the political spectrum" data-original-title="Dislike Button" data-trigger="hover"><img src="img/logofooter.png" class="hiddenLogo">
				        <img src="img/icons/thumbs-down-light.png" />
				        </a>
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