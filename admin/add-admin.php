<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <?php  
            if(isset($_SESSION['add'])){
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
        ?>
        <form method="post">
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" placeholder="Enter Your Name" name="full_name" autocomplete="off">
            </div>
            <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" placeholder="Enter Your Username" name="username" autocomplete="off">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control" placeholder="Enter Your Email" name="email" autocomplete="off">
            </div>
            <div class="form-group">
                <label>Mobile</label>
                <input type="text" class="form-control" placeholder="Enter Your Mobile" name="mobile" autocomplete="off">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" placeholder="Enter Your Password" name="password" autocomplete="off">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>
</div>

<?php
if(isset($_POST['submit'])){
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $sql = "INSERT INTO tbl_admin SET 
    full_name='$full_name',
    username='$username',
    password='$password'";

    $result = mysqli_query($con, $sql);
    if($result == true){
        $_SESSION['add'] = "Success to add admin";
        header("location:http://localhost/food-order/admin/manage-admin.php");
    }else{
        $_SESSION['add'] = "Failed to add admin";
        header("location:http://localhost/food-order/admin/add-admin.php");
    }
}
?>

<?php include('partials/footer.php'); ?>
