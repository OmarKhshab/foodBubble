<?php
include 'restaurants/navigateToCategoryCode.php'
?>
<!DOCTYPE html>

<html>

  <head>
    <title>Foodbubble | Sign In</title>
    <meta charset="utf-8">
    <link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
    <link rel='shortcut icon' type='image/x-icon' href='images/Bubble.ico' />
  </head>

  <body id="top" style = " opacity:0;">
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
              <li><a href="aboutus.php">About & Contact Us</a></li>
                <?php
                if(isset($_SESSION['login_user'])&&!empty($_SESSION['login_user']))
                { 
                  
                  echo '<li><a href="account.php"><span>My account</span></a></li>';
                  echo '<li><a href="signout.php"><span>Log out</span></a></li>';
                }
              elseif(!isset($_SESSION['login_user']))
                {
                   echo '<li class="active"><a href="signin.php"><span>sign in</span></a></li>';
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
          <h3 class="heading blue-heading">Sign In</h3>
          <p class="nospace">Sign in to your account to manage your reservations </p>
        </div>

        <form action="signinsession.php" name="signInForm" method="post">
          <div class="one_third first">
            <label for="username">Username <span>*</span></label>
            <input type="text" name="username" placeholder="Enter username" required>
          </div>
          <div class="one_third">
            <label for="password">Password <span>*</span></label>
            <input type="password" name="password" placeholder="Enter password" required>
          </div>
          <div class="one_third">
            <br>
            <input class="btn" id="signInSubmit" type="submit" name="submit" value="Sign In to Account">
          </div>
        </form>

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
    <script src="layout/scripts/ballKick.js"></script>
    <script src="layout/scripts/pageFadeIn.js"></script>  
  </body>
</html>