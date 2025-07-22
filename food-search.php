<?php
include ('partials-front/menu.php');
?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
        <?php
            $search=$_POST['search'];

        ?>
            <h2>Foods on Your Search <a href="#" class="text-white"><?php  echo $search ?></a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
                <?php
                    //Get The Search Keyword

                    

                    //SQL Query to get foods based on search keywords
                    $sql="SELECT * FROM tbl_food WHERE title LIKE '%$search%' OR description LIKE '%$search%' ";

                    $res=mysqli_query($con,$sql);

                    $count=mysqli_num_rows($res);

                    if($count>0)
                    {
                        while($row=mysqli_fetch_assoc($res))
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
                                        <h4><?php   echo $title  ?></h4>
                                        <p class="food-price"><?php echo $price   ?></p>
                                        <p class="food-detail">
                                            <?php  echo $description  ?>
                                        </p>
                                        <br>

                                        <a href="order.php?food_id=<?php echo $id ?>" class="btn btn-primary">Order Now</a>
                                    </div>
                                </div>

                            <?php

                        }
                    }
                    else
                    {
                        echo "Food Not Found";
                    }

                ?>
            

            


            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php
include ('partials-front/footer.php');
?>