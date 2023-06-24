<?php
session_start();
include_once('./user/includes/header.php');
include_once('./functions/user_function.php');
if (isset( $_GET['category'])) {

 $category_slug = $_GET['category'];
 $category_data =getSlugActive("categories",$category_slug);
 $category = mysqli_fetch_array($category_data);
 if ($category) {
    $cid = $category['id'];
?>
<div class="py-3 bg-primary">
    <div class="container">
        <h4 class="text-white">
            <a class="text-white" href="categories.php">
            Home/
            </a>
            <a class="text-white" href="categories.php">
            Collections/
            </a>
           <?=$category['name'];?></h4>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1><?=$category['name'];?></h1>
                <div class="row">
                    <hr>
                    <?php
                   $products=getProductCategory($cid);
                    if (mysqli_num_rows($products)) {
                        foreach ($products as $item) {
                    ?>
                            <div class="col-md-3 mb-2">
                                <a href="#">
                                    <div class="card shadow">
                                        <div class="card-body">
                                            <img src="./uploads/<?= $item['image']; ?>" alt="Product Image">
                                            <h4 class="text-center"><?= $item['name']; ?></h4>
                                        </div>
                                    </div>
                                </a>
                            </div>
                    <?php
                        }
                    } else {
                        echo "No data avavile";
                    }

                    ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php 
 }
 else {
    echo "Something is wrong";
 }
 }
  else {
    echo "Something is wrong";
  }

include_once('./user/includes/footer.php');
?>