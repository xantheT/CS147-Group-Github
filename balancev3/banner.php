<div class=" navbar-static-top navbar-inverse navbar-fixed-top">
  <div class="navbar">
    <div class="navbar-inner">
    	<div class="container">
          <button type="button" class="btnMenu collapsed" data-toggle="collapse" data-target=".nav-collapse">
            <img src="img/icons/menu.png">
          </button>
          <span class="navbarText brand">
          <!-- back button--> 
          	<a href="javascript:history.go(-1)"><img src="img/icons/back.png" class="backBtn"></a>
          	<!--be<img src="img/icons/scales.png" class="banner"/>-->balance</span>
          <!-- Place back button here??? <a class="" href="#"></a>-->
          <div class="nav-collapse collapse" style="height: 0px; ">
            <ul class="nav headerList">
              <li class="">
              	<!-- Page refresh icon, perhaps only have this present in news pages, e.g. not on profile-->
                <a href="javascript:document.location.reload();"><i class="icon-repeat icon-white"></i>reload</a>
              </li>
              <li class=<?php echo $home;?>>
                <a href="./index.php"><i class="icon-home icon-white"></i>home</a>
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