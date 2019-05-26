<!DOCTYPE html>
<?php

    session_start();
    unset( $_SESSION['login_user'] ); 
    header( "refresh:0; url=index.php" );
?>