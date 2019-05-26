<?php


    session_start();

    $_SESSION["restaurantID"] = "";
    function restID($rest)
    {
        $_SESSION["restaurantID"] = $rest;
        header('Location: /ip/restaurants/restaurant.php'); 
        exit;
    }

   if (isset($_GET['rest']))  {
        restID($_GET['rest']);
      }

?>

<!DOCTYPE html>

<html>

  <head>
    <title>Foodbubble | <?php echo $_SESSION["category"]; ?> Restaurants</title>
    <meta charset="utf-8">
    <link href="../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
    <link rel='shortcut icon' type='image/x-icon' href='../images/Bubble.ico' />
  </head>
     <?php
        include '../s.php';
        $conn = OpenCon();
        $sql= "SELECT * FROM restaurants WHERE Category='". $_SESSION["category"]."'";
        $result=mysqli_query($conn,$sql);

        CloseCon($conn);
    ?>
  <body id="top" style = " opacity:0;">
    <!-- Header Area -->
    <div class="bgded overlay" style="background-image:url('../images/backgrounds/header_bg.jpg');"> 

      <div class="wrapper">
        <header id="header" class="hoc clear">
          <div id="logo">
            <div class="logo-img">
              <img src="../images/logo.png" class = "ballKick">
                          <br><br>
            </div>
            <h1><a href="../index.php">Foodbubble</a></h1>
          </div>
          <nav id="mainav" class="clear"> 
            <ul class="clear">
              <li><a href="../index.php">Home</a></li>
              <li class="active"><a class="drop" href="#">Restaurants</a>
                <ul>
                  <li><a href='../index.php?cat=Romantic'>Romantic</a></li>
                  <li><a href='../index.php?cat=Outgoing'>Outgoing</a></li>
                  <li><a href='../index.php?cat=Family'>Family</a></li>
                  <li><a href='../index.php?cat=Exotic'>Exotic</a></li>
                </ul>
              </li>
              <li><a href="../aboutus.php">About & Contact Us</a></li>
                <?php
                if(isset($_SESSION['login_user'])&&!empty($_SESSION['login_user']))
                { 
                  
                  echo '<li><a href="../account.php"><span>My account</span></a></li>';
                  echo '<li><a href="../signout.php"><span>Log out</span></a></li>';
                }
              elseif(!isset($_SESSION['login_user']))
                {
                   echo '<li><a href="../signin.php"><span>sign in</span></a></li>';
                   echo '<li><a href="../signup.php"><span>sign up</span></a></li>';
                }
                ?>
            </ul>
          </nav>
        </header>
      </div>
    </div>

    <div class="wrapper row3">
      <main class="hoc container clear">
            <div class="center btmspace-50 floating">
                <h2 class="heading blue-heading"><?php echo $_SESSION["category"]; ?> Restaurants</h2>
            </div>
            <?php 
            while($row=mysqli_fetch_array($result)){
                $Name = $row['Name'];
                $Address = $row['Address'];
                $Category = $row['Category'];
                $Description = $row['Description'];
                $ID = $row['ID'];
                
          echo  "<div class='content'>
             
                    <div class='group btmspace-50 floating'>
                        <div class='one_half first restAnim'>
                            <img style = 'height: 230px; padding-left: 150px;' src='../images/restaurants/".$row['Image']."'>
                        </div>
                        <div class='one_half inspace-30 borderedbox'>
                            <h3><a href='category.php?rest=$ID'>$Name</a></h3>
                            <p><span class='restaurant-list-icon'><i class='fa fa-map-marker'></i></span>$Address</p>
                            <p><span class='restaurant-list-icon'><i class='fa fa-heart'></i></span>$Category</p>
                            <p >$Description </p>
                        </div>
                    </div>
                </div>";
            }
            ?>
        <div class="clear"></div>
      </main>
    </div>

    <!-- Footer Area -->
    <div class="bgded overlay" style="background-image:url('../images/backgrounds/footer_bg.jpg');">
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
    <script src="../layout/scripts/jquery.min.js"></script>
    <script src="../layout/scripts/jquery.backtotop.js"></script>
    <script src="../layout/scripts/ballKick.js"></script>
    <script src="../layout/scripts/floating.js"></script>
    <script src="../layout/scripts/pageFadeIn.js"></script>
    
  </body>
</html>