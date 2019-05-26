<?php
    // Create database connection

    session_start();

    $db = mysqli_connect("localhost", "root", "", "foodbubble"); // Last parameter is the DB 


    // If upload button is clicked ...
    if (isset($_POST['star'])) {
       
    echo '<script language="javascript">';
    echo 'alert("Thanks for you rating.")';
    echo '</script>';
        
    $restID= $_SESSION["restaurantID"];
    $rate = $_POST['star'];
    $query = "UPDATE restaurants SET RateTotal = RateTotal + '$rate', RateNumber = RateNumber + 1 WHERE ID = '$restID'" ;
    $query2 = "UPDATE restaurants SET RateValue = RateTotal / RateNumber WHERE ID = '$restID'" ;
        
        
    // execute query
    mysqli_query($db, $query);
    mysqli_query($db, $query2);
    
    header( "refresh:0; /ip/restaurants/restaurant.php" );
    }
?>
