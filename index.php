<?php
session_start();

include_once('./user/includes/header.php')
?>
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                if (isset($_SESSION['message'])) { ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong><?= $_SESSION['message'] ?></strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php
                    unset($_SESSION['message']);
                }
                ?>
                <h1>Testing</h1>
            </div>
        </div>
    </div>
</div>
<?php
include_once('./user/includes/footer.php')
?>