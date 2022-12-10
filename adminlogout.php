<?php
include 'connection.php';

session_start();
if(!isset($_SESSION['adminloginid']))
{
    header('Location: admin login.php');
}

    if(isset($_POST['logout']))
    {
        session_destroy();
        header('Location: admin login.php');
    }
    
?>