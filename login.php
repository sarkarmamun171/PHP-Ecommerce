<?php
session_start();
if (isset($_SESSION['auth'])) {
    $_SESSION['message']= "You are already logged";
    header("location:index.php");
}
include_once('./user/includes/header.php')
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
          <?php
          if (isset($_SESSION['message'])) { ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong><?=$_SESSION['message']?></strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          <?php
          unset($_SESSION['message']);
          }
          ?>
            <div class="card">
                <div class="card-header">
                    <h5>Login Form</h5>
                </div>
                <div class="card-body">
                    <form action="./functions/auth_data_conn.php" method="post">
                        
                        <div class="mb-3">
                            <label class="form-label">Email Address</label>
                            <input type="email" class="form-control" name="email" placeholder="Enter your email">
                        </div>
                       
                        <div class="mb-3">
                            <label class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" name="con_password" placeholder="Enter your confirm password">
                        </div>
                      
                        <button type="submit" class="btn btn-primary" name="login_btn">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include_once('./user/includes/footer.php')
?>