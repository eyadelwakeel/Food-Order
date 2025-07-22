<?php
include ('partials-front/menu.php');
?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <form action="food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->
     <?php

        if(isset($_SESSION['order']))
        {
            echo $_SESSION['order'];
            unset($_SESSION['order']);
        }

    ?>

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>

            <?php

                //get categories from data base

                $sql ="SELECT * FROM tbl_category";

                $res=mysqli_query($con,$sql);

                $count=mysqli_num_rows($res);

                if($count>0)
                {
                    while($row=mysqli_fetch_array($res))
                    {
                        $id=$row['id'];
                        $title=$row['title'];
                        $image_name=$row['img_name'];
                        $featured=$row['featured'];
                        $active=$row['active'];
                    
                    
                        ?>

                        <a href="category-foods.php?category_id=<?php echo $id; ?>">
                        <div class="box-3 float-container">

                        <?php

                            if($image_name=="")
                            {
                                echo "Image Not Available";
                            }
                            else
                            {
                                ?>
                                    
                                    <img src="images/category/<?php echo $image_name ?>" alt="Pizza" class="img-responsive img-curve" style="width: 90%; height: auto;">

                                <?php

                            }

                        ?>

    
                        <h3 class="float-text text-white"><?php  echo $title; ?></h3>
                        </div>
                        </a>
    
                        <?php
                    }

                    

                }
                else
                {

                }

            ?>

            

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>


            <?php

                $sql2= "SELECT * FROM tbl_food WHERE active='Yes' ";

                $res2=mysqli_query($con,$sql2);

                $count2=mysqli_num_rows($res2);

                if($count2>0)
                {
                    while($row=mysqli_fetch_assoc($res2))
                    {
                        $id=$row['id'];
                        $title=$row['title'];
                        $description=$row['description'];
                        $price=$row['price'];
                        $imge_f_name=$row['img_name'];
                        $category_id=$row['category_id'];
                        $featured=$row['featured'];
                        $active=$row['active'];

                        
                        ?>
                            <div class="food-menu-box">
                            <div class="food-menu-img">
                                <?php
                                    if($imge_f_name=="")
                                    {
                                        echo "Image Not Found ";
                                    }
                                    else
                                    {
                                        ?>
                                        <img src="images/food/<?php echo $imge_f_name ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                                        <?php
                                    }
                                ?>
                            </div>

                            <div class="food-menu-desc">
                                <h4><?php echo $title ; ?></h4>
                                <p class="food-price"><?php echo $price;   ?></p>
                                <p class="food-detail">
                                <?php  echo $description;  ?>
                                </p>
                                <br>

                                <a href="order.php?food_id=<?php echo $id ?>" class="btn btn-primary">Order Now</a>
                                </div>
                                </div>

                        <?php
                        
                    }

                }


            ?>

            

        
            


            <div class="clearfix"></div>

            

        </div>

        <p class="text-center">
            <a href="#">See All Foods</a>
        </p>
    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php
    include('partials-front/footer.php')
    ?>