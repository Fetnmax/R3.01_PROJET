<?php
    session_start();
    // Show all errors
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    var_dump($_POST);
    $_SESSION['panier'] = $_POST;
?>