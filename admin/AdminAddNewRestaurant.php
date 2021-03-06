
<!DOCTYPE html>

<html>

  <head>
    <title>Foodbubble(Admin) | Add New Restaurant</title>
    <meta charset="utf-8">
    <link href="../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
    <link rel='shortcut icon' type='image/x-icon' href='../images/Bubble.ico' />
  </head>

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
                  echo '<li><a href="manageReservation.php"><span>Manage Reservation</span></a></li>';
                  echo '<li class="active"><a href="AdminAddNewRestaurant.php"><span>Add New Restrauant</span></a></li>';
                ?>
             
            </ul>
          </nav>
        </header>
      </div>
    </div>

    <!-- Features Area -->
    <div class="wrapper row3">
      <section class="hoc container clear"> 

          <h1 style= "font-size: 27pt;">Add New Restaurant (Admin)</h1>
          <br>
          <h2>Please fill in the restaurant details</h2>
          <br><br>
          <form action="AddRestToDB.php" method ="post" enctype="multipart/form-data">
              
            <div class="one_third first">
        
            <label for="Name">Restaurant Name:</label>
            <input type ="text" name ="RestName" placeholder="Enter Name" required >
                <br><br>
            <label for="Address">Address:</label>
            <input type ="text" name ="RestAddress" placeholder="Enter Address" required>
              <br><br>
                <label for= "Category">Category:</label>
                
                
                <div class = "RADIO" style = "padding-top: 4%;">

                          <input type="radio" name="Category" value="Exotic" ><span>Exotic</span> <br><br>
                          <input type="radio" name="Category" value="Family" checked><span>Family</span><br><br>
                          <input type="radio" name="Category" value="Outgoing"><span>Outgoing</span><br><br>
                          <input type="radio" name="Category" value="Romantic"><span>Romantic</span>
                        </div>
                
                 </div>
                       
              
             
              <div class="one_third">
           
              <label for="Image">Menu Image 1:</label>   
            <input type ="file" name ="MenuImage1" accept = "image/*" required>
              <br><br><br>
              <label for="Image">Menu Image 2:</label>   
            <input type ="file" name ="MenuImage2" accept = "image/*" required>
              <br><br><br>
            <label for="Description">Description:</label>
            <input type ="text" name ="Description" placeholder="Enter Description" required>
              <br><br>
                  <label for="PhoneNumber">Phone Number:</label>
            <input type ="text" name ="PhoneNumber" placeholder="Enter PhoneNumber" required>
              <br><br>
 
              
              
              </div>
            
                        
              <div class="one_third">
              
            <label for="PriceRange">Price Range:</label>
                <div class = "RADIO" style = "padding-top: 4%;">

                          <input type="radio" name="PriceRange" value= 1 ><span>$</span> <br><br>
                          <input type="radio" name="PriceRange" value= 2 checked><span>$$</span><br><br>
                          <input type="radio" name="PriceRange" value= 3 ><span>$$$</span>
                        </div>
                  <br><br>
                            <label for="Image">Restaurant Image:</label>   
            <input type ="file" name ="RestImage" accept = "image/*" required>
              <br><br><br><br>
            <input type = "submit" name = "submitButton" style="color: white; background-color: cornflowerblue;" >  
              </div>    
          </form>
          
          
          </section>
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