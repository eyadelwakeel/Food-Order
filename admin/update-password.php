<?php include('partials/menu.php') ;?>


<div class="main-content">
    <div class="wrapper">
        <h1>Change Password</h1>
        <?php 
        
        $id=$_GET['id'];


        
        ?>
        <form action="" method="post" >
            <table>
                <tr>
                    <td>Old Password:</td>
                    <td>
                        <input type="password" name="old_password" placeholder="old_password">
                    </td>
                </tr>
                <tr>
                    <td>New Password:</td>
                    <td>
                        <input type="password"  name="new_password" placeholder="New Password" >
                    </td>
                </tr>
                <tr>
                    <td>Confirm Password:</td>
                    <td>
                        <input type="password"  name="confirm_password" placeholder="Confirm Password" >
                    </td>
                <tr>
                    
                    <td>
                        <input type="hidden" name="id" value="<?php echo $id ?>" >
                        <input type="submit"  name="submit" value="change password" class="btn-secondary"  >
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php

    if(isset($_POST['submit'])){

        $id=$_POST['id'];
        $old_password=md5($_POST['old_password']);
        $new_password=md5($_POST['new_password']);
        $confirm_password=md5($_POST['confirm_password']);

        

        $sql="SELECT * FROM tbl_admin WHERE id='$id' AND password='$old_password'";
        $res=mysqli_query($con,$sql);

        if($res==true){
            $count=mysqli_num_rows($res);
            if($count==1){
                // $_SESSION['user-found']="User Found";
                // header("location:http://localhost/food-order/admin/manage-admin.php");
                if($new_password==$confirm_password){
                    //update the password
                    $sql2="UPDATE tbl_admin SET
                        password='$new_password' WHERE id='$id'
                     ";
                     $res2=mysqli_query($con,$sql2);
                     if($res2==true){
                        $_SESSION['change-pwd']="New Password Saved";
                header("location:http://localhost/food-order/admin/manage-admin.php");
                     }
                }else{
                    $_SESSION['Password-not-match']="Password not match";
                header("location:http://localhost/food-order/admin/manage-admin.php");
                }

            }else{
                $_SESSION['user-not-found']="User Not Found";
                header("location:http://localhost/food-order/admin/manage-admin.php");
            }
        }

    }

?>



<?php include('partials/footer.php') ;?>
