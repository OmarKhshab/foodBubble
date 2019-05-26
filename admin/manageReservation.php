<?php 
    include '../s.php'; 
    $conn = OpenCon();
    session_start();
    $adminname=$_SESSION['login_admin'];
    
   
	if (isset($_GET['res_ap'])) {
		
        $reservation_I = $_GET['res_ap'];
		$record = mysqli_query($conn, "UPDATE reservations SET Status='approved' WHERE ResID='$reservation_I'");
        $rec = mysqli_query($conn, "UPDATE reservations SET adname= '$adminname' WHERE ResID='$reservation_I'");
         
        header('Location: manageReservation.php');
   
	}
    if (isset($_GET['res_del'])) {
		
        $reservation_I = $_GET['res_del'];
		$record = mysqli_query($conn, "DELETE FROM reservations WHERE ResID=$reservation_I");
        header( "refresh:0; url=manageReservation.php" );
   
	}
?>



<!DOCTYPE html>

<html>

  <head>
    <title>Foodbubble &mdash; Reservations</title>
    <meta charset="utf-8">
    <link href="../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
    <link rel='shortcut icon' type='image/x-icon' href='images/Bubble.ico' />
  </head>
    <?php


    $query="SELECT TableType,NumOfPeo,SpecialReq,ReserDate,ReserTime,FirstName,LastName,Email,users.PhoneNumber,restaurants.Name,ResID 
            FROM reservations
            INNER JOIN users
            ON reservations.CilUsername=users.Username
            INNER JOIN restaurants
            ON reservations.RestID=restaurants.ID
            WHERE status='pending'";
    $result=mysqli_query($conn,$query);   
    CloseCon($conn);
?>

  <body id="top" style = "opacity:0;">
    <!-- Header Area -->
    <div class="bgded overlay" style="background-image:url('../images/backgrounds/header_bg.jpg');"> 

      <div class="wrapper">
        <header id="header" class="hoc clear">
          <div id="logo">
                      <div class="../logo-img">
              <img src="../images/logo.png" class = "ballKick">
            </div> 
            <h1>Foodbubble<br>(Admin)</h1>
          </div>
          <nav id="mainav" class="clear"> 
            <ul class="clear">
             <?php
                   echo '<li><a href="adminsignin.php"><span>sign out</span></a></li>';
                  echo '<li class="active"><a href="manageReservation.php"><span>Manage Reservation</span></a></li>';
                  echo '<li><a href="AdminAddNewRestaurant.php"><span>Add New Restrauant</span></a></li>';
                ?>
             
            </ul>
          </nav>
        </header>
      </div>
    </div>

    <!-- Features Area -->
    <div class="wrapper row3">
      <section class="hoc container clear"> 

                <div>
                  <h3>Reservations Control (Admin) </h3>
                  <br>
                    <br>
                
                  <div class="btmspace-15 ">
                                <?php 
																$r=mysqli_fetch_array($result);
                                while($row=mysqli_fetch_array($result)){
                                    $userfn=$row['FirstName'];
                                    $userln=$row['LastName'];
                                    $usere=$row['Email'];
                                    $userpn=$row['PhoneNumber'];
                                    $restt=$row['TableType'];
                                    $resnop=$row['NumOfPeo'];
                                    $ressr=$row['SpecialReq'];
                                    $resd=$row['ReserDate'];
                                    $rest=$row['ReserTime'];
                                    $restaurantname=$row['Name'];
                                    $userfullname=$userfn.$userln;
                                    $reservationId=$row['ResID']; 
                                    
                                echo "
                                
                                <div class='restaurant-gallery' >
                                <form id = 'ReservationsContainer' class = 'ReservationNode' method ='post'>
                                        
                                        
                                        <div class = 'ClientData'>
                                            
                                            <br><br>
                                            <span>Client Name: </span><input type='text' name = 'ClientName' value=$userfullname readonly> <br>
                                            <span>Client Email: </span><input type='email' name = 'ClientEmail' value=$usere readonly><br>
                                            <span>Client Phone: </span><input type='text' name ='ClientNumber' value =$userpn  readonly> <br>
                                            
                                            
                                                
                                            <div class= 'submitButton'>
                                            <a href='manageReservation.php?res_ap=$reservationId' class='btn medium'> Accept</a>
                                            </div>
                                            <div class= 'submitButton'>
                                            <a href='manageReservation.php?res_del=$reservationId' class='btn medium'> Reject</a>
                                                
                                            </div>
                                            
                                        </div>
                                        <div class = 'restaurantData'>
                                                
                                            <br><br>
                                            <span>Restaurant Name: </span><input type ='text' name = 'RestaurantName' value =$restaurantname readonly><br>
                                            <span>Reservation Date: </span><input type ='date' name = 'ReservationDate' value = $resd readonly><br> 
                                            <span>Reservation Time: </span><input type = 'time' name = 'ReservationTime' value =$rest readonly><br>

                                        </div>
                                                
                                        <div class = 'restaurantData'>
                                            <br><br>
                                            <span>Table Type: </span><input type ='text' name = 'TableType' value=$restt readonly> <br>
                                            <span>Number of People: </span><input type ='text' name = 'NumberofPeople' value =$resnop readonly> <br>
                                            <span>Special Requirements: </span><input type ='text' name = 'SpecialRequirements' value=$ressr readonly> <br>

                                        </div>
                                   
                                </form>
                                </div>
                                "
                                ;}
                                ?>                      
                  </div>
                    
<br><br><br><br>
                    
                  

              </div>
      </section>
                    <div id = "AdminButton">
                    <button class="btn medium" onclick="plusDivs(-1)">&#10094;</button>
                    <button class="btn medium" onclick="plusDivs(+1)">&#10095;</button>
                      
                      
                   </div>
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
    <script src="../layout/scripts/formValidation.js"></script>
    <script src="../layout/scripts/restaurantGallery.js"></script>  
    <script src="../layout/scripts/ballKick.js"></script>
    <script src="../layout/scripts/pageFadeIn.js"></script>
  </body>
</html>