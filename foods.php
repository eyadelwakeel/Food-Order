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



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>


            <?php

                $sql2= "SELECT * FROM tbl_food WHERE active = 'YES' ";

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
include ('partials-front/footer.php');
?>