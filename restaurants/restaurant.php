<?php
   session_start();
    include '../s.php';
    $conn = OpenCon();

    $query="SELECT * FROM restaurants WHERE ID='". $_SESSION["restaurantID"]."'";
    $result=mysqli_query($conn,$query);
    $row=mysqli_fetch_array($result); 

    CloseCon($conn);



?>
<!DOCTYPE html>

<html>

  <head>
    <title>Foodbubble | Gilmore & Co.</title>
    <meta charset="utf-8">
    <link href="../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
    <link rel='shortcut icon' type='image/x-icon' href='../images/Bubble.ico' />
  </head>

  <body id="top"style = " opacity:0;">
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

        <div class="center btmspace-50">
          <h2 class="heading blue-heading" ><?php echo $row['Name']; ?></h2>
        </div>

        <div class="content">

            
            

            
          <div class="group btmspace-30">

              <div class="one_half first">
                  <h3>Restaurant Menu</h3>
                  
                  <div class="btmspace-15">
                      
                    <?php echo "<img class='restaurant-gallery' src='../images/menu/".$row['MenuOne']."' width=80% height=80% >"; ?>
                    <?php echo "<img class='restaurant-gallery'' src='../images/menu/".$row['MenuTwo']."' width=80% height=80% >"; ?>
                  </div>

                  <div>
                    <button class="btn medium" onclick="plusDivs(-1)">&#10094;</button>
                    <button class="btn medium" onclick="plusDivs(+1)">&#10095;</button>
                  </div>

              </div>
              <div class="one_half">

              <div class="one_half">
                <h3>Restaurant  Information</h3>
                <p><span class="restaurant-list-icon"><i class="fa fa-map-marker"></i></span>Address: <?php echo $row['Address']; ?></p>
                <p><span class="restaurant-list-icon"><i class="fa fa-heart"></i></span>Category:<?php echo $row['Category']; ?></p>
                
                  
                <div class="stars">



                 
                  <form action = "Rating.php" name="RatingForm" method="post" enctype="multipart/form-data">
                    <input class="star star-5" id="star-5" type="submit" name="star" value = 5/>
                    <label class="star star-5" for="star-5"></label>

                    <input class="star star-4" id="star-4" type="submit" name="star" value = 4/>
                    <label class="star star-4" for="star-4"></label>

                    <input class="star star-3" id="star-3" type="submit" name="star" value = 3/>
                    <label class="star star-3" for="star-3"></label>

                    <input class="star star-2" id="star-2" type="submit" name="star" value = 2/>
                    <label class="star star-2" for="star-2"></label>

                    <input class="star star-1" id="star-1" type="submit" name="star" value = 1/>
                    <label class="star star-1" for="star-1"></label>
                  </form>
                </div>

                  <p id = "StarScore">Users Rate:<?php echo number_format((float)$row['RateValue'], 1, '.', '') ; ?>/5.0 </p>

                  <p id="PriceRange">Price Range: 
                      <?php
                      if ($row['PriceRange'] == 1)
                          echo "$";
                      else if ($row['PriceRange'] == 2)
                          echo "$$";
                      else
                           echo "$$$";
                      ?>
                  
                  </p>

              </div>
            
        
        
              </div>
            </div>
         
            <?php
                if(isset($_SESSION['login_user'])&&!empty($_SESSION['login_user']))
                { 
                  
                  echo '<div style = "display: inline-block;">
                        <div  id="showreservationpanel"></div> <div  id="showreservationpanelSMALL"></div><div  id="showreservationpanelSMALL2"></div>
                        </div>';
                }
              elseif(!isset($_SESSION['login_user']))
                {
                    echo '<script language="javascript">';
                    echo 'alert("Please sign in to make a reservation")';
                    echo '</script>';
                }
                ?>
            
             
<br>
            <div id="reservationpanel" style = "opacity: 0;">
                <h3>Please fill in the reservation details</h3>
                <form action = "AddReservationToDB.php" name="reservationForm" method="post" onsubmit="return validateReservationForm()" enctype="multipart/form-data">
                    <div>
						<div class="one_third first">
							<label>Restaurant Name: </label>
							<label for="restaurantName" style="font-size: 15pt;"><?php echo $row['Name']; ?> </label>
							
						</div>
						<div class="one_third">
							<label for="NameOfReservation">Reservation For: </label>
                            <label  style="font-size: 15pt;"><?php echo  $_SESSION['login_user']; ?> </label>
						</div>
                        <div class="one_third">
							<label for="table-type">Table Type </label>
                            
                        <div class = "RADIO" style = "padding-top: 4%;">

                          <input type="radio" name="TableType" value="any" checked><span> Any Table</span> <br><br>
                          <input type="radio" name="TableType" value="window"><span>Window Table</span><br><br>
                          <input type="radio" name="TableType" value="vip"><span>VIP Table</span>
                        </div>

                     

                        
						</div>
                        
					</div>
                    <br> <br><br><br>
                    
					<div>
						<div class="one_third first">
							<label for="day">Day <span>*</span></label>
							<input type="date" name="day"  required>
						</div>
						<div class="one_third">
							<label for="time">Time <span>*</span></label>
							<input type="time" name="Time"  required>
						</div>
						  
					</div>
                    <br><br><br><br>
                    <br><br><br><br>
                    
					<div>
						<div class="one_third first">
							<br>
							<label for="people">Number of people <span>*</span></label>
							<input type="number" name="people" id = "numOfPeople"  min="1" max="30" required> 
						</div>
						<div class="one_third">
							<br>
							<label for="special-requirements">Special Requirements</label>
							<input type="text" name="specialRequirements" placeholder="Enter any special requirements">
						</div>
						<div class="one_third">
							<br>
							<input class="btn" id="reserveButton" type="submit" name="submitReservation" value="Make Reservation">
						</div>
					</div>
				</form>
            </div>
        </div>

        
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
    <script src="../layout/scripts/restaurantGallery.js"></script>
    <script src="../layout/scripts/showreservationpanel.js"></script>
    <script src="../layout/scripts/stars.js"></script>
    <script src="../layout/scripts/ballKick.js"></script>
    <script src="../layout/scripts/ExpectedDeposit.js"></script>
    <script src="../layout/scripts/formValidation.js"></script>  
    <script src="../layout/scripts/pageFadeIn.js"></script>
  </body>
    
</html>