<!DOCTYPE html>
<?php

    session_start();
    unset( $_SESSION['login_admin'] ); 
    header( "refresh:0; url=adminsignin.php" );
?>