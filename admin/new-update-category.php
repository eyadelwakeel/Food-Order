<?php
include ('partials/menu.php');?>

<div class="main-content">
    <div class="wrapper">
    <h1>Update Category</h1><br><br>

    <form action="" method="Post" enctype="multipart/form-data">
            <table class="tbl-30">
            <tr>
                            <td>Title:</td>
                                    <td>
                                        <input type="text" name="title" placeholder="<?php echo $title  ?>">
                                    </td>
                            </tr>

                            <tr>
                                    <td>Current Image:</td><br><br>
                                    <td>
                                    
                                            <?php 

                                                if($current_image != "")
                                                {
                                                    ?>
                                                        <img src="../images/category/<?php echo $current_image ?>" width="200px" >
                                                    <?php

                                                }
                                                else
                                                {
                                                    echo "Image Not Added";
                                                }

                                            ?>
                                        
                                        
                                    </td>
                            </tr>

                            <tr>
                                    <td>new Image:</td>
                                    <td>
                                        <input type="file" name="image" >
                                    </td>
                            </tr>

                            <tr>
                                <td>Featured:</td>
                                <td>
                                    <input <?php if($featured=="yes"){echo "checked";} ?> type="radio" name="featured" value="yes">Yes
                                    <input <?php if($featured=="no"){echo "checked";} ?> type="radio" name="featured" value="no">no
                                </td>
                            </tr>

                            <tr>
                                <td>Active:</td>
                                <td>
                                    <input <?php if($active=="yes"){echo "checked";} ?> type="radio" name="active" value="yes" >yes
                                    <input <?php if($active=="no"){echo "checked";} ?> type="radio" name="active" value="no" >no
                                </td>
                            </tr>

                            <tr>
                    <td colspan="2">
                        
                        <input type="submit" name="submit" value="Update Category" class="btn-secondary" >
                    </td>
                </tr>
            </table>
    </form>



    </div>
</div>