<?php 
include_once('./includes/header.php');
include_once('../middleware/adminMiddleware.php');

?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Categories</h5>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Status</th> 
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           <?php
                           $category = getAll("categories");
                           if (mysqli_num_rows($category)>0) 
                           {
                            foreach ($category as $item) {
                                ?>
                                 <tr>
                                    <td><?=$item['id'];?></td>
                                    <td><?=$item['name'];?></td>
                                    <td>
                                        <img src="../uploads/<?=$item['image'];?>" alt="<?=$item['name'];?>" >
                                    </td>
                                    <td>
                                    <?=$item['status']=='0'?"visiable":"hidden"?>
                                    </td>
                                    <td>
                                        <a href="edit_category.php?id=<?=$item['id'];?>" class="btn btn-primary">Edit</a>
                                        <form action="../functions/add_category_data.php" method="post">
                                            <input type="hidden" name="category_id" value="<?=$item['id'];?>">
                                            <button type="submit" class="btn btn-primary" name="delete_category_btn">Delete</button>
                                        </form>
                                    </td>
                                 </tr>
                                <?php  
                            }
                           }
                           else
                           {
                            echo "No file recored";
                           }
                          ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



<?php
include_once('./includes/footer.php');

?>