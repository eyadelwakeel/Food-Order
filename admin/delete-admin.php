<?php

include('config/constants.php');

$id=$_GET['id'];

$sql="delete from tbl_admin where id=$id";

$res=mysqli_query($con,$sql);

if($res==true){
    $_SESSION['deleted']="Admin Is Deleted";
    header('location:http://localhost/food-order/admin/manage-admin.php');

}else{
    $_SESSION['deleted']="Admin Is Not Deleted";
    header('location:http://localhost/food-order/admin/manage-admin.php');

}   

?>