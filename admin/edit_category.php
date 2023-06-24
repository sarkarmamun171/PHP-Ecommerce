<?php
include_once('./includes/header.php');
include_once('../middleware/adminMiddleware.php');
// include_once('../functions/myfunctions.php');
?>

<div class="container">
    <div class="row">
        <div class="com-md-12">
            <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $category = getByID("categories",$id);
                if (mysqli_num_rows($category)>0) {
                    $data = mysqli_fetch_array($category);
                    ?>
                    <div class="card">
                        <div class="card-header">
                            <h5>Edit Category</h5>
                        </div>
                        <div class="card-body">
                            <form action="../functions/add_category_data.php" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="hidden" name="category_id" value="<?=$data['id']?>">
                                    <label for="">Name</label>
                                    <input type="text" class="form-control" name="name" value="<?=$data['name']?>" placeholder="Enter your name">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Slum</label>
                                    <input type="text" class="form-control" name="slug" value="<?=$data['slug']?>" placeholder="Enter your slug">
                                </div>
                                <div class="col-md-12">
                                    <label for="">Descrption</label>
                                <textarea name="description" rows="3" class="form-control"  placeholder="Enter description"><?=$data['description']?></textarea>
                                </div>
                                <div class="col-md-12">
                                    <label for="">Upload Image</label>
                                    <input type="file" class="form-control" name="image"  placeholder="Enter your image">
                                    <label for="">Current Image</label>
                                    <input type="hidden" name="old_image" value="<?=$data['image']?>">
                                    <img src="../uploads/<?=$data['image']?>" height="50px" width="50px" alt="" srcset="">

                                </div>
                                <div class="col-md-12">
                                    <label for="">Meta Title</label>
                                    <input type="text" class="form-control" name="meta_title" value="<?=$data['meta_title']?>" placeholder="Enter Meta Title">
                                </div>
                                <div class="col-md-12">
                                    <label for="">Meta Description</label>
                                    <textarea name="meta_description" rows="3" class="form-control" placeholder="Enter Meta Description"><?=$data['meta_description']?></textarea>
                                </div>
                                <div class="col-md-12">
                                    <label for="">Meta Keywords</label>
                                    <textarea name="meta_keys" rows="3" class="form-control" placeholder="Enter Meta Keywords"><?=$data['meta_keys']?></textarea>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Status</label>
                                    <input type="checkbox" name="status" <?=$data['status']?"checked":""?>>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Popular</label>
                                    <input type="checkbox" name="popular" <?=$data['popular']?"checked":""?>>
                                </div>
                                <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" name="update_category_btn">Update</button>
                                </div>

                            </div>
                            </form>
                        </div>
                    </div>

                    <?php
                }else{
                    echo "Category not found";
                }
            }
            else
            {
                echo "ID missing from URL";
            }
            ?>
        </div>
    </div>
</div>