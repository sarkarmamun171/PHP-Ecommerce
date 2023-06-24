<?php 
require_once('../config/db_conn.php');
include_once('./myfunctions.php');

if (isset($_POST['add_category_btn'])) {
    $name = $_POST['name'];
    $slug= $_POST['slug'];
    $description = $_POST['description'];
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keys = $_POST['meta_keys'];
    $status = isset($_POST['status'])?'1':'0';
    $popular = isset($_POST['popular'])?'1':'0';

    $image = $_FILES['image']['name'];
    $path = "../uploads";
    $image_ext = pathinfo($image,PATHINFO_EXTENSION);
    $filename = time().'.'.$image_ext;

    $category_query ="INSERT INTO `categories`(`name`, `slug`, `description`, `status`, `popular`, `meta_title`, `meta_description`, `meta_keys`, `image`)
     VALUES ('$name','$slug','$description','$status','$popular','$meta_title','$meta_description','$meta_keys','$filename')";
      $category_query_run = mysqli_query($conn, $category_query) ;

      if ($category_query_run) {
        move_uploaded_file($_FILES['image']['tmp_name'],$path.'/'.$filename);
        redirect("../admin/add_category.php","Category added Successfully");
      }else {
        redirect("../admin/add_category.php","Someting is wrong");
      }

//   header("location:../admin/add_category.php");
    
}
elseif (isset($_POST['update_category_btn'])) {
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    $slug= $_POST['slug'];
    $description = $_POST['description'];
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keys = $_POST['meta_keys'];
    $status = isset($_POST['status'])?'1':'0';
    $popular = isset($_POST['popular'])?'1':'0';

    $path = "../uploads";
    $new_image = $_FILES['image']['name'];
    $old_image = $_POST['old_image'];

    if ($new_image!="") {
      $image_ext = pathinfo($new_image,PATHINFO_EXTENSION);
      $update_filename = $new_image;
    }else {
      $update_filename = $old_image;
    }

    $update_query = "UPDATE `categories` SET `name`='$name',`slug`='$slug',`description`='$description',
    `status`='$status',`popular`='$popular',`image`='$update_filename',`meta_title`='$meta_title',`meta_description`='$meta_description',
    `meta_keys`='$meta_keys'WHERE id ='$category_id'";
    
    $update_query_run =mysqli_query($conn,$update_query);

    if ($update_query_run) {
      if ($_FILES['image']['name'] !="") {
        move_uploaded_file($_FILES['image']['tmp_name'],$path.'/'.$new_image);
        if (file_exists("../uploads/".$old_image)) {
          unlink("../uploads/".$old_image);
        }
      }
      redirect("../admin/edit_category.php?id=$category_id","Category Updated Successfully");
    }
}
elseif (isset($_POST['delete_category_btn'])) {
 $category_id = mysqli_real_escape_string($conn,$_POST['category_id']);

 $category_query ="SELECT * FROM `categories` WHERE id = $category_id";
 $category_query_run = mysqli_query($conn,$category_query);
 $caregory_data = mysqli_fetch_array($category_query_run);
 $image = $category_data['image'];

 $delete_query ="DELETE FROM categories WHERE id='$category_id'";
 $delete_query_run = mysqli_query($conn,$delete_query);
 if ($delete_query_run) {
  if (file_exists("../uploads/".$image )) {
    unlink("../uploads/".$image  );
  }
  redirect("../admin/category.php","Category delete successfully");
 }else {
  redirect("../admin/category.php","Something is worng");
 }
}
elseif (isset($_POST['add_product_btn'])) {
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    $slug= $_POST['slug'];
    $small_description = $_POST['small_description'];
    $description = $_POST['description'];
    $original_price = $_POST['original_price'];
    $selling_price = $_POST['selling_price'];
    $qty = $_POST['qty'];
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keywords = $_POST['meta_keywords'];
    $status = isset($_POST['status'])?'1':'0';
    $trending = isset($_POST['trending'])?'1':'0';

    $image = $_FILES['image']['name'];
    $path = "../uploads";
    $image_ext = pathinfo($image,PATHINFO_EXTENSION);
    $filename = time().'.'.$image_ext;

    if ($name!=""&& $slug !=""&& $description !="" ){

      // $product_query ="INSERT INTO `products`(`category_id`, `name`, `slug`, `small_description`, `description`, `original_price`, 
      // `selling_price`,`qty`, `status`, `trending`, `meta_title`, `meta_keywords`, meta_description,image) 
      // VALUES ('$category_id','$name','$slug','$small_description','$description','$original_price','$selling_price',
      // '$qty',$status','$trending','$meta_title','$meta_keywords','$meta_description','$filename')";
  
      $product_query ="INSERT INTO products (category_id,name,slug,small_description,description,original_price,selling_price,qty,
      status,trending,meta_title,meta_keywords,meta_description,image) VALUES('$category_id','$name','$slug','$small_description','$description',
      '$original_price','$selling_price','$qty','$status','$trending','$meta_title','$meta_keywords','$meta_description','$filename')";

      $product_query_run = mysqli_query($conn,$product_query);
  
      if ($product_query_run) {
        move_uploaded_file($_FILES['image']['tmp_name'],$path.'/'.$filename);
        redirect("../admin/add_product.php","Product added Successfully");
      }else {
        redirect("../admin/add_product.php","Someting is wrong");
      }
    }else {
      redirect("../admin/add_product.php","All fields madatory ");
    }

   
}
elseif (isset($_POST['update_product_btn'])) {
  $product_id = $_POST['product_id'];
  $name = $_POST['name'];
  $slug= $_POST['slug'];
  $small_description = $_POST['small_description'];
  $description = $_POST['description'];
  $original_price = $_POST['original_price'];
  $selling_price = $_POST['selling_price'];
  $qty = $_POST['qty'];
  $meta_title = $_POST['meta_title'];
  $meta_description = $_POST['meta_description'];
  $meta_keywords = $_POST['meta_keywords'];
  $status = isset($_POST['status'])?'1':'0';
  $trending = isset($_POST['trending'])?'1':'0';

  $path = "../uploads";
  $new_image = $_FILES['image']['name'];
  $old_image = $_POST['old_image'];

  if ($new_image!="") {
    $image_ext = pathinfo($new_image,PATHINFO_EXTENSION);
    $update_filename = time().'.'.$image_ext;

  }else {
    $update_filename = $old_image;
  }

  $update_product_query = "UPDATE `products` SET `name`='$name',`slug`='$slug',`description`='$description',`small_description`='$small_description',
  `original_price`='$original_price',`selling_price`='$selling_price',`qty`='$qty',`status`='$status',`trending`='$trending',`image`='$update_filename',`meta_title`='$meta_title',`meta_description`='$meta_description',
  `meta_keywords`='$meta_keywords'WHERE id ='$product_id'";
  
  $update_product_query_run =mysqli_query($conn,$update_product_query);

  if ($update_product_query_run) {
    if ($_FILES['image']['name'] !="") {
      move_uploaded_file($_FILES['image']['tmp_name'],$path.'/'.$update_filename);
      if (file_exists("../uploads/".$old_image)) {
        unlink("../uploads/".$old_image);
      }
    }
    redirect("../admin/edit_product.php?id=$product_id","Product Updated Successfully");
  }
}
else{
  header("location:../admin/admin_index.php");
}
if(isset($_POST['delete_product_btn'])) {
  $product_id = mysqli_real_escape_string($conn,$_POST['product_id']);
 
  $category_query ="SELECT * FROM `products` WHERE id = $product_id";
  $category_query_run = mysqli_query($conn,$category_query);
  $caregory_data = mysqli_fetch_array($category_query_run);
  $image = $category_data['image'];
 
  $delete_query ="DELETE FROM products WHERE id='$product_id'";
  $delete_query_run = mysqli_query($conn,$delete_query);
  if ($delete_query_run) {
   if (file_exists("../uploads/".$image )) {
     unlink("../uploads/".$image  );
   }
   redirect("../admin/category.php","product delete successfully");
  }else {
   redirect("../admin/category.php","Something is worng");
  }
 }
?>