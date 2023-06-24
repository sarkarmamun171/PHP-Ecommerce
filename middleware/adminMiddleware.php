<!-- <?php
session_start();

require_once('../functions/myfunctions.php');
if ($_SESSION['auth']) {
    if ($_SESSION['role_as']!=1) {
        redirect("../index.php","You are not authorized to acces a page");
        // $_SESSION['message'] = "You are not authorized to acces a page";
        // header("location:../index.php");
    }
}else {
    redirect("../login.php","Login your continue");
    // $_SESSION['message'] = "Login your continue";
    // header("location:../login.php");
}?> -->
