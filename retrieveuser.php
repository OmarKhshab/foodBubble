<?php
    $fName=""; 
    $lName="";
    $birthday="";
    $email="";
    $phone="";
    
    include 's.php';
    $conn = OpenCon();
    
    
    $sql= "SELECT 'FirstName','LastName','Birthay','Email','PhoneNumber' FROM users;";
    $result=mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    $fname=$row['']
?>