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
                $product = getByID("products", $id);

                if (mysqli_num_rows($product) > 0) {
                    $data = mysqli_fetch_array($product);
            ?>
                    <div class="card">
                        <div class="card-header">
                            <h5>Edit Product</h5>
                        </div>
                        <div class="card-body">
                            <form action="../functions/add_category_data.php" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="mb-0">Select Category</label>
                                        <select name="category_id" class="form-select mb-2">
                                            <option selected>Select Category</option>
                                            <?php
                                            $categories = getAll("categories");
                                            if (mysqli_num_rows($categories) > 0) {
                                                foreach ($categories as $item) {
                                            ?>
                                                    <option value="<?= $item['id']; ?>" <?= $data['category_id'] == $item['id'] ? 'selected' : '' ?>> <?= $item['name']; ?></option>
                                            <?php
                                                }
                                            } else {
                                                echo "No category avilable";
                                            }

                                            ?>
                                            <option value="1">One</option>
                                        </select>
                                    </div>
                                    <input type="hidden" name="product_id" value="<?=$data['id'];?>">
                                    <div class="col-md-6">
                                        <label for="">Name</label>
                                        <input type="text" required class="form-control" name="name" value="<?= $data['name']; ?>" placeholder="Enter your name">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Slum</label>
                                        <input type="text" required class="form-control" name="slug" value="<?= $data['slug']; ?>" placeholder="Enter your slug">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="">Small Descrption</label>
                                        <textarea name="small_description" required rows="3" class="form-control" placeholder="Enter description"><?= $data['small_description']; ?></textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="">Descrption</label>
                                        <textarea name="description" required rows="3" value="<?= $data['description']; ?>" class="form-control" placeholder="Enter description"><?= $data['description']; ?></textarea>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Original Price</label>
                                        <input type="number" required class="form-control" value="<?= $data['original_price']; ?>" name="original_price" placeholder="Enter Original Price">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Selling Price</label>
                                        <input type="number" required class="form-control" value="<?= $data['selling_price']; ?>" name="selling_price" placeholder="Enter Selling Price">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Quantity</label>
                                        <input type="number" required class="form-control" value="<?= $data['qty']; ?>" name="qty" placeholder="Enter Quantity">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="">Upload Image</label>
                                        <input type="file" class="form-control" value="<?= $data['image']; ?>" name="image" placeholder="Enter your image">
                                        <label for="">Current Image</label>
                                        <input type="hidden" name="old_image" value="<?= $data['image'] ?>">
                                        <img src="../uploads/<?= $data['image'] ?>" height="50px" width="50px" alt="" srcset="">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="">Meta Title</label>
                                        <input type="text" required class="form-control" value="<?= $data['meta_title']; ?>" name="meta_title" placeholder="Enter Meta Title">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="">Meta Description</label>
                                        <textarea name="meta_description" required rows="3" class="form-control" placeholder="Enter Meta Description"><?= $data['meta_description'];?></textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="">Meta Keywords</label>
                                        <textarea name="meta_keywords" required rows="3" class="form-control" placeholder="Enter Meta Keywords"><?= $data['meta_keywords'];?></textarea>
                                    </div>
                                    <!-- <div class="col-md-12">
                                        <label for="">Meta Title</label>
                                        <input type="text" class="form-control" name="meta_title" placeholder="Enter Meta Title">
                                    </div> -->

                                    <div class="col-md-6">
                                        <label for="">Status</label>
                                        <input type="checkbox" name="status" <?=$data['status']=='0'?'':'checked'?>>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Trending</label>
                                        <input type="checkbox" name="trending" <?=$data['trending']=='0'?'':'checked'?>>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary my-3" name="update_product_btn">Update</button>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
            <?php
                } else {
                    echo "Product not found";
                }
            } else {
                echo "Id missing from URL";
            }
            ?>
        </div>
    </div>
</div>