<?php
include '../admin/config/constants.php';


if(isset($_GET['id']) ) 
{

    $id=$_GET['id'];
    

    $sql="delete from tbl_order where id=$id";

    $res=mysqli_query($con,$sql);

    if($res==true){
        $_SESSION['deletet-done']="Deletet Done";
        header('location:http://localhost/food-order/admin/manage-order.php');

    }else{
        $_SESSION['deletet-not-done']="Deletet Not Done";
        header('location:http://localhost/food-order/admin/manage-order.php');


    }

}else{
    header('location:http://localhost/food-order/admin/manage-order.php');
}


?>