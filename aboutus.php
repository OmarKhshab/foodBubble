<?php
include 'restaurants/navigateToCategoryCode.php'
?>

<!DOCTYPE html>


<html>

  <head>
    <title>Foodbubble | About us</title>
    <meta charset="utf-8">
    <link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
    <link rel='shortcut icon' type='image/x-icon' href='images/Bubble.ico' />
  </head>
    <?php
    include 's.php';

    $conn = OpenCon();

    session_start();
    CloseCon($conn);

    ?>
  <body id="top" style = "opacity:0;">
    <!-- Header Area -->
    <div class="bgded overlay" style="background-image:url('images/backgrounds/header_bg.jpg');"> 

      <div class="wrapper">
            <header id="header" class="hoc clear">
          <div id="logo"> 
            <div class="logo-img">
              <img src="images/logo.png" class = "ballKick">
                          <br><br>
            </div>
            <h1><a href="index.php">Foodbubble</a></h1>
          </div>
          <nav id="mainav" class="clear"> 
            <ul class="clear">
              <li class="active"><a href="index.php">Home</a></li>
              <li><a class="drop" href="#">Restaurants</a>
                <ul>
                  <li><a href='index.php?cat=Romantic'>Romantic</a></li>
                  <li><a href='index.php?cat=Outgoing'>Outgoing</a></li>
                  <li><a href='index.php?cat=Family'>Family</a></li>
                  <li><a href='index.php?cat=Exotic'>Exotic</a></li>
                </ul>
              </li>
              <li class="active"><a href="aboutus.php">About & Contact Us</a></li>
                <?php
                if(isset($_SESSION['login_user'])&&!empty($_SESSION['login_user']))
                { 
                  
                  echo '<li><a href="account.php"><span>My account</span></a></li>';
                  echo '<li><a href="signout.php"><span>Log out</span></a></li>';
                }
              elseif(!isset($_SESSION['login_user']))
                {
                   echo '<li><a href="signin.php"><span>sign in</span></a></li>';
                   echo '<li><a href="signup.php"><span>sign up</span></a></li>';
                }
                ?>

            </ul>
          </nav>
        </header>
      </div>
    </div>

    <!-- Features Area -->
    <div class="wrapper row3">
      <section class="hoc container clear"> 
	    <div class="center btmspace-50">
          <h3 class="heading blue-heading">About us</h3>
          <p class="nospace">Get to know Foodbubble</p>
        </div>
		<p class = "zoomHover">
			The team behind foodbubble are a group of friends who enjoyed trying new places. Foodbubble team made the website they desperately wanted. A website that has new restaurants with all of its information from user's rating to the price range.Food bubble team attentively chooses the prime, luxurious, cozy and fresh restaurants that does not only have rich and indulgent food but also harmonious atmosphere that makes the decision of leaving the restaurant almost impossible, so take a look at our website and enjoy the carefully chosen restaurants. 
		</p>
		<div class="center btmspace-50">
			<h3 class="heading blue-heading">Contact us</h3>
			<p class="nospace">Foodbubble is closer than you think</p>
		</div>
		<p class = "zoomHover">
			Your continuous support and feedback will help us improve, so if you face any problem using our website, or if you have an inquiry, or even if you want to suggest changes to the website, contact us on <a href="mailto:foodbubbleteam@gmail.com">Foodbubble Team</a>.  
		</p>
        <div class="clear">
        </div>
      </section>
    </div>


    <!-- Footer Area -->
    <div class="bgded overlay" style="background-image:url('images/backgrounds/footer_bg.jpg');">
      <footer id="footer" class="hoc clear center"> 
        <h3 class="heading uppercase">Foodbubble</h3>
        <ul class="faico clear">
          <li><a class="faicon-facebook" href="#"><i class="fa fa-facebook"></i></a></li>
          <li><a class="faicon-twitter" href="#"><i class="fa fa-twitter"></i></a></li>
          <li><a class="faicon-google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
        </ul>
      </footer>
      <div id="copyright" class="hoc clear center"> 
        <p>Copyright &copy; 2018 &mdash; Foodbubble &mdash; All Rights Reserved</p>
      </div>
    </div>
    <a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>
    
    <!-- JAVASCRIPTS -->
    <script src="layout/scripts/jquery.min.js"></script>
    <script src="layout/scripts/jquery.backtotop.js"></script>
    <script src="layout/scripts/formValidation.js"></script>
    <script src="layout/scripts/textZoomAnim.js"></script>
    <script src="layout/scripts/ballKick.js"></script>
    <script src="layout/scripts/pageFadeIn.js"></script>
    
  </body>
</html>