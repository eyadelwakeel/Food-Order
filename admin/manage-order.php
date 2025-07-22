<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">


<?php include('partials/menu.php') ?>



<div class="main-content">
    <div class="weapper">
    <h1>Manage Order</h1>

    <?php
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
        if(isset($_SESSION['no-category-found']))
        {
            echo $_SESSION['no-category-found'];
            unset($_SESSION['no-category-found']);
        }
    ?>
    <div class="container">
            
            <table class="table">
                <thead>
                    <tr>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">food</th>
                        <th scope="col">price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">total</th>
                        <th scope="col">order_date</th>
                        <th scope="col">status</th>
                        <th scope="col">customer_name</th>
                        <th scope="col">customer_contact</th>
                        <th scope="col">customer_email</th>
                        <th scope="col">customer_address</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </tr>
                </thead>
                <tbody>



                                <?php

                                    $sql="SELECT * FROM tbl_order";

                                    $res=mysqli_query($con,$sql);

                                    $count=mysqli_num_rows($res);

                                    if($count>0)
                                    {
                                        while($row=mysqli_fetch_assoc($res))
                                        {
                                            $id=$row['id'];
                                            $food=$row['food'];
                                            $price=$row['price'];
                                            $qty=$row['qty'];
                                            $total=$row['total'];
                                            $order_date=$row['order_date'];
                                            $status=$row['status'];
                                            $customer_name=$row['customer_name'];
                                            $customer_contact=$row['customer_contact'];
                                            $customer_email=$row['customer_email'];
                                            $customer_address=$row['customer_address'];
                                        
                                            ?>
                                                        <tr>
                                                            <td><?php  echo $id ; ?></td>
                                                            <td><?php  echo $food ; ?></td>
                                                            <td><?php  echo $price ; ?></td>
                                                            <td><?php  echo $qty ; ?></td>
                                                            <td><?php  echo $total ; ?></td>
                                                            <td><?php  echo $order_date ; ?></td>
                                                            <!-- <td><?php  echo $status ; ?></td> -->
                                                            <td>
                                                                <?php  
                                                                    if($status=="under construction")
                                                                    {
                                                                        echo "<label style='color:blue' >$status</label>";
                                                                    }
                                                                    elseif($status=="on Delivery")
                                                                    {
                                                                        echo "<label style='color:orange' >$status</label>";
                                                                    }
                                                                    elseif($status=="Delivered")
                                                                    {
                                                                        echo "<label style='color:green' >$status</label>";
                                                                    }
                                                                    elseif($status=="Cancelled")
                                                                    {
                                                                        echo "<label style='color:red' >$status</label>";
                                                                    }
                                                            
                                                                ?>
                                                            </td>
                                                            <td><?php  echo $customer_name ; ?></td>
                                                            <td><?php  echo $customer_contact ; ?></td>
                                                            <td><?php  echo $customer_email ; ?></td>
                                                            <td><?php  echo $customer_address ; ?></td>
                                                            
                                                            <td>
                                                                <a href="update-order.php?id=<?php echo $id ?>" class="btn-secondary">Update</a>
                                                                <a href="delete-order.php?id=<?php echo $id ?>" class="btn-danger" onclick="return confirm('Are you sure you want to delete this order?')">Delete</a>
                                                                </td>
                                                        </tr>
                                            <?php
                                        
                                        }
                                    }


                                ?>


                    
                </tbody>
            </table>
        </div> <!-- closing div for container -->
    </div>
</div>




<?php include('partials/footer.php')?>  