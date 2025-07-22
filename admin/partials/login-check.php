<?php


if(!isset($_SESSION['user']))
{
    $_SESSION['no-login-massage']="please login in to access admin panel";

    header('location:http://localhost/food-order/admin/login.php');
}



?>