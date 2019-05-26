<?php
    // Create database connection
    session_start();
    $db = mysqli_connect("localhost", "root", "", "foodbubble"); // Last parameter is the DB 


    // If upload button is clicked ...
    if (isset($_POST['submitReservation'])) {
        
        $rID= $_SESSION["restaurantID"];
        $userName= $_SESSION['login_user'];
        $sql = "INSERT INTO reservations (CilUsername,RestID,adname,SpecialReq,TableType,ReserDate,ReserTime,NumOfPeo,Status) VALUES ('$userName','$rID','DefaultAdmin','$_POST[specialRequirements]','$_POST[TableType]','$_POST[day]','$_POST[Time]','$_POST[people]','pending')";
        // execute query
        mysqli_query($db, $sql);
        echo '<script language="javascript">';
        echo 'alert("Request for reservation is pending.")';
        echo '</script>';
        header( "refresh:0; /ip/restaurants/restaurant.php" );
    }
?>
