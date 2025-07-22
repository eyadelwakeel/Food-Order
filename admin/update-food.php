<?php
include('partials/menu.php');
?>

<div class="main-content">
    <div class="wrapper">
        <h1>UPDATE FOOD</h1>
        <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "SELECT * FROM tbl_food WHERE id=$id";
            $res = mysqli_query($con, $sql);
            $count = mysqli_num_rows($res);

            if ($count == 1) {
                $row = mysqli_fetch_assoc($res);
                $title = $row['title'];
                $description = $row['description'];
                $price = $row['price'];
                $current_image = $row['img_name'];
                $current_category_id = $row['category_id'];
                $featured = $row['featured'];
                $active = $row['active'];
            } else {
                $_SESSION['no-food-found'] = "No Food Found";
                header('Location: manage-food.php');
                exit();
            }
        } else {
            $_SESSION['no-food-found'] = "No Food Found";
            header('Location: manage-food.php');
            exit();
        }
        ?>
    </div>

    <form action="" method="post" enctype="multipart/form-data">
        <table class="tbl-30">
            <tr>
                <td>Title:</td>
                <td><input type="text" name="title" value="<?php echo $title; ?>"></td>
            </tr>
            <tr>
                <td>Description:</td>
                <td><textarea name="description" cols="30" rows="5"><?php echo $description; ?></textarea></td>
            </tr>
            <tr>
                <td>Price:</td>
                <td><input type="text" name="price" value="<?php echo $price; ?>"></td>
            </tr>
            <tr>
                <td>Current Image:</td>
                <td>
                    <?php
                    if ($current_image != "") {
                        echo '<img src="../images/food/' . $current_image . '" width="200px">';
                    } else {
                        echo "Image Not Added";
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td>New Image:</td>
                <td><input type="file" name="new_image"></td>
            </tr>
            <tr>
                <td>Category:</td>
                <td>
                    <select name="category">
                        <?php
                        $sql2 = "SELECT * FROM tbl_category WHERE active='Yes'";
                        $res2 = mysqli_query($con, $sql2);
                        $count2 = mysqli_num_rows($res2);

                        if ($count2 > 0) {
                            while ($row2 = mysqli_fetch_assoc($res2)) {
                                $category_id = $row2['id'];
                                $category_title = $row2['title'];
                                echo '<option value="' . $category_id . '"';
                                if ($current_category_id == $category_id) {
                                    echo ' selected';
                                }
                                echo '>' . $category_title . '</option>';
                            }
                        } else {
                            echo '<option value="0">No Category Found</option>';
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Featured:</td>
                <td>
                    <input <?php if ($featured == "Yes") echo "checked"; ?> type="radio" name="featured" value="Yes"> Yes
                    <input <?php if ($featured == "No") echo "checked"; ?> type="radio" name="featured" value="No"> No
                </td>
            </tr>
            <tr>
                <td>Active:</td>
                <td>
                    <input <?php if ($active == "Yes") echo "checked"; ?> type="radio" name="active" value="Yes"> Yes
                    <input <?php if ($active == "No") echo "checked"; ?> type="radio" name="active" value="No"> No
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="submit" name="submit" value="Update Food" class="btn-secondary">
                </td>
            </tr>
        </table>
    </form>

    <?php

    if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $current_image = $_POST['current_image'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $category = $_POST['category'];
        $featured = $_POST['featured'];
        $active = $_POST['active'];

        if (isset($_FILES['new_image']['name']) && $_FILES['new_image']['name'] != "") {
            $image_name = $_FILES['new_image']['name'];
            $ext = end(explode('.', $image_name));
            $image_name = "food_" . rand(10000, 11000) . '.' . $ext;

            $source_path = $_FILES['new_image']['tmp_name'];
            $destination_path = "../images/food/" . $image_name;

            $upload = move_uploaded_file($source_path, $destination_path);

            if ($upload == false) {
                $_SESSION['upload'] = 'Failed to upload image';
                header('Location: manage-food.php');
                exit();
            }

            if ($current_image != "") {
                $remove_path = "../images/food/" . $current_image;
                $remove = unlink($remove_path);

                if ($remove == false) {
                    $_SESSION['failed-remove'] = 'Failed to remove current image';
                    header('Location: manage-food.php');
                    exit();
                }
            }
        } else {
            $image_name = $current_image;
        }

        $sql4 = "UPDATE tbl_food SET
                title='$title',
                description='$description',
                img_name='$image_name',
                price='$price',
                category_id='$category',
                featured='$featured',
                active='$active'
                WHERE id=$id";

        $res4 = mysqli_query($con, $sql4);

        if ($res4 == true) {
            $_SESSION['update'] = "Food Updated Successfully";
            header('Location: manage-food.php');
        } else {
            $_SESSION['update-failed'] = "Food Update Failed";
            header('Location: manage-food.php');
        }
        exit();
    }
    ?>


</div>

<?php
include('partials/footer.php');
?>
