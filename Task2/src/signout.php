<?php
session_start();
    require 'mySql.php';

    unset($_SESSION['logged']);

    header("location:signinsignup.php");


?>