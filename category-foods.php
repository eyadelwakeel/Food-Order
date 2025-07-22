<?php
include ('partials-front/menu.php');
?>

<?php

if(isset($_GET['category_id']))
{
    $category_id=$_GET['category_id'];

    $sql="SELECT title FROM tbl_category WHERE id=$category_id";

    $res=mysqli_query($con,$sql);

    $row=mysqli_fetch_assoc($res);

    $category_title=$row['title'];

}
else
{
    header('location: http://localhost/food-order/');
    exit;
}


?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <h2>Foods on <a href="#" class="text-white"><?php   echo $category_title;   ?></a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php

                $sql2="SELECT * FROM tbl_food WHERE category_id=$category_id";

                $res2=mysqli_query($con,$sql2);

                $count2=mysqli_num_rows($res2);

                if($count2>0)
                {
                    while($row2=mysqli_fetch_assoc($res2))
                    {
                        $id=$row2['id'];
                        $title=$row2['title'];
                        $description=$row2['description'];
                        $price=$row2['price'];
                        $imge_f_name=$row2['img_name'];
                        $category_id=$row2['category_id'];
                        $featured=$row2['featured'];
                        $active=$row2['active'];

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
                                <h4><?php echo $title  ?></h4>
                                <p class="food-price"><?php echo $price  ?></p>
                                <p class="food-detail">
                                <?php echo $description  ?>
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
                    echo "Food Not Avilable";
                }


            ?>

            

            
            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php
include ('partials-front/footer.php');
?>