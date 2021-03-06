<?php

    session_start();

include 'restaurants/navigateToCategoryCode.php'


?>

<!DOCTYPE html>

<html>

  <head>
    <title>Foodbubble</title>
    <meta charset="utf-8">
    <link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
    <link rel='shortcut icon' type='image/x-icon' href='images/Bubble.ico' />
  </head>
  
  <body id="top" style = " opacity:0;">
<?php
include 's.php';
 
$conn = OpenCon();
 

CloseCon($conn);
 
?>
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
                   echo '<li><a href="signin.php"><span>sign in</span></a></li>';
                   echo '<li><a href="signup.php"><span>sign up</span></a></li>';
                }
                ?>
            </ul>
          </nav>
        </header>
      </div>
      
      <div id="pageintro" class="hoc clear"> 
        <article>
          <p>Find your next favourite spot</p>
          <h2 class="heading">Find The Best Restaurants in The City</h2>
          <p>Your comfort is our absolute priority</p>
        </article>
      </div>
    </div>

    <!-- Featured Area -->
    <div class="wrapper row3">
      <main class="hoc container clear"> 
        <ul class="nospace clear services">
          <li class="one_half first borderedbox">
            <div class="inspace-30">
              <h6 class="heading">Foodbubble Recommendations</h6>
              <p class="nospace">Food bubble team welcomes you the website!, To ensure your maximum satisfaction, Foodbubble team recommends these restaurants that  guarantees one of a kind experience.</p>
            </div>
          </li>
          <li class="one_quarter"><a href="#">
            <figure><img src="images/restaurants/2.png" alt="Ted's Restaurant">
              <figcaption>Ted's</figcaption>
            </figure>
            </a></li>
          <li class="one_quarter"><a href="#">
            <figure><img src="images/restaurants/MaisonThomas.png" alt="Gilmore & Co. Restaurant">
              <figcaption>Gilmore's & Co.</figcaption>
            </figure>
            </a></li>
          <li class="one_quarter first"><a href="#">
            <figure><img src="images/restaurants/3.png" alt="Daddy's Burger Restaurant">
              <figcaption>Daddy's Burger</figcaption>
            </figure>
            </a></li>
          <li class="one_quarter"><a href="#">
            <figure><img src="images/restaurants/4.png" alt="Marilyn's Lounge">
              <figcaption>Marilyn's Lounge</figcaption>
            </figure>
            </a></li>
          <li class="one_quarter"><a href="#">
            <figure><img src="images/restaurants/5.png" alt="Angie's Restaurant">
              <figcaption>Angie's</figcaption>
            </figure>
            </a></li>
          <li class="one_quarter"><a href="#">
            <figure><img src="images/restaurants/LeftBank.png" alt="Fine Dine Salamon">
              <figcaption>Sachi</figcaption>
            </figure>
            </a></li>
        </ul>
        <div class="clear"></div>
      </main>
    </div>

    <!-- Interlude Area -->
    <div class="wrapper bgded overlay" style="background-image:url('images/backgrounds/interlude_bg.jpg');">
      <article class="hoc container clear center"> 
        <h3 class="heading">We are Foodbubble!</h3>
        <p class="btmspace-50">Our team works hard to bring you a curated list of the best restaurants in the city.</p>
        <footer><a class="btn medium"  href="aboutus.html">About Us</a></footer>
      </article>
    </div>

    <!-- Features Area -->
    <div class="wrapper row3">
      <section class="hoc container clear"> 

        <div class="center btmspace-50">
          <h3 class="heading blue-heading">Why choose Foodbubble </h3>
          <p class="nospace">Make the most of your experince with us</p>
        </div>

        <ul class="nospace group cta">

          <li class="one_third first">
            <article>
              <span><img src="images/icons/features_icon_1.png"></span>
              <h6 class="heading font-x1">All types of Restaurants</h6>
              <p> Here you will find all kinds of restaurants to spend time with your family, friends
              and loved ones.
              </p>
            </article>
          </li>

          <li class="one_third">
            <article>
              <span><img src="images/icons/features_icon_2.png"></span>
              <h6 class="heading font-x1">Fast Reservation</h6>
              <p>With food bubble it will only take a few moments to reserve your favourite restaurant.
              </p>
            </article>
          </li>

          <li class="one_third">
            <article>
              <span><img src="images/icons/features_icon_3.png"></span>
              <h6 class="heading font-x1">Finest Food</h6>
              <p>All restaurants on our website serve high quality food and drinks to enjoy your experince.</p>
            </article>
          </li>
        </ul>

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
        <p>Copyright &copy; 2018 Group 22 &mdash; Foodbubble &mdash; All Rights Reserved</p>
      </div>
    </div>
    <a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>
    
    <!-- JAVASCRIPTS -->
    <script src="layout/scripts/jquery.min.js"></script>
    <script src="layout/scripts/jquery.backtotop.js"></script>
    <script src="layout/scripts/ballKick.js"></script>
    <script src="layout/scripts/pageFadeIn.js"></script>
      
  </body>
</html>