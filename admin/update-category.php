<?php
include ('partials/menu.php');
?>


    <div class="main-content">
        <div class="wrapper">

        <br><br>
        <h1>Update Category</h1>

        <?php

        if(isset($_GET['id'])){
            $id=$_GET['id'];

            $sql="SELECT * FROM tbl_category WHERE id=$id ";
        
            $res=mysqli_query($con,$sql);
        
            $count=mysqli_num_rows($res);
        
            if($count==1){
        
                $row=mysqli_fetch_assoc($res);
                
                $id= $row['id'];
                $title=$row['title'];
                $current_image=$row['img_name'];
                $featured=$row['featured'];
                $active=$row['active'];
        
            }else{
                $_SESSION['no-category-found']="Not Category Found ";
                header('location:http://localhost/food-order/admin/manage-category.php');
            }
        }else{
            
        }

        ?>

        <form action="" method="post" enctype="multipart/form-data">
        <table class="tbl-30">
            <tr>
                <td>Title:</td>
                    <td>
                        <input type="text" name="title" value="<?php echo $title  ?>">
                    </td>
            </tr>
            <tr>
                                <td>Current Image:</td><br><br>
                                <td>
                                
                                        <?php 

                                            if($current_image != "")
                                            {
                                                ?>
                                                    <img src="../images/category/<?php echo $current_image ?>" width="200px" >
                                                <?php

                                            }
                                            else
                                            {
                                                echo "Image Not Added";
                                            }

                                        ?>
                                    
                                    
                                </td>
                            </tr>
                        <tr>
                                <td>new Image:</td>
                                <td>
                                    <input type="file" name="image" >
                                </td>
                        </tr>

                        <tr>
                                <td>Featured:</td>
                                <td>
                                    <input <?php if($featured=="yes"){echo "checked";} ?> type="radio" name="featured" value="yes">Yes
                                    <input <?php if($featured=="no"){echo "checked";} ?> type="radio" name="featured" value="no">no
                                </td>
                        </tr>

                        <tr>
                            <td>Active:</td>
                            <td>
                                <input <?php if($active=="yes"){echo "checked";} ?> type="radio" name="active" value="yes" >yes
                                <input <?php if($active=="no"){echo "checked";} ?> type="radio" name="active" value="no" >no
                            </td>
                        </tr>

                    <tr>
                        <td colspan="2">
                            <input type="hidden" name="$current_image"value="<?php  echo $current_image ?>" >
                            <input type="hidden" name="$id" value="<?php  echo $id ?>" >
                            <input type="submit" name="submit" value="Update Category" class="btn-secondary" >
                        </td>
                    </tr>
        </table>
        </form>

        <?php

            if(isset($_POST['submit'])){
                
                $title=$_POST['title'];
                $featured=$_POST['featured'];
                $active=$_POST['active'];

                if(isset($_FILES['image']['name']))
                {
                            
                    $image_name=$_FILES['image']['name'];

                    if($image_name != "")
                    {
                        //get image
                        $extention=end(explode('.',$image_name));

                        $image_name="food_category_".rand(000,999).'.'.$extention;

                        $source_path=$_FILES['image']['tmp_name'];

                        $destination_path="../images/category/".$image_name;

                        $upload=move_uploaded_file($source_path,$destination_path);

                        if($upload==false)
                        {

                            $_SESSION['upload']='failed to uploade image';

                            // header('location:http://localhost/food-order/admin/add-category.php');
                            header('location:http://localhost/food-order/admin/manage-category.php');

                            die();
                        }
                        //remove current image 
                        if($current_image!="")
                        {
                            $remove_path="../images/category/".$current_image;
                        $remove =unlink($remove_path);

                        //check whethere image is removed or not 
                        //if faild to remove then display message and stop the process 
                        if($remove==false){
                            $_SESSION['failed-remove']='failed to remove current image ';
                            header('location:http://localhost/food-order/admin/manage-category.php');
                            die();
                        }
                        }
                        

                        
                    }
                    else
                        {
                            $image_name=$current_image;
                        }

                }
                else
                {
                    $image_name=$current_image; 
                }
            

                $sql3="UPDATE tbl_category SET
                            title='$title',
                            img_name='$image_name',
                            featured='$featured',
                            active='$active'
                            WHERE id='$id'
                        ";
                $res3=mysqli_query($con,$sql3);
                
                if($res3==true){

                    $_SESSION['update']="Category Updated Successfuly";
                    header('location:http://localhost/food-order/admin/manage-category.php');
                }else{
                    $_SESSION['update-failed']="Category Updated Failed ";
                            header('location:http://localhost/food-order/admin/manage-category.php');
                }

            }


        ?>
        
        </div>



    </div>



<?php



include ('partials/footer.php');
 ?>
