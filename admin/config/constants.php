<?php
session_start();


$con=mysqli_connect('localhost','root','');
$db_select=mysqli_select_db($con,'order-food');

?>