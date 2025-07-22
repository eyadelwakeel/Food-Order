<?php

include('../admin/config/constants.php');

session_destroy();

header('location:http://localhost/food-order/admin/login.php');