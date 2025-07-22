<?php include('partials/menu.php') ; ?>

<div class="main-content">
    <div class="wrapper">

    <h1>ADD FOOD</h1><br><br>

    <form action="" method="Post" enctype="multipart/form-data" >
        <table class="tbl-30" >
            <tr>
                <td>Title:<td>
                <td>
                    <input type="text" name="title" placeholder="Title of the food " >
                </td>
            </tr>
            <tr>
                <td>description : </td>
                <td>
                    <textarea name="description" cols="30" rows="5" placeholder="Description of the food" ></textarea>
                </td>
            </tr>
            <tr>
                <td>Price:</td>
                <td>
                    <input type="number" name="price" >
                </td>
            </tr>
            <tr>
                <td>Select Image</td>
                <td>
                    <input type="file" name="image" >
                </td>
            </tr>
            <tr>
                <td>Category:</td>
                <td>
                    <select name="category" >


                        <?php

                        // Get active category from DB
                        $sql="SELECT * FROM tbl_category WHERE active='yes' ";

                        $res=mysqli_query($con,$sql);

                        //count rows to check where we have categories or not 
                        $count = mysqli_num_rows($res);

                        if($count>0)
                        {
                            while($row=mysqli_fetch_assoc($res))
                            {
                                $id=$row['id'];
                                $title=$row['title'];

                                ?>
                                    <option value="<?php echo $id ?>"><?php echo $title ?></option>
                                <?php
                            }
                        }
                        else
                        {
                            ?>
                                <option value="0">No Category Found</option>
                            <?php
                        }

                        ?>


                        
                    </select>
                </td>
            </tr>
            <tr>
                <td>Featured: </td>
                <td>
                    <input type="radio" name="featured" value="Yes" >Yes
                    <input type="radio" name="featured" value="No" >No
                </td>
            </tr>
            <tr>
                <td>Active:</td>
                <td>
                <input type="radio" name="active" value="Yes" >Yes
                <input type="radio" name="active" value="No" >No
                </td>
            </tr>
            <tr>
                <td colspan="2" >
                    <input type="submit" name="submit" value="Add Food" class="btn-secondary" >
                </td>
            </tr>
        </table>
    </form>

    <?php
    if(isset($_POST['submit'])){

        $title=$_POST['title'];
        $image_name=$_POST['image'];
        $description=$_POST['description'];
        $category=$_POST['category'];
        $price=$_POST['price'];


        if(isset($_POST['featured']))
        {
            $featured=$_POST['featured'];
        }
        else
        {
            $featured='No';
        }

        if(isset($_POST['active']))
        {
            $active=$_POST['active'];
        }
        else
        {
            $active='No';
        }

        if(isset($_FILES['image']['name']))
        {
            $image_name=$_FILES['image']['name'];

            if($image_name !="")
            {
                $extention=end(explode('.',$image_name));

                $image_name= "food-name_".rand(10000,11000).'.'.$extention;

                $source_path=$_FILES['image']['tmp_name'];

                $destination_path="../images/food/".$image_name;

                $upload=move_uploaded_file($source_path,$destination_path);

                
                if($upload==false)
                {

                    $_SESSION['upload']='failed to uploade image';

                    header('location:http://localhost/food-order/admin/manage-food.php');

                    die();
                    

                }
            }
            else
            {

            }
        }
        else
        {
            $image_name="";
        }

            //الاسم اللي عاشمال دا هو اللي في الداتا بيز 


        $sql2="INSERT INTO tbl_food SET 

            

        title='$title',
        featured='$featured',
        description='$description',
        img_name='$image_name',
        active='$active',
        category_id	=$category,
        price=$price";  

        // for numirical value we do not need to pass value inside quotes '' 
        // but for string value it is compulsory to add qoutes ''

        $res4=mysqli_query($con,$sql2);

        if($res4==true){
            $_SESSION['add-food']='food Added Successfuly';
            header('location:http://localhost/food-order/admin/manage-food.php');
        }else{
            $_SESSION['failed-food']='food Added failed Please Try Agin';
            header('location:http://localhost/food-order/admin/manage-food.php');
        }


    }

    ?>

    </div>
</div>









<?php include('partials/footer.php') ; ?>