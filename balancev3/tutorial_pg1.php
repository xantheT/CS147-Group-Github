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
data-content="Use the back button to return to previous pages" data-original-title="Back Button"><img src="img/icons/back.png" class="backBtn" data-trigger="hover"></a>
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


        <div class="container firstOffset">
	      <div class="alert"><button type="button" class="close" data-dismiss="alert">x</button><p> <strong> Welcome to Balance! </strong> <br/> This is a replicated version of our homepage. Click or hover over anything to see what it does!</p></div>
	        	        <div class="btn-group menu" data-toggle="buttons-radio" id="btnTab">
	  			<a href="#" rel="popover" data-placement="bottom"
data-content="The Trending button show you any recent popular stories regardless of its political leanings" data-original-title="Trending Stories" class="btn" data-trigger="hover">Trending</a>
	  			<a href="#" rel="popover" data-placement="bottom"
data-content="This button shows you the stories that are nearest to where you lie on the political spectrum according to our calculations. Our calculations are not perfect but will improve as you read and like more stories!" data-original-title="Stories With Similar Views" class="btn" data-trigger="hover">For you</a>
	 			<a href="#" rel="popover" data-placement="bottom"
data-content="This button shows you the stories that disagree with either your social or political views according to where our calculations indicate you lie on the political spectrum. Our calculations are not perfect but but will improve as you read and like more stories!" data-original-title="Stories With Different Views" class="btn" data-trigger="hover">Challenge me</a>
			</div>
		</div>

        <div class="container">
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
        	<div id="myTabContent" class="tab-content">
              <div class="tab-pane fade active in" id="trending">
              	
                <?php
				//--------------------------------
				//--Logic to get 'top' stories ---
				//--------------------------------
				// Right now, we just choose a random selection of 5 stories...
				
				  include("config.php");
				  $query = sprintf("SELECT * FROM balance_stories ORDER BY RAND() LIMIT 3");
				  $result = mysql_query($query);
				  $outputs = 0;
				  while ($row = mysql_fetch_assoc($result)) { //loops through results and output list
				    $outputs += 1;
				    if ($outputs >1) {
				    	$date = time_ago($row["time"]); //this calls fn to sanitize the timestamp to 'ago' format
				        //compile html output for the story in its list format
				        $html_output = "";
				        $html_output.= "<ul class=\"nav nav-tabs nav-stacked story\">";
				        $html_output.= "<li>";
				        $html_output.= "<div><a href=\"#\" rel=\"popover\" data-placement=\"right\" data-content=\"Clicking a story will take you to the page to read the story!\" data-original-title=\"Story\" data-trigger=\"hover\">";
				        $html_output.= "<img src=\"img/stories/".$row["picture"]."\" class=\"subStory\">";
				        $html_output.= $row["title"];
				        $html_output.= "<br/>";
				        $html_output.= "<p class=\"muted small\">".$row["source"]." - ".$date."<br />";
				        $html_output.= get_social_score_html_ARRAY($row)." ";
				        $html_output.= get_fiscal_score_html_ARRAY($row)."  ";
				        $html_output.= "<i class=\"icon-chevron-right\"></i>";
				        $html_output.= "</p>";
				        $html_output.= "</a></div>";
				        $html_output.= "</li>";
				        $html_output.= "</ul>";
				        echo $html_output;
				    } else {
				    	$date = time_ago($row["time"]); //this calls fn to sanitize the timestamp to 'ago' format

				        //compile html output for the main story brief format
				        $html_output = "";
				        $html_output .= "<div class=\"mainStory\"><div class=\"mainStory-inner story\">";
				        $html_output .= "<a href=\"#\" rel=\"popover\" data-placement=\"right\" data-content=\"Clicking a story will take you to the page to read the story!\" data-original-title=\"Story\" data-trigger=\"hover\">";
				        $html_output .= "<div class=\"item\">";
				        $html_output .= "<img src=\"img/stories/".$row["picture"]."\">";
				        $html_output .= "<div class=\"mainStory-caption\">";
				        $html_output .= "<p>".$row["title"]."</p>";
				        $html_output.= "<span class=\"muted small\">".$row["source"]." - ".$date." ago <br />";
				        $html_output.= get_social_score_html_ARRAY($row)." ";
				        $html_output.= get_fiscal_score_html_ARRAY($row)."  ";
				        $html_output.= "<i class=\"icon-chevron-right icon-white\"></i>";
				        $html_output.= "</span></div></div></a></div></div>";
				
				   		echo $html_output;
				    }
				  }
				
				?>


              </div>
              <div class="tab-pane fade" id="you">
              	<?php
				//partial for the trending news results
				include("recommended.php");
				?>
              </div>
              <div class="tab-pane fade" id="challenge">
              	<?php
				//partial for the trending news results
				include("challengeMe.php");
				?>
              </div>
            </div>
            <div class="alert-success"><button type="button" class="close" data-dismiss="alert">x</button><p> Finished checking out the buttons on the home page? Click <a href="tutorial_pg2.php"> here </a> to learn about our story page!</p></div>


        </div>

        
		<!-- This is the footer for the homepage part of the tutorial -->
		
		<!-- This div is a hack to give space between the content and the footer :(-->
		<div class="container footerBuffer"></div>
		
		<!-- Footer start-->
		<div class=" navbar-fixed-bottom ">
		  <div class="navbar">
		    <div class="navbar-inner">
		          <span class="footLogo" id="balance"><img src="img/logofooter.png" class="logo"></span>
		
		      <!-- Alter footer options if viewing a story-->
		      <?php
		        echo '<ul class="nav footer">
		        <li><a href="#"></a></li>
		        <li><a href="#"></a></li>
		        <li><a href="#" rel="popover" data-placement="top"
data-content="This button will give you a random story to read" data-original-title="Random Story Button" data-trigger="hover"><img src="img/logofooter.png" class="hiddenLogo"></a></li>
		        <li><a href="#"></a></li>
		        <li><a href="#"></a></li>
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