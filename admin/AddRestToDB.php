<?php
    // Create database connection
    $db = mysqli_connect("localhost", "root", "", "foodbubble"); // Last parameter is the DB 

    // Initialize message variable
    $msg = "";

    // If upload button is clicked ...
    if (isset($_POST['submitButton'])) {
       
    // Get image name
    $image = $_FILES['RestImage']['name'];
    $imageMenu1 = $_FILES['MenuImage1']['name'];
    $imageMenu2 = $_FILES['MenuImage2']['name'];
        
    // Get text
   // $image_text = mysqli_real_escape_string($db, $_POST['image_text']);

    // image file directory
    $target = "../images/restaurants/".basename($image);
    $targetMenu1 = "../images/menu/".basename($imageMenu1);
    $targetMenu2 = "../images/menu/".basename($imageMenu2);

  //  $sql = "INSERT INTO images (image, image_text) VALUES ('$image', '$image_text')";
    $sql = "INSERT INTO restaurants (Name,Address,Category,PriceRange,Image,MenuOne,MenuTwo,Description,PhoneNumber) VALUES ('$_POST[RestName]','$_POST[RestAddress]','$_POST[Category]',
    '$_POST[PriceRange]','$image','$imageMenu1','$imageMenu2','$_POST[Description]','$_POST[PhoneNumber]')";
    // execute query
    mysqli_query($db, $sql);

    if (move_uploaded_file($_FILES['RestImage']['tmp_name'], $target)) {
        $msg = "Image uploaded successfully";
    }else{
        $msg = "Failed to upload image";
    }
    if (move_uploaded_file($_FILES['MenuImage1']['tmp_name'], $targetMenu1)) {
        $msg = "Image uploaded successfully";
    }else{
        $msg = "Failed to upload image";
    }
    if (move_uploaded_file($_FILES['MenuImage2']['tmp_name'], $targetMenu2)) {
        $msg = "Image uploaded successfully";
    }else{
        $msg = "Failed to upload image";
    }

    }
    
    echo $msg;
    
    header('Location: /ip/admin/AdminAddNewRestaurant.php'); 
 
?>
