<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

<?php 
include('partials/menu.php');
?>

<!-- main content section start -->
<div class="main-content">
    <div class="wrapper">
        <h1>Manage Admin</h1>
        <?php  
        
            if(isset($_SESSION['add'])){
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
            if(isset($_SESSION['deleted'])){
                echo $_SESSION['deleted'];
                unset($_SESSION['deleted']);
            }
            if(isset($_SESSION['update'])){
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }
            if(isset($_SESSION['user-found'])){
                echo $_SESSION['user-found'];
                unset($_SESSION['user-found']);
            }
            if(isset($_SESSION['user-not-found'])){
                echo $_SESSION['user-not-found'];
                unset($_SESSION['user-not-found']);
            }
            if(isset($_SESSION['Password-not-match'])){
                echo $_SESSION['Password-not-match'];
                unset($_SESSION['Password-not-match']);
            }
            if(isset($_SESSION['change-pwd'])){
                echo $_SESSION['change-pwd'];
                unset($_SESSION['change-pwd']);
            }
            if(isset($_SESSION['login'])){
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }
            if(isset($_SESSION['login-failed'])){
                echo $_SESSION['login-failed'];
                unset($_SESSION['login-failed']);
            }

        
        ?>
        <div class="container">
            <button class="btn btn-primary my-5">
                <a href="add-admin.php" class="text-light">Add Admin</a>
            </button>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">User Name</th>
                        <th scope="col">Operation</th>
                    </tr>
                </thead>
                <?php
                
                $sql="SELECT * FROM tbl_admin";
                $res=mysqli_query($con,$sql);
                
                if($res==true){
                    
                    $count=mysqli_num_rows($res);

                    if($count>0){
                        while($rows=mysqli_fetch_assoc($res))
                    {
                        $id=$rows['id'];
                        $full_name=$rows['full_name'];
                        $username=$rows['username'];

                        ?>

                    <tbody>
                        <tr>
                            <td><?php  echo $id   ?></td>
                            <td><?php  echo $full_name   ?></td>
                            <td><?php  echo $username   ?></td>
                            <td>
                                <a href="update-password.php?id=<?php echo $id ?>" class="btn-primary" >Change Password</a>
                                <a href="update-admin.php?id=<?php echo $id ?>" class="btn-secondary">Update</a>
                                <a href="delete-admin.php?id=<?php echo $id ?>" class="btn-danger" onclick="return confirm('Are you sure you want to delete this Admin?')" >Delete</a>
                            </td>
                        </tr>
                </tbody>


                    
                        <?php
                    }
                    }
                    
                }
                ?>
                
            </table>
        </div> <!-- closing div for container -->
    </div> <!-- closing div for wrapper -->
</div> <!-- closing div for main-content -->

<?php include('partials/footer.php'); ?>
