<!DOCTYPE html>
<html>

<!-- REGISTER.PHP -->

	<?php
	//'head.php' includes all header information for all of our pages
	// ie. everything that lives within <head>...info..</head> 
	include("head.php");
	?>

	<body>
	
		

		<!-- PLACE BODY INSIDE HERE - this is within the header and the footer-->
		<div class="container">
						<h1><img src="img/logo.png" class="logo splash"> Balance</h1>

			<div data-role="content">
		
		<!-- Random Submit Action Specified for this Form But Not Created Yet. Ideally want to post to database -->
				<form action="post_register.php" method="post" id="register"><fieldset>
					<legend>Register</legend>
					
					<div class="control-group">
				     	<label class="control-label" for="username">Username:</label>
				     	<div class="controls">
				     	<input type="text" name="username" id="username" value=""  />
						</div>
					</div>
					
					<div class="control-group">
					     <label class="control-label" for="password1">Password:</label>
					     <div class="controls">
					     <input type="password" name="password1" id="password1" value=""  />
					     </div>
					</div>

				     <!-- Consider asking for PASSWORD RETYRPE!!!-->
				     <div class="control-group">
					     <label class="control-label" for="password2">Retype password:</label>
					     <div class="controls">
					     <input type="password" name="password2" id="password2" value=""  />
						 </div>
					</div>
					
					<!-- MAY NOT NEED THIS INFO FROM THEM... TOO MUCH???
				     <label for="foo">First Name:</label>
				     <input type="text" name="name" id="foo" value=""  />
				     <label for="foo">Last Name:</label>
				     <input type="text" name="name" id="foo" value=""  />
				      -->
					<div class="control-group">
				     	<label class="control-label" for="email">Email Address:</label>
				     	<div class="controls">
				     	<input type="text" name="email" id="email" value=""  />
						</div>
					</div>
				
				    <legend>I Identify As Socially:</legend>
				         	
				    <label class="radio" for="socPrefC">Conservative 
				    	<input type="radio" name="socPref" id="socPrefC" value="c" />
				    </label>
				    <label class="radio" for="socPrefL">Liberal
				    	<input type="radio" name="socPref" id="socPrefL" value="l" />
				    </label>

				    
				    <legend>I Identify As Fiscally:</legend>
				    <label class="radio" for="fiscPrefC">Conservative
				    	<input type="radio" name="fiscPref" id="fiscPrefC" value="c" />
				    </label>
				    <label class="radio" type="radio" for="fiscPrefL">Liberal
				    	<input type="radio" name="fiscPref" id="fiscPrefL" value="l" />
				    </label>
				    <br>
				   	<button class="btn btn-info" type="submit" data-theme="a">Register</button>
				</fieldset>
				</form>

				
			</div>
		
		
		
		</div>

		
		<!-- JAVASCRIPT -->
		<script type="text/javascript">
		$("a").click(function (event) {
		    event.preventDefault();
		    window.location = $(this).attr("href");
		});
		</script>

		<!-- JAVASCRIPT -->
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
		
		


		<!-- FORM VALIDATION -->
		<!-- CANNOT FOR THE LIFE OF ME WORK OUT WHY THIS DOESN'T WORK!!! - can't find validate fn
			Found and copied example here: http://www.9lessons.info/2012/04/bootstrap-registration-form-tutorial.html-->
		<!-- Include Bootstrap Asserts JavaScript Files. -->
		<script type="text/javascript" src="js/jquery.validate.js"></script>
		<script type="text/javascript">
		$(document).ready(function(){

			// Validation
			$("#register").validate({
				rules:{
				username:"required",
				email:{required:true,email: true},
				password1:{required:true},
				password2:{required:true,equalTo: "#password1"},
				socPref:"required",
				fiscPref:"required",
				},

				messages:{
					username:"Please specify a username",
				email:{
					//required:"Enter your email address",
					email:"Enter a valid email address"},
				password1:{
					//required:"Enter your password",
				},
				password2:{
					//required:"Enter confirm password",
					equalTo:"Both passwords must match"},		
				},
				socPref:{
					socPref:"Please select one"
				},
				fiscPref:{
					socPref:"Please select one"
				},

				errorClass: "help-inline",
				errorElement: "span",
				highlight:function(element, errorClass, validClass)
				{
				$(element).parents('.control-group').addClass('error');
				},
				unhighlight: function(element, errorClass, validClass)
				{
				$(element).parents('.control-group').removeClass('error');
				//$(element).parents('.control-group').addClass('success');
				}
			});
		});
		</script>




	</body>
</html>