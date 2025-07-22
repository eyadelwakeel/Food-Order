<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Order</h1><br><br>

        <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $sql = "SELECT * FROM tbl_order WHERE id=$id";

            $res = mysqli_query($con, $sql);

            $count = mysqli_num_rows($res);

            if ($count == 1) {
                $row = mysqli_fetch_assoc($res);

                $id = $row['id'];
                $food = $row['food'];
                $price = $row['price'];
                $qty = $row['qty'];
                $total = $row['total'];
                $order_date = $row['order_date'];
                $status = $row['status'];
                $customer_name = $row['customer_name'];
                $customer_contact = $row['customer_contact'];
                $customer_email = $row['customer_email'];
                $customer_address = $row['customer_address'];
                $sale=$row['sale'];
                
                }
                else {
                $_SESSION['no-category-found'] = "Not Category Found";
                header('location:http://localhost/food-order/admin/manage-category.php');
                exit(); // لازم يكون فيه خروج هنا بعد استدعاء دالة الهيدر
                }
                } 
        else 
        {
            $_SESSION['no-category-found'] = "Not Category Found";
            header('location:http://localhost/food-order/admin/manage-category.php');
            exit(); 
        }

        ?>

        <form action="" method="post">
            <table class="tbl-30">
                <tr>
                    <td>Food Name</td>
                    <td><b><?php echo $food ?></b></td>
                </tr>

                <tr>
                    <td>Price</td>
                    <td><b><?php echo $price ?></b></td>
                </tr>

                <tr>
                    <td>Quantity</td>
                    <td>
                        <input type="number" name="qty" value="<?php echo $qty ?>">
                    </td>
                </tr>

                <tr>
                    <td>Total</td>
                    <td><b><?php echo $total ?></b></td>
                </tr>

                <tr>
                    <td>Status</td>
                    <td>
                        <select name="status">
                            <option <?php if ($status == "under construction") {
                                        echo "selected";
                                    } ?> value="under construction">under construction</option>
                            <option <?php if ($status == "on Delivery") {
                                        echo "selected";
                                    } ?> value="on Delivery">on Delivery</option>
                            <option <?php if ($status == "Delivered") {
                                        echo "selected";
                                    } ?> value="Delivered">Delivered</option>
                            <option <?php if ($status == "Cancelled") {
                                        echo "selected";
                                    } ?> value="Cancelled">Cancelled</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Customer Name</td>
                    <td>
                        <input type="text" name="customer_name" value="<?php echo $customer_name; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Customer Contact</td>
                    <td>
                        <input type="text" name="customer_contact" value="<?php echo $customer_contact; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Customer Email</td>
                    <td>
                        <input type="text" name="customer_email" value="<?php echo  $customer_email; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Customer Address</td>
                    <td>
                        <textarea name="customer_address" cols="30" rows="5"><?php echo $customer_address; ?></textarea>
                    </td>
                </tr>

                <tr>
                    <td>ٍSale(%)</td>
                    <td>
                        <input type="number" name="sale" value="<?php echo  $sale; ?>" placeholder="Sale Ex: 10%">%
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="price" value="<?php echo $price; ?>">

                        <input type="submit" name="submit" value="update order" class="btn-secondary">
                    </td>
                    <td></td>
                </tr>
            </table>
        </form>

        <?php
        if (isset($_POST['submit'])) {
            $id = $_POST['id'];
            $price = $_POST['price'];
            $quantity = $_POST['qty'];
            $status = $_POST['status'];
            $customer_name = $_POST['customer_name'];
            $customer_contact = $_POST['customer_contact'];
            $customer_email = $_POST['customer_email'];
            $customer_address = $_POST['customer_address'];
            $sale = $_POST['sale'];

            if ($sale != "") {
                $total = ($price * $quantity) * (1 - ($sale / 100));
            } else {
                $total = ($price * $quantity);
            }


            $sql3 = "UPDATE `tbl_order` SET
                `qty`='$quantity',
                `status`='$status',
                `total`='$total',
                `customer_name`='$customer_name',
                `customer_contact`='$customer_contact',
                `customer_email`='$customer_email',
                `customer_address`='$customer_address',
                `sale`='$sale'
                WHERE `id`='$id'
            ";

            $res3 = mysqli_query($con, $sql3);

            if ($res3 == true) {
                $_SESSION['update'] = "<label style='color:blue'>Order Updated Successfully</label>";
                header('location:http://localhost/food-order/admin/manage-order.php');
                exit(); 
            } else {
                $_SESSION['update-failed'] = "<label style='color:red'>Order Update Failed</label>";
                header('location:http://localhost/food-order/admin/manage-order.php');
                exit(); 
            }
        }
        ?>
    </div>
</div>
