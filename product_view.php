<?php
include_once('./functions/user_function.php');
include_once('./user/includes/header.php');

if (isset($_GET['products'])) {

    $products_slug = $_GET['products'];
    $products_data = getSlugActive("products", $products_slug);
    $products = mysqli_fetch_array($products_data);

    if ($products) {
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
                    <?= $products['name']; ?>
                </h4>
            </div>
        </div>

        <div class="bg-light py-4">
            <div class="container mt-4">
                <div class="row">
                    <div class="col-md-4">
                        <div class="shadow">
                            <img src="./uploads/<?= $products['image']; ?>" alt="Products Image">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <h4><?= $products['name']; ?></h4>
                        <hr>
                        <h6><?= $products['small_description']; ?></h6>
                        <hr>
                        <h6>Product Description:</h6>
                        <p><?= $products['description']; ?></p> <br> <br>

                        <div class="row">
                            <div class="col-md-6">
                                <h5>Tk <s class="text-danger"><?= $products['selling_price'] ?></s></h5>
                            </div>
                            <div class="col-md-6">
                                <h5>Tk <span class="text-success fw-bold"><?= $products['original_price'] ?></span></h5>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <button class="btn btn-primary">Add to Cart</button>
                            </div>
                            <div class="col-md-6">
                                <button class="btn btn-primary">wishlist</button>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-4">
                                <div class="input-group mb-3" style="width:110px">
                                    <button class="input-group-text decrement-btn">-</button>
                                    <input type="text" class="form-control text-center bg-white input-qty" value="1" disabled>
                                    <button class="input-group-text increment-btn">+</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


<?php
    } else {
        echo "Product no found";
    }
} else {
    echo "Something is wrong";
}
include_once('./user/includes/footer.php');
?>