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
		$home='""';
		$search='""';
		$profile='"active"';
		$settings='""';
		include("banner.php");
		?>

			<div class ="container firstOffset">
				 <form action="postQuiz.php" method="post">
				 <fieldset>
    			<legend>Where do you lie on the political spectrum?</legend>
    			<br>
    				<!-- ECON QUESTION-->
					 <h4>Controlling inflation is more important than controlling unemployment.</h4>
					<label class="radio muted">
					  <input type="radio" name="econRadios1" id="econRadios1.1" value="0" checked>
					  Strongly Agree
					</label>
					<label class="radio muted">
					  <input type="radio" name="econRadios1" id="econRadios1.2" value="40">
					  Agree
					</label>
					<label class="radio muted">
					  <input type="radio" name="econRadios1" id="econRadios1.3" value="70">
					  Disagree
					</label>
					<label class="radio muted">
					  <input type="radio" name="econRadios1" id="econRadios1.4" value="100">
					  Strongly disagree
					</label>
					<br>
				
					<!-- SOCIAL QUESTION-->
					 <h4>Abortion, when the woman's life is not threatened, should always be illegal.</h4>
					<label class="radio muted">
					  <input type="radio" name="socRadios1" id="socRadios1.1" value="100" checked>
					  Strongly Agree
					</label>
					<label class="radio muted">
					  <input type="radio" name="socRadios1" id="socRadios1.2" value="70">
					  Agree
					</label>
					<label class="radio muted">
					  <input type="radio" name="socRadios1" id="socRadios1.3" value="40">
					  Disagree
					</label>
					<label class="radio muted">
					  <input type="radio" name="socRadios1" id="socRadios1.4" value="0">
					  Strongly disagree
					</label>
					<br>

					<!-- ECON QUESTION-->
					 <h4>Because corporations cannot be trusted to voluntarily protect the environment, they require regulation.</h4>
					<label class="radio muted">
					  <input type="radio" name="econRadios2" id="optionsRadios2.1" value="0" checked>
					  Strongly Agree
					</label>
					<label class="radio muted">
					  <input type="radio" name="econRadios2" id="optionsRadios2.2" value="40">
					  Agree
					</label>
					<label class="radio muted">
					  <input type="radio" name="econRadios2" id="optionsRadios2.3" value="70">
					  Disagree
					</label>
					<label class="radio muted">
					  <input type="radio" name="econRadios2" id="optionsRadios2.4" value="100">
					  Strongly disagree
					</label>
					<br>


					<!-- SOCIAL QUESTION-->
					 <h4>All authority should be questioned.</h4>
					<label class="radio muted">
					  <input type="radio" name="socRadios2" id="socRadios2.1" value="100" checked>
					  Strongly Agree
					</label>
					<label class="radio muted">
					  <input type="radio" name="socRadios2" id="socRadios2.2" value="70">
					  Agree
					</label>
					<label class="radio muted">
					  <input type="radio" name="socRadios2" id="socRadios2.3" value="40">
					  Disagree
					</label>
					<label class="radio muted">
					  <input type="radio" name="socRadios2" id="socRadios2.4" value="0">
					  Strongly disagree
					</label>
					<br>



					<!-- SOCIAL QUESTION-->
					 <h4>First-generation immigrants can never be fully integrated within their new country.</h4>
					<label class="radio muted">
					  <input type="radio" name="socRadios3" id="socRadios3.1" value="100" checked>
					  Strongly Agree
					</label>
					<label class="radio muted">
					  <input type="radio" name="socRadios3" id="socRadios3.2" value="70">
					  Agree
					</label>
					<label class="radio muted">
					  <input type="radio" name="socRadios3" id="socRadios3.3" value="40">
					  Disagree
					</label>
					<label class="radio muted">
					  <input type="radio" name="socRadios3" id="socRadios3.4" value="0">
					  Strongly disagree
					</label>
					<br>


					<!-- ECON QUESTION-->
					 <h4>"from each according to his ability, to each according to his need" is a fundamentally good idea.</h4>
					<label class="radio muted">
					  <input type="radio" name="econRadios3" id="econRadios3.1" value="0" checked>
					  Strongly Agree
					</label>
					<label class="radio muted">
					  <input type="radio" name="econRadios3" id="econRadios3.2" value="40">
					  Agree
					</label>
					<label class="radio muted">
					  <input type="radio" name="econRadios3" id="econRadios3.3" value="70">
					  Disagree
					</label>
					<label class="radio muted">
					  <input type="radio" name="econRadios3" id="econRadios3.4" value="100">
					  Strongly disagree
					</label>
					<br>



					<!-- SOCIAL QUESTION-->
					 <h4>Taxpayers should not be expected to prop up any theatres or museums that cannot survive on a commercial basis.</h4>
					<label class="radio muted">
					  <input type="radio" name="socRadios4" id="socRadios4.1" value="100" checked>
					  Strongly Agree
					</label>
					<label class="radio muted">
					  <input type="radio" name="socRadios4" id="socRadios4.2" value="70">
					  Agree
					</label>
					<label class="radio muted">
					  <input type="radio" name="socRadios4" id="socRadios4.3" value="40">
					  Disagree
					</label>
					<label class="radio muted">
					  <input type="radio" name="socRadios4" id="socRadios4.4" value="0">
					  Strongly disagree
					</label>
					<br>


					<!-- ECON QUESTION-->
					<h4>It's a sad reflection on our society that something as basic as drinking water is now a bottled, branded consumer product.</h4>
					<label class="radio muted">
					  <input type="radio" name="econRadios4" id="econRadios4.1" value="100" checked>
					  Strongly Agree
					</label>
					<label class="radio muted">
					  <input type="radio" name="econRadios4" id="econRadios4.2" value="70">
					  Agree
					</label>
					<label class="radio muted">
					  <input type="radio" name="econRadios4" id="econRadios4.3" value="40">
					  Disagree
					</label>
					<label class="radio muted">
					  <input type="radio" name="econRadios4" id="econRadios4.4" value="0">
					  Strongly disagree
					</label>
					<br>



					<!-- SOCIAL QUESTION-->
					 <h4>Schools should not make classroom attendance compulsory.</h4>
					<label class="radio muted">
					  <input type="radio" name="socRadios5" id="socRadios5.1" value="100" checked>
					  Strongly Agree
					</label>
					<label class="radio muted">
					  <input type="radio" name="socRadios5" id="socRadios5.2" value="70">
					  Agree
					</label>
					<label class="radio muted">
					  <input type="radio" name="socRadios5" id="socRadios5.3" value="40">
					  Disagree
					</label>
					<label class="radio muted">
					  <input type="radio" name="socRadios5" id="socRadios5.4" value="0">
					  Strongly disagree
					</label>
					<br>



					<!-- SOCIAL QUESTION-->
					 <h4>Good parents sometimes have to spank their children.</h4>
					<label class="radio muted">
					  <input type="radio" name="socRadios6" id="socRadios6.1" value="100" checked>
					  Strongly Agree
					</label>
					<label class="radio muted">
					  <input type="radio" name="socRadios6" id="socRadios6.2" value="70">
					  Agree
					</label>
					<label class="radio muted">
					  <input type="radio" name="socRadios6" id="socRadios6.3" value="40">
					  Disagree
					</label>
					<label class="radio muted">
					  <input type="radio" name="socRadios6" id="socRadios6.4" value="0">
					  Strongly disagree
					</label>
					<br>




					<!-- ECON QUESTION-->
					<h4>Land shouldn't be a commodity to be bought and sold.</h4>
					<label class="radio muted">
					  <input type="radio" name="econRadios5" id="econRadios5.1" value="100" checked>
					  Strongly Agree
					</label>
					<label class="radio muted">
					  <input type="radio" name="econRadios5" id="econRadios5.2" value="70">
					  Agree
					</label>
					<label class="radio muted">
					  <input type="radio" name="econRadios5" id="econRadios5.3" value="40">
					  Disagree
					</label>
					<label class="radio muted">
					  <input type="radio" name="econRadios5" id="econRadios5.4" value="0">
					  Strongly disagree
					</label>
					<br>



					<!-- SOCIAL QUESTION-->
					 <h4>Possessing marijuana for personal use should not be a criminal offence.</h4>
					<label class="radio muted">
					  <input type="radio" name="socRadios7" id="socRadios7.1" value="0" checked>
					  Strongly Agree
					</label>
					<label class="radio muted">
					  <input type="radio" name="socRadios7" id="socRadios7.2" value="40">
					  Agree
					</label>
					<label class="radio muted">
					  <input type="radio" name="socRadios7" id="socRadios7.3" value="70">
					  Disagree
					</label>
					<label class="radio muted">
					  <input type="radio" name="socRadios7" id="socRadios7.4" value="100">
					  Strongly disagree
					</label>
					<br>



					<!-- ECON QUESTION-->
					<h4>It is regrettable that many personal fortunes are made by people who simply manipulate money and contribute nothing to their society.</h4>
					<label class="radio muted">
					  <input type="radio" name="econRadios6" id="econRadios6.1" value="100" checked>
					  Strongly Agree
					</label>
					<label class="radio muted">
					  <input type="radio" name="econRadios6" id="econRadios6.2" value="70">
					  Agree
					</label>
					<label class="radio muted">
					  <input type="radio" name="econRadios6" id="econRadios6.3" value="40">
					  Disagree
					</label>
					<label class="radio muted">
					  <input type="radio" name="econRadios6" id="econRadios6.4" value="0">
					  Strongly disagree
					</label>
					<br>



					<!-- SOCIAL QUESTION-->
					 <h4>People with serious inheritable disabilities should not be allowed to reproduce.</h4>
					<label class="radio muted">
					  <input type="radio" name="socRadios8" id="socRadios8.1" value="100" checked>
					  Strongly Agree
					</label>
					<label class="radio muted">
					  <input type="radio" name="socRadios8" id="socRadios8.2" value="70">
					  Agree
					</label>
					<label class="radio muted">
					  <input type="radio" name="socRadios8" id="socRadios8.3" value="40">
					  Disagree
					</label>
					<label class="radio muted">
					  <input type="radio" name="socRadios8" id="socRadios8.4" value="0">
					  Strongly disagree
					</label>
					<br>



					<!-- ECON QUESTION-->
					<h4>Protectionism is sometimes necessary in trade.</h4>
					<label class="radio muted">
					  <input type="radio" name="econRadios7" id="econRadios7.1" value="100" checked>
					  Strongly Agree
					</label>
					<label class="radio muted">
					  <input type="radio" name="econRadios7" id="econRadios7.2" value="70">
					  Agree
					</label>
					<label class="radio muted">
					  <input type="radio" name="econRadios7" id="econRadios7.3" value="40">
					  Disagree
					</label>
					<label class="radio muted">
					  <input type="radio" name="econRadios7" id="econRadios7.4" value="0">
					  Strongly disagree
					</label>
					<br>


					<!-- ECON QUESTION-->
					<h4>The only social responsibility of a company should be to deliver a profit to its shareholders.</h4>
					<label class="radio muted">
					  <input type="radio" name="econRadios8" id="econRadios8.1" value="100" checked>
					  Strongly Agree
					</label>
					<label class="radio muted">
					  <input type="radio" name="econRadios8" id="econRadios8.2" value="70">
					  Agree
					</label>
					<label class="radio muted">
					  <input type="radio" name="econRadios8" id="econRadios8.3" value="40">
					  Disagree
					</label>
					<label class="radio muted">
					  <input type="radio" name="econRadios8" id="econRadios8.4" value="0">
					  Strongly disagree
					</label>
					<br>




					<!-- SOCIAL QUESTION-->
					 <h4>Those who are able to work, and refuse the opportunity, should not expect society's support.</h4>
					<label class="radio muted">
					  <input type="radio" name="socRadios9" id="socRadios9.1" value="100" checked>
					  Strongly Agree
					</label>
					<label class="radio muted">
					  <input type="radio" name="socRadios9" id="socRadios9.2" value="70">
					  Agree
					</label>
					<label class="radio muted">
					  <input type="radio" name="socRadios9" id="socRadios9.3" value="40">
					  Disagree
					</label>
					<label class="radio muted">
					  <input type="radio" name="socRadios9" id="socRadios9.4" value="0">
					  Strongly disagree
					</label>
					<br>



					<!-- ECON QUESTION-->
					<h4>The rich are too highly taxed.</h4>
					<label class="radio muted">
					  <input type="radio" name="econRadios9" id="econRadios9.1" value="0" checked>
					  Strongly Agree
					</label>
					<label class="radio muted">
					  <input type="radio" name="econRadios9" id="econRadios9.2" value="40">
					  Agree
					</label>
					<label class="radio muted">
					  <input type="radio" name="econRadios9" id="econRadios9.3" value="70">
					  Disagree
					</label>
					<label class="radio muted">
					  <input type="radio" name="econRadios9" id="econRadios9.4" value="100">
					  Strongly disagree
					</label>
					<br>



					<!-- ECON QUESTION-->
					<h4>Those with the ability to pay should have the right to higher standards of medical care .</h4>
					<label class="radio muted">
					  <input type="radio" name="econRadios10" id="econRadios10.1" value="100" checked>
					  Strongly Agree
					</label>
					<label class="radio muted">
					  <input type="radio" name="econRadios10" id="econRadios10.2" value="70">
					  Agree
					</label>
					<label class="radio muted">
					  <input type="radio" name="econRadios10" id="econRadios10.3" value="40">
					  Disagree
					</label>
					<label class="radio muted">
					  <input type="radio" name="econRadios10" id="econRadios10.4" value="0">
					  Strongly disagree
					</label>
					<br>


					<!-- SOCIAL QUESTION-->
					 <h4>No broadcasting institution, however independent its content, should receive public funding.</h4>
					<label class="radio muted">
					  <input type="radio" name="socRadios10" id="socRadios10.1" value="100" checked>
					  Strongly Agree
					</label>
					<label class="radio muted">
					  <input type="radio" name="socRadios10" id="socRadios10.2" value="70">
					  Agree
					</label>
					<label class="radio muted">
					  <input type="radio" name="socRadios10" id="socRadios10.3" value="40">
					  Disagree
					</label>
					<label class="radio muted">
					  <input type="radio" name="socRadios10" id="socRadios10.4" value="0">
					  Strongly disagree
					</label>
					<br>



					<button class="btn btn-info" type="submit">Submit</button>
				</fieldset>
				</form>
				<br>

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