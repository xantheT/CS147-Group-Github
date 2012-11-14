<!-- This div is a hack to give space between the content and the footer :(-->
<div class="container footerBuffer"></div>

<!-- Footer start-->
<div class=" navbar-fixed-bottom ">
  <div class="navbar">
    <div class="navbar-inner">

      <!-- Alter footer options if viewing a story-->
      <?php if ($story ==false) {
        echo '<ul class="nav footer">
        <li><a href=""></a></li>
        <li><a href=""></a></li>
        <li><a href="story.php"><img src="img/logo.png" class="logo"></a></li>
        <li><a href=""></a></li>
        <li><a href=""></a></li>
      </ul>';
      } else {
        echo '<ul class="nav footer">
        <li><a href=""><!--<i class="icon-share icon-white">--></i></a></li>
        <li><a href=""><i class="icon-thumbs-up icon-white"></i></a></li>
        <li><a href="story.php"><img src="img/logo.png" class="logo"></a></li>
        <li><a href=""><i class="icon-thumbs-down icon-white"></i></a></li>
        <li><a href=""><!--<i class="icon-arrow-down icon-white">--></i></a></li>
      </ul>';
      }
      //redo the icon sizes... and rethink what will be the furthest right icon (hides banner & footer maybe???)
      ?>



    </div>
  </div>
</div>