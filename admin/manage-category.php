<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">


<?php include('partials/menu.php') ?>





<div class="main-content">
    <div class="weapper">
    <h1>Manage Category</h1><br><br>
    <?php

    if(isset($_SESSION['add-category'])){
        echo $_SESSION['add-category'];
        unset($_SESSION['add-category']);
    }
    if(isset($_SESSION['remove'])){
        echo $_SESSION['remove'];
        unset($_SESSION['remove']);
    }
    if(isset($_SESSION['deletet-done'])){
        echo $_SESSION['deletet-done'];
        unset($_SESSION['deletet-done']);
    }
    if(isset($_SESSION['deletet-not-done'])){
        echo $_SESSION['deletet-not-done'];
        unset($_SESSION['deletet-not-done']);
    }
    if(isset($_SESSION['upload'])){
        echo $_SESSION['upload'];
        unset($_SESSION['upload']);
    }
    if(isset($_SESSION['no-category-found'])){
        echo $_SESSION['no-category-found'];
        unset($_SESSION['no-category-found']);
    }
    if(isset($_SESSION['update'])){
        echo $_SESSION['update'];
        unset($_SESSION['update']);
        
    }
    if(isset($_SESSION['update-failed'])){
        echo $_SESSION['update-failed'];
        unset($_SESSION['update-failed']);
    }
    if(isset($_SESSION['failed-remove'])){
        echo $_SESSION['failed-remove'];
        unset($_SESSION['failed-remove']);
    }

    ?>
    <div class="container">
            <button class="btn btn-primary my-5">
                <a href="add-category.php" class="text-light">Add Category</a>
            </button>
            <table class="table">
                
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">Image</th>
                        <th scope="col">Featured</th>
                        <th scope="col">Active</th>
                        <th scope="col">Action</th>
                    </tr>
                
                
                    <?php

                        $sql="SELECT * FROM tbl_category ";
                        $res=mysqli_query($con,$sql) ;
                        $count=mysqli_num_rows($res);

                        if($count>0){
                            while($row=mysqli_fetch_array($res)){
                                $id=$row['id'];
                                $title=$row['title'];
                                $img_name=$row['img_name'];
                                $featured=$row['featured'];
                                $active=$row['active'];


                                ?>

                                        <tr>
                                            <td><?php echo $id ?></td>
                                            <td><?php echo $title ?></td>
                                            <td><?php 

                                                if($img_name!=""){
                                                       ?>
                                                       <img src="../images/category/<?php echo $img_name ?>" width="150px" >
                                                       <?php
                                                }else{
                                                    echo "image this category not found";
                                                }

                                             ?></td>
                                            <td><?php echo $featured ?></td>
                                            <td><?php echo $active  ?></td>
                                            <td>
                                                <a href="update-category.php?id=<?php echo $id; ?>&img_name=<?php echo $img_name ; ?>" class="btn-secondary">Update Category</a>
                                                <a href="delete-category.php?id=<?php echo $id; ?>&img_name=<?php echo $img_name ; ?>" class="btn-danger" onclick="return confirm('Are you sure you want to delete this Category?')" >Delete Category</a>
                                            </td>
                                        </tr>


                                <?php




                            }
                        }
                        else{
                            echo "CATEGORY NOT ADDED YET";
                        }


                    ?>
                    
                    
                
            </table>
        </div> <!-- closing div for container -->
    </div>
</div>





<?php include('partials/footer.php')?>  