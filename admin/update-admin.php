<?php include ("partials/menu.php");?>





<div class="main-content">
    <h1>Update Admin</h1>
</div>
<?php

$id=$_GET['id'];

$sql="SELECT * FROM tbl_admin WHERE id=$id";

$res=mysqli_query($con,$sql);

if($res==true){
   $count=mysqli_num_rows($res);
   if($count==1){
        $row=mysqli_fetch_array($res);
        $full_name=$row['full_name'];
        $username=$row['username'];
}else{
    header("location:http://localhost/food-order/admin/manage-admin.php");
   }
}

?>


<div class="container my-5">
    <form method="post">
  <div class="form-group">
    <label>Name :</label>
    <input type="text" class="form-control" placeholder="Enter Your Name" name="full_name" autocomplete="off" value=<?php echo $full_name; ?> >
    <input type="hidden" name="id" value="<?php  echo $id  ?>" >

  <div class="form-group">
    <label>Username:</label>
    <input type="text" class="form-control" placeholder="Enter Your Email" name="username" autocomplete="off" value=<?php echo $username; ?>>
    
  <div class="form-group">
    <label>Mobile</label>
    <input type="text" class="form-control" placeholder="Enter Your Mobile" name="mobile" autocomplete="off" value="">
    
  </div>
  <div class="form-group">
    <label>Password</label>
    <input type="password" class="form-control" placeholder="Enter Your Password" name="password" autocomplete="off" value="">
    
  </div>
  
  <button type="submit" class="btn btn-primary" name="submit" >Update</button>
</form>
    </div>

<?php
if(isset($_POST['submit'])){

    $id=$_POST['id'];
    $full_name=$_POST['full_name'];
    $username=$_POST['username'];

  $sql ="UPDATE tbl_admin SET 
    full_name = '$full_name',
    username='$username'
    WHERE id='$id' ";
    $res=mysqli_query($con,$sql);
    if($res=true){
      $_SESSION['update']="Admin Updated Succecfuly";
      header("location:http://localhost/food-order/admin/manage-admin.php");

    }else{

      $_SESSION['update']="Admin Not Updated Succecfuly";

      header("location:http://localhost/food-order/admin/manage-admin.php");

      }}
?>



<?php include ("partials/footer.php") ?>