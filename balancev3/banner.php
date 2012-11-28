<div class=" navbar-static-top navbar-inverse navbar-fixed-top">
  <div class="navbar">
    <div class="navbar-inner">
    	<div class="container">
          <button type="button" class="btnMenu collapsed" data-toggle="collapse" data-target=".nav-collapse">
            <img src="img/icons/menu.png">
          </button>
          <span class="navbarText brand">
          <!-- back button--> 
          	<a href="javascript:history.go(-1)" id="banner-back" onclick="return false"><img src="img/icons/back.png" class="backBtn"></a>

            <?php 
            $heading = "balance";
            if ($profile != '""') {
              include("config.php");
              $user = getCurrUser();
              $heading = $user->username;
            }
            if ($settings != '""') {
              $heading = "settings";
            }
            echo $heading;
            ?>


          	</span>
          <div class="nav-collapse collapse" style="height: 0px; ">
            <ul class="nav headerList">
              <li class="">
              	<!-- Page refresh icon, perhaps only have this present in news pages, e.g. not on profile-->
                <a href="javascript:document.location.reload();" id="banner-reload" onclick="return false"><i class="icon-repeat icon-white"></i>reload</a>
              </li>
              <li class=<?php echo $home;?>>
                <a href="./index.php" id="banner-home" onclick="return false"><i class="icon-home icon-white"></i>home</a> <!-- CHANGE THIS BACK TO MOBILE.PHP AFTER A/B/ TEST-->
              </li>
              <li class=<?php echo $search;?>>
                <a href="./search.php" id="banner-search" onclick="return false"><i class="icon-search icon-white"></i>search</a>
              </li>
              <li class=<?php echo $profile;?>>
                <a href="./profile.php" id="banner-profile" onclick="return false"><i class="icon-user icon-white"></i>profile</a>
              </li>
              <li class=<?php echo $settings;?>>
                <a href="./settings.php" id="banner-settings" onclick="return false"><i class="icon-cog icon-white"></i>settings</a>
              </li>
            </ul>
          </div>

		</div>
    </div>
  </div>
</div>