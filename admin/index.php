<?php 

include('partials/menu.php')

?>

        <!-- main content section start -->
        <div class="main-content">
            <div class="wrapper">
                <h1>DASHBORD</h1><br><br><br>
                <?php
                if(isset($_SESSION['login'])){
                echo $_SESSION['login'];
                unset($_SESSION['login']);
                
            }
            ?><br><br><br>
                <div class="col-4 text-center">
                    <?php

                    $sql1="SELECT * FROM tbl_category";
                    $res1=mysqli_query($con,$sql1);
                    $count1=mysqli_num_rows($res1);

                    ?>

                    <H1><?php  echo $count1 ?></H1>
                    Category
                </div>
                <div class="col-4 text-center">

                    <?php

                        $sql2="SELECT * FROM tbl_food";
                        $res2=mysqli_query($con,$sql2);
                        $count2=mysqli_num_rows($res2);

                    ?>
                    <H1><?php  echo $count2 ?></H1>
                    Foods
                </div>
                <div class="col-4 text-center">

                    <?php

                        $sql3="SELECT * FROM tbl_order";
                        $res3=mysqli_query($con,$sql3);
                        $count3=mysqli_num_rows($res3);

                    ?>

                    <H1><?php echo $count3 ?></H1>
                    Total Orders
                </div>
                <div class="col-4 text-center">
                    <?php

                        $sql4="SELECT SUM(total) As Total FROM tbl_order WHERE status='Delivered' ";
                        $res4=mysqli_query($con,$sql4);
                        $row4=mysqli_fetch_assoc($res4);
                        $total_revenue=$row4['Total'];

                    ?>

                    <H1>$<?php echo $total_revenue;  ?></H1>
                    Revenue Generated
                </div>
               
            </div>
        </div>
        <!-- main content section end -->
        
        <?php include('partials/footer.php')?>