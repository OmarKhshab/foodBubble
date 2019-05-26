<?php
include 'restaurants/navigateToCategoryCode.php'
?>
<!DOCTYPE html>

<html>
<head>

    
    <title>Foodbubble | Account</title>
    <link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
    <link rel='shortcut icon' type='image/x-icon' href='images/Bubble.ico' />

</head>
 <?php
        include 's.php';
        $conn = OpenCon();
        session_start();
        

        $user_check=$_SESSION['login_user'];
        
        $sqll="SELECT * FROM users WHERE Username='$user_check'";
        $result=mysqli_query($conn,$sqll);
        $row=mysqli_fetch_assoc($result);
        $space=" ";
        CloseCon($conn);
    ?>
  <body id="top" style = " opacity:0;">
	
	
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
                  
                  echo '<li class="active"><a href="account.php"><span>My account</span></a></li>';
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
          <p>Find your next favorite restaurant</p>
          <h2 class="heading">Find The Best Restaurants in The City</h2>
          <p>Browse through our collection of curated restaurants</p>
        </article>
      </div>
    </div>

    
	
	
	
	
	 <div class = "AccountArea">
	 
	 <center>
	<hr/>
<h1><?php echo $row['FirstName'].$space.$row['LastName'];?></h1>
 <hr/>
	 </center>


 <div id = "AccountData">
 
 <span>Email: <?php echo $row['Email'];?> <br></span>
 <span>Phone Number:<?php echo $row['PhoneNumber'];?> <br></span>
 </div>
 
 <br>
<hr/>
<center>
<h3> Upcoming Approved Reservations </h3>



<div id = "ReservationsContainer" > 

    
     <?php
        $currentDate = date("Y-m-d");
        
        $conn = OpenCon();
        $sql= "SELECT * FROM reservations WHERE Status ='approved' AND CilUsername='$user_check' AND ReserDate >='$currentDate' " ;
        $result=mysqli_query($conn,$sql);

        CloseCon($conn);
        $counter = 0 ;
        $counterDivide = 3 ;
    
    while($row=mysqli_fetch_array($result)){
                
                $counter+=1;
                
                $conn = OpenCon();
                $RestQuery= "SELECT * FROM restaurants WHERE ID ='$row[RestID]'";
                $CurrentRestaurant=mysqli_query($conn,$RestQuery); 
                $CurrentRest=mysqli_fetch_array($CurrentRestaurant);
                CloseCon($conn);
        echo 
        "   
        
            
        
        
        <div class='reservationsContainer orange' style ='background-image: url(images/restaurants/$CurrentRest[Image]);' ><br><span><br>$CurrentRest[Name]<br>$row[ReserDate] </span><p> $row[ReserDate].$row[ReserTime]<br>$CurrentRest[Address]<br>$CurrentRest[PhoneNumber] </p> </div>
        
       
        
        
        ";
        if ($counter == $counterDivide)
        {
            echo "<br>";
            if ($counterDivide == 3)
                $counterDivide = 4;
            else
                $counterDivide = 3;
            $counter  =0;
            }
        
    }
    
    
    
    ?>
    
    
    
    


</div>

<br>
<hr>
<br>
<h3> Upcoming Pending Reservations </h3>



<div id = "ReservationsContainer" > 

    
     <?php
        $currentDate = date("Y-m-d");
        
        $conn = OpenCon();
        $sql= "SELECT * FROM reservations WHERE Status ='pending' AND CilUsername='$user_check' AND ReserDate >='$currentDate' " ;
        $result=mysqli_query($conn,$sql);

        CloseCon($conn);
        $counter = 0 ;
        $counterDivide = 3 ;
    
    while($row=mysqli_fetch_array($result)){
                
                $counter+=1;
                
                $conn = OpenCon();
                $RestQuery= "SELECT * FROM restaurants WHERE ID ='$row[RestID]'";
                $CurrentRestaurant=mysqli_query($conn,$RestQuery); 
                $CurrentRest=mysqli_fetch_array($CurrentRestaurant);
                CloseCon($conn);
        echo 
        "   
        
            
        
        
        <div class='reservationsContainer orange' style ='background-image: url(images/restaurants/$CurrentRest[Image]);' ><br><span><br>$CurrentRest[Name]<br>$row[ReserDate] </span><p> $row[ReserDate].$row[ReserTime]<br>$CurrentRest[Address]<br>$CurrentRest[PhoneNumber] </p> </div>
        
       
        
        
        ";
        if ($counter == $counterDivide)
        {
            echo "<br>";
            if ($counterDivide == 3)
                $counterDivide = 4;
            else
                $counterDivide = 3;
            $counter  =0;
            }
        
    }
    
    
    
    ?>
    
    
    
    


</div>

<br>
<hr>
<br>

<h3> Past Reservations </h3>




<div id = "ReservationsContainer" > 

    
     <?php
        $currentDate = date("Y-m-d");
        
        $conn = OpenCon();
        $sql= "SELECT * FROM reservations WHERE CilUsername='$user_check' AND ReserDate <'$currentDate' " ;
        $result=mysqli_query($conn,$sql);

        CloseCon($conn);
        $counter = 0 ;
        $counterDivide = 3 ;
    
    while($row=mysqli_fetch_array($result)){
                
                $counter+=1;
                
                $conn = OpenCon();
                $RestQuery= "SELECT * FROM restaurants WHERE ID ='$row[RestID]'";
                $CurrentRestaurant=mysqli_query($conn,$RestQuery); 
                $CurrentRest=mysqli_fetch_array($CurrentRestaurant);
                CloseCon($conn);
        echo 
        "   
        
            
        
        
        <div class='reservationsContainer orange' style ='background-image: url(images/restaurants/$CurrentRest[Image]);' ><br><span><br>$CurrentRest[Name]<br>$row[ReserDate] </span><p> $row[ReserDate].$row[ReserTime]<br>$CurrentRest[Address]<br>$CurrentRest[PhoneNumber] </p> </div>
        
       
        
        
        ";
        if ($counter == $counterDivide)
        {
            echo "<br>";
            if ($counterDivide == 3)
                $counterDivide = 4;
            else
                $counterDivide = 3;
            $counter  =0;
            }
        
    }
    
    
    
    ?>
    
    
    
    


</div>



<br>




</center>
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
 
 
 
    <script src="layout/scripts/jquery.min.js"></script>
    <script src="layout/scripts/jquery.backtotop.js"></script>
    <script src="layout/scripts/ballKick.js"></script>
    <script src="layout/scripts/pageFadeIn.js"></script>

</body>
</html>

