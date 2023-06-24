<?php
session_start();
include_once('./user/includes/header.php');
include_once('./functions/user_function.php');
?>
<div class="py-3 bg-primary">
    <div class="container">
        <h4 class="text-white">Home/Collections</h4>
    </div>
</div>
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Our Collections</h1>
                <div class="row">
                    <hr>
                    <?php
                    $categories = getAllActive("categories");
                    if (mysqli_num_rows($categories)) {
                        foreach ($categories as $item) {
                    ?>
                            <div class="col-md-3 mb-2">
                                <a href="products.php?category=<?= $item['slug']; ?>">
                                    <div class="card shadow">
                                        <div class="card-body">
                                            <img src="./uploads/<?= $item['image']; ?>" alt="Category Image">
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
include_once('./user/includes/footer.php')
?>