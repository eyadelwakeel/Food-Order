<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">


<?php include('partials/menu.php') ?>



<div class="main-content">
    <div class="weapper">
    <h1>Manage Food</h1>

    <?php
    if(isset($_SESSION['upload']))
    {
        echo $_SESSION['upload'];
        unset($_SESSION['upload']);
    }
    if(isset($_SESSION['failed-food']))
    {
        echo $_SESSION['failed-food'];
        unset($_SESSION['failed-food']);
    }
    if(isset($_SESSION['add-food']))
    {
        echo $_SESSION['add-food'];
        unset($_SESSION['add-food']);
    }
    if(isset($_SESSION['remove']))
    {
        echo $_SESSION['remove'];
        unset($_SESSION['remove']);
    }
    if(isset($_SESSION['deletet-done']))
    {
        echo $_SESSION['deletet-done'];
        unset($_SESSION['deletet-done']);
    }
    if(isset($_SESSION['deletet-not-done']))
    {
        echo $_SESSION['deletet-not-done'];
        unset($_SESSION['deletet-not-done']);
    }
    if(isset($_SESSION['no-food-found']))
    {
        echo $_SESSION['no-food-found'];
        unset($_SESSION['no-food-found']);
    }
    if(isset($_SESSION['update']))
    {
        echo $_SESSION['update'];
        unset($_SESSION['update']);
    }
    if(isset($_SESSION['failed-remove']))
    {
        echo $_SESSION['failed-remove'];
        unset($_SESSION['failed-remove']);
    }
    if(isset($_SESSION['update']))
    {
        echo $_SESSION['update'];
        unset($_SESSION['update']);
    }
    if(isset($_SESSION['update-failed']))
    {
        echo $_SESSION['update-failed'];
        unset($_SESSION['update-failed']);
    }

    ?>

    <div class="container">
            <button class="btn btn-primary my-5">
                <a href="add-food.php" class="text-light">Add Food</a>
            </button>
            <table class="table">
                
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Price</th>
                        <th scope="col">Img_name</th>
                        <th scope="col">Category_ID</th>
                        <th scope="col">Featured</th>
                        <th scope="col">Active</th>
                        <th scope="col">Action</th>
                    </tr>
                
                

                <?php

                $sql="SELECT * FROM tbl_food ";
                $res=mysqli_query($con,$sql);
                $count=mysqli_num_rows($res);

                if($count>0)
                {
                    while($row=mysqli_fetch_array($res))
                    {
                        $id=$row['id'];
                        $title=$row['title'];
                        $description=$row['description'];
                        $price=$row['price'];
                        $image_name=$row['img_name'];
                        $category_id=$row['category_id'];
                        $featured=$row['featured'];
                        $active=$row['active'];


                        ?>

                        <tr>
                            <td><?php echo  $id  ?></td>
                            <td><?php echo  $title  ?></td>
                            <td><?php echo  $description  ?></td>
                            <td><?php echo  $price  ?></td>
                            <td><?php 

                                if($image_name != "" )
                                {
                                    ?>
                                        <img src="../images/food/<?php echo $image_name ?>" width="150px" >
                                    <?php
                                }
                                else
                                {
                                        echo "image this food not found ";
                                }

                             ?></td>
                            <td><?php echo  $category_id  ?></td>
                            <td><?php echo  $featured  ?></td>
                            <td><?php echo  $active  ?></td>
                            <td>
                                <a href="update-food.php?id=<?php echo $id ;?>&img_name=<?php  echo $image_name ?>" class="btn-secondary">Update</a>
                                <a href="delete-food.php?id=<?php echo $id ;?>&img_name=<?php  echo $image_name ?> " class="btn-danger" onclick="return confirm('Are you sure you want to delete this Food?')" >Delete</a>
                            </td>
                        </tr>

                        <?php



                    }

                }
                else
                {
                    echo "FOOD NOT ADDED YET";
                }





                ?>

                    
                
            </table>
        </div> <!-- closing div for container -->
    </div>
</div>




<?php include('partials/footer.php')?>  