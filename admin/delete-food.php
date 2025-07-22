<?php
include '../admin/config/constants.php';


if(isset($_GET['id']) && isset($_GET['img_name']) )
{

    $id=$_GET['id'];
    $image_name=$_GET['img_name'];

    if($image_name != "" )
    {
        $path ="../images/food/$image_name";

        $remove =unlink($path);

        if($remove == false)
        {
            $_SESSION['remove']="failed to remove food image";
            header('location:http://localhost/food-order/admin/manage-food.php');
            die();
        }
    }

    $sql="delete from tbl_food where id=$id";

    $res=mysqli_query($con,$sql);

    if($res==true){
        $_SESSION['deletet-done']="Deletet Done";
        header('location:http://localhost/food-order/admin/manage-food.php');

    }else{
        $_SESSION['deletet-not-done']="Deletet Not Done";
        header('location:http://localhost/food-order/admin/manage-food.php');


    }

}else{
    header('location:http://localhost/food-order/admin/manage-food.php');
}
























?>