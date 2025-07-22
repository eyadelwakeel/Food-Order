
<?php

include '../admin/config/constants.php';

if(isset($_GET['id']) && isset($_GET['img_name'])){

    $id=$_GET['id'];
    $img_name=$_GET['img_name'];

    if($img_name !=""){

        $path ="../images/category/$img_name";

        //unlink بيمسح مسار الصورة 
        $remove=unlink($path);

        if($remove==false){
            $_SESSION['remove']="failed to remove category image";
            header('location:http://localhost/food-order/admin/manage-category.php');
            die();
        }

    }

    $sql="delete from tbl_category where id=$id";

    $res=mysqli_query($con,$sql);

    if($res==true){
        $_SESSION['deletet-done']="Deletet Done";
        header('location:http://localhost/food-order/admin/manage-category.php');

    }else{
        $_SESSION['deletet-not-done']="Deletet Not Done";
        header('location:http://localhost/food-order/admin/manage-category.php');


    }

}else{
    header('location:http://localhost/food-order/admin/manage-category.php');
}


 ?>

