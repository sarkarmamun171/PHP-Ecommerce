<?php
include_once('./includes/header.php');
include_once('../middleware/adminMiddleware.php');
// include_once('../functions/myfunctions.php');
?>

<div class="container">
    <div class="row">
        <div class="com-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Add Product</h5>
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
                                    if (mysqli_num_rows($categories)>0) {
                                      foreach ($categories as $item) {
                                        ?>
                                        <option value="<?=$item['id'];?>"><?=$item['name'];?></option>
                                        <?php 
                                      }
                                    }
                                    else {
                                        echo "No category avilable";
                                    }
                                    
                                    ?> 
                                    <option value="1">One</option>
                                   
                                </select>

                            </div>
                            <div class="col-md-6">
                                <label for="">Name</label>
                                <input type="text" required class="form-control" name="name" placeholder="Enter your name">
                            </div>
                            <div class="col-md-6">
                                <label for="">Slum</label>
                                <input type="text" required class="form-control" name="slug" placeholder="Enter your slug">
                            </div>
                            <div class="col-md-12">
                                <label for="">Small Descrption</label>
                                <textarea name="small_description" required rows="3" class="form-control" placeholder="Enter description"></textarea>
                            </div>
                            <div class="col-md-12">
                                <label for="">Descrption</label>
                                <textarea name="description" required rows="3" class="form-control" placeholder="Enter description"></textarea>
                            </div>
                            <div class="col-md-6">
                                <label for="">Original Price</label>
                                <input type="number" required class="form-control" name="original_price" placeholder="Enter Original Price">
                            </div>
                            <div class="col-md-6">
                                <label for="">Selling Price</label>
                                <input type="number" required class="form-control" name="selling_price" placeholder="Enter Selling Price">
                            </div>
                            <div class="col-md-6">
                                <label for="">Quantity</label>
                                <input type="number" required class="form-control" name="qty" placeholder="Enter Quantity">
                            </div>
                            <div class="col-md-12">
                                <label for="">Upload Image</label>
                                <input type="file" required class="form-control" name="image" placeholder="Enter your image">
                            </div>
                            <div class="col-md-12">
                                <label for="">Meta Title</label>
                                <input type="text" required class="form-control" name="meta_title" placeholder="Enter Meta Title">
                            </div>
                            <div class="col-md-12">
                                <label for="">Meta Description</label>
                                <textarea name="meta_description" required rows="3" class="form-control" placeholder="Enter Meta Description"></textarea>
                            </div>
                            <div class="col-md-12">
                                <label for="">Meta Keywords</label>
                                <textarea name="meta_keywords" required rows="3" class="form-control" placeholder="Enter Meta Keywords"></textarea>
                            </div>
                            <!-- <div class="col-md-12">
                                <label for="">Meta Title</label>
                                <input type="text" class="form-control" name="meta_title" placeholder="Enter Meta Title">
                            </div> -->

                            <div class="col-md-6">
                                    <label for="">Status</label>
                                    <input type="checkbox" name="status">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Trending</label>
                                    <input type="checkbox" name="trending">
                                </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary my-3" name="add_product_btn">Save</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>