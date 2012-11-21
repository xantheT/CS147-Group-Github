<!-- This div is a hack to give space between the content and the footer :(-->
<div class="container footerBuffer"></div>

<!-- Footer start-->
<div class=" navbar-fixed-bottom ">
  <div class="navbar">
    <div class="navbar-inner">
          <span class="footLogo" id="balance"><img src="img/logofooter.png" class="logo"></span>

      <!-- Alter footer options if viewing a story-->
      <?php if ($story ==false) {
        echo '<ul class="nav footer">
        <li><a href="#"></a></li>
        <li><a href="#"></a></li>
        <li><a href="story.php"><img src="img/logofooter.png" class="hiddenLogo"></a></li>
        <li><a href="#"></a></li>
        <li><a href="#"></a></li>
      </ul>';
      } else {
        echo '<ul class="nav footer">
        <li><a href="#"><!--<i class="icon-share icon-white">--></i></a></li>
        <li class="thumbsUp"><div id="like"><img src="img/icons/thumbs-up-light.png" />
                        <img src="img/icons/thumbs-up-blue.png" style="display:none"/>
        </div>
        </li>
        <li id="balance2"><img src="img/logofooter.png" class="hiddenLogo"></li>
        <li class="thumbsDown">
        <div id="dislike"><img src="img/icons/thumbs-down-light.png" />
                        <img src="img/icons/thumbs-down-red.png" style="display:none"/>
        </div>
        </li>
        <li><a href="#"><!--<i class="icon-arrow-down icon-white">--></i></a></li>
      </ul>';
      }
      //redo the icon sizes... and rethink what will be the furthest right icon (hides banner & footer maybe???)
      ?>



    </div>
  </div>
</div>

<script type="text/javascript">
  $("#like").click(function() {
      $(this).find('img').toggle();
  });

  //redirect if user selects 'dislike'
  $("#dislike").click(function() {
      $(this).find('img').toggle();
      window.location = "./story.php"; //redirects to another story

  });

  $("#balance").click(function() {
    var like = document.getElementById("like");
    if (like.getElementsByTagName("img")[0].style.display == "none") //checks whether the grey thumbs up has been replaced by blue
    {    // if it was then img[0] (the grey one) will have display 'none'
        var url = "./post_like.php?id="
        var id = <?php echo $_GET['id']; ?>;
        window.location = url.concat(id); //redirects to another story
    } else {
      window.location = "./story.php"; //redirects to another story
    };      
  });

  $("#balance2").click(function() {
    var like = document.getElementById("like");
    if (like.getElementsByTagName("img")[0].style.display == "none") //checks whether the grey thumbs up has been replaced by blue
    {    // if it was then img[0] (the grey one) will have display 'none'
        var url = "./post_like.php?id="
        var id = <?php echo $_GET['id']; ?>;
        window.location = url.concat(id); //redirects to another story
    } else {
      window.location = "./story.php"; //redirects to another story
    };
  });
</script>


