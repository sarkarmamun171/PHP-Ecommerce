<?php 
  session_start();
 include_once('../config/db_conn.php');
 include_once('./myfunctions.php');

 if (isset($_POST['register_btn'])) {
    $name = mysqli_real_escape_string($conn,$_POST["name"]);
    $email = mysqli_real_escape_string($conn,$_POST["email"]);
    $phone =mysqli_real_escape_string($conn,$_POST["phone"]);
    $user_password = mysqli_real_escape_string($conn,$_POST["user_password"]);
    $con_password = mysqli_real_escape_string($conn,$_POST["con_password"]);

//check if email already registred
   $check_email_query = "SELECT email FROM `users` WHERE email = '$email' ";
   $check_email_query_run = mysqli_query($conn, $check_email_query);

   if (mysqli_num_rows($check_email_query_run)>0) {
    redirect("../register.php","Email already registred");
    // $_SESSION['message'] = "Email already registred";
    //     header("location:../register.php");
   }else{
    if ($user_password==$con_password) {
        $query = "INSERT INTO `users`(name,email,phone,password,con_password) VALUES ('$name','$email','$phone','$user_password','$con_password')";
        $query_run = mysqli_query($conn,$query);
         if ($query_run) {
            redirect("../login.php","Regisration Successfully");
        //   $_SESSION['message'] = "Regisration Successfully";
        //   header("location:../login.php");
         }
         else{
            redirect("../register.php","Regisration not successfully");
        //   $_SESSION['message'] = "Regisration not successfully";
        //   header("location:../register.php");
         }
    }
     else{
        redirect("../register.php","Password do not match");
        //   $_SESSION['message'] = "Password do not match";
        //   header("location:../register.php");
      }
   }
 }

  elseif(isset($_POST['login_btn'])) {
    $email = mysqli_real_escape_string($conn,$_POST["email"]);
    $con_password = mysqli_real_escape_string($conn,$_POST["con_password"]);

    $login_query = "SELECT *FROM `users` WHERE email = '$email' AND con_password ='$con_password'";
    $login_query_run = mysqli_query($conn, $login_query);

    if (mysqli_num_rows( $login_query_run)>0) {
        $_SESSION['auth']=true;

        $user_data = mysqli_fetch_array($login_query_run);
        $username = $user_data['name'];
        $useremail = $user_data['email'];
        $role_as = $user_data['role_as'];
        
        $_SESSION['auth_user'] = [
            'name' => $username,
            'email' => $useremail
        ];

        $_SESSION['role_as']= $role_as;
        if ($role_as==1) {
            redirect("../admin/admin_index.php","Welcom to Dashboard");
            // $_SESSION['message'] = "Welcom to Dashboard";
            // header("location:../admin/admin_index.php");
        }else {
            redirect("../index.php","Logged in successfully");
            // $_SESSION['message'] = "Logged in successfully";
            // header("location:../index.php");
        }  
    }
    else {
        redirect("../login.php","Invalid Credentials");
        // $_SESSION['message'] = "Invalid Credentials";
        // header("location:../login.php");
    }
}
 

?>