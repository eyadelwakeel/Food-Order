<?php include('partials/menu.php') ; ?>



<div class="main-content">
    <div class="wrapper">
        <h1>Add Category</h1><br><br>
        <?php
        if(isset($_SESSION['failed-category'])){
        echo $_SESSION['failed-category'];
        unset($_SESSION['failed-category']);

        
    }?>
        <form action="" method="Post" enctype="multipart/form-data" >
            <table class="tbl-30">
                <tr>
                    <td>Title:</td>
                    <td>
                        <input type="text" name="title" placeholder="category title">
                    </td>
                </tr>
                <tr>
                    <td>Select Image:</td>
                    <td>
                        <input type="file" name="image" >
                    </td>
                </tr>
                <tr>
                    <td>Featured:</td>
                    <td>
                        <input type="radio" name="featured" value="yes">Yes
                        <input type="radio" name="featured" value="no">No
                    </td>
                </tr>
                <tr>
                    <td>Active:</td>
                    <td>
                        <input type="radio" name="active" value="yes" >Yes
                        <input type="radio" name="active" value="no" >No
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Category" class="btn-secondary" >
                    </td>
                </tr>
            </table>
        </form>



        <?php

    if(isset($_POST['submit'])){

        $title=$_POST['title'];
        $featured=$_POST['featured'];
        $active=$_POST['active'];
    

        if(isset($_POST['featured'])){

            $featured=$_POST['featured'];
        }else{
            $featured="No";
        }
        if(isset($_POST['active']))
        {
            $active=$_POST['active'];
        }else{
            $active="No";
        }

        

        if(isset($_FILES['image']['name'])){
            $image_name=$_FILES['image']['name'];

                if($image_name != ""){

                            $extention=end(explode('.',$image_name));

                            $image_name="food_category_".rand(000,999).'.'.$extention;

                            $source_path=$_FILES['image']['tmp_name'];

                            $destination_path="../images/category/".$image_name;

                            $upload=move_uploaded_file($source_path,$destination_path);

                            if($upload==false){

                                $_SESSION['upload']='failed to uploade image';

                                // header('location:http://localhost/food-order/admin/add-category.php');
                                header('location:http://localhost/food-order/admin/manage-category.php');

                                die();
                                

                            }
                }



        }           

    
        $sql="INSERT INTO tbl_category SET title='$title',
        featured='$featured',
        img_name='$image_name',
        active='$active'";  

        $res3=mysqli_query($con,$sql);

        if($res3==true){
            $_SESSION['add-category']='Category Added Successfuly';
            header('location:http://localhost/food-order/admin/manage-category.php');
        }else{
            $_SESSION['failed-category']='Category Added failed Please Try Agin';
            header('location:http://localhost/food-order/admin/manage-category.php');
        }
    }


        ?>

    </div>
</div>









<?php include('partials/footer.php') ; ?>