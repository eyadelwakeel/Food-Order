

<?php
include 'admin/config/constants.php'
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- Navbar Section Starts Here -->
    <section class="navbar">
        <div class="container">
            <div class="logo">
                <a href="http://localhost/food-order/" title="Logo">
                    <img src="images/logo.png" alt="Restaurant Logo" class="img-responsive">
                </a>
            </div>

            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="http://localhost/food-order/">Home</a>
                    </li>
                    <li>
                        <a href="http://localhost/food-order/categories.php">Categories</a>
                    </li>
                    <li>
                        <a href="http://localhost/food-order/foods.php">Foods</a>
                    </li>
                    <li>
                        <a href="../make-order.php">Make Order</a>
                    </li>
                    <li>
                        <a href="http://localhost/food-order/admin/login.php">Contact</a>
                    </li>
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Navbar Section Ends Here -->