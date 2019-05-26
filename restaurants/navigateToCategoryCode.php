<?php    
    $_SESSION["category"] = "";
    function setRest($cat)
    {
        $_SESSION["category"] = $cat;
        header('Location: /ip/restaurants/category.php'); 
        exit;
    }
   if (isset($_GET['cat']))  {
        setRest($_GET['cat']);
      }
?>