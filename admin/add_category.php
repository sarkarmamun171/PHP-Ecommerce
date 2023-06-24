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
                    <h5>Add Category</h5>
                </div>
                <div class="card-body">
                    <form action="../functions/add_category_data.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter your name">
                        </div>
                        <div class="col-md-6">
                            <label for="">Slum</label>
                            <input type="text" class="form-control" name="slug" placeholder="Enter your slug">
                        </div>
                        <div class="col-md-12">
                            <label for="">Descrption</label>
                           <textarea name="description" rows="3" class="form-control" placeholder="Enter description"></textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="">Upload Image</label>
                            <input type="file" class="form-control" name="image" placeholder="Enter your image">
                        </div>
                        <div class="col-md-12">
                            <label for="">Meta Title</label>
                            <input type="text" class="form-control" name="meta_title" placeholder="Enter Meta Title">
                        </div>
                        <div class="col-md-12">
                            <label for="">Meta Description</label>
                            <textarea name="meta_description" rows="3" class="form-control" placeholder="Enter Meta Description"></textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="">Meta Keywords</label>
                            <textarea name="meta_keys" rows="3" class="form-control" placeholder="Enter Meta Keywords"></textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="">Status</label>
                            <input type="checkbox" name="status">
                        </div>
                        <div class="col-md-6">
                            <label for="">Popular</label>
                            <input type="checkbox" name="popular">
                        </div>
                        <div class="col-md-12">
                           <button type="submit" class="btn btn-primary" name="add_category_btn">Save</button>
                        </div>

                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>