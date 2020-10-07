<?php
session_start();
if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_SESSION['login_user']))
{
               
           unset($_SESSION['login_user']);
           session_destroy();
           header("location:login.php");

}

?>

