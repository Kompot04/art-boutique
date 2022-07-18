<?php

@include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
};




if(isset($_POST['add_product'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $price = mysqli_real_escape_string($conn, $_POST['price']);
   $description = mysqli_real_escape_string($conn, $_POST['description']);
   $image = $_FILES['image']['name'];
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folter = 'uploaded_img/'.$image;

   $select_product_name = mysqli_query($conn, "SELECT name FROM `products` WHERE name = '$name'") or die('запит не вдался');

   if(mysqli_num_rows($select_product_name) > 0){
      $message[] = 'Назва товару вже існує';
   }else{
      $insert_product = mysqli_query($conn, "INSERT INTO `products`(name, description, price, image) VALUES('$name', '$description', '$price', '$image')") or die('запит не вдался');

      if($insert_product){
         if($image_size > 2000000){
            $message[] = 'Фото занадто велике';
         }else{
            move_uploaded_file($image_tmp_name, $image_folter);
            $message[] = 'Товар успішно додано';
         }
      }
   }

}



if(isset($_GET['delete'])){

   $delete_id = $_GET['delete'];
   $select_delete_image = mysqli_query($conn, "SELECT image FROM `products` WHERE id = '$delete_id'") or die('запит не вдался');
   $fetch_delete_image = mysqli_fetch_assoc($select_delete_image);
   unlink('uploaded_img/'.$fetch_delete_image['image']);
   mysqli_query($conn, "DELETE FROM `products` WHERE id = '$delete_id'") or die('запит не вдался');
   mysqli_query($conn, "DELETE FROM `wishlist` WHERE id_product = '$delete_id'") or die('запит не вдался');
   mysqli_query($conn, "DELETE FROM `cart` WHERE id_product = '$delete_id'") or die('запит не вдался');
   header('location:admin_products.php');

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Товари</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="css/admin_style.css">

</head>
<body>
   
<?php @include 'admin_header.php'; ?>

<section class="add-products">
   <form action="" method="POST" enctype="multipart/form-data">
      <h3> Додати новий товар</h3>
      <input type="text" class="box" required placeholder="назва" name="name">
      <input type="number" min="0" class="box" required placeholder="ціна" name="price">
      <textarea name="description" class="box" required placeholder="опис" cols="30" rows="10"></textarea>
      <input type="file" accept="image/jpg, image/jpeg, image/png" required class="box" name="image">
      <input type="submit" value="Додати товар" name="add_product" class="btn">
   </form>
                  I


  
</section>

<section class="show-products">
   <div class="box-container">
      <?php
      $select_products = mysqli_query($conn, "SELECT * FROM `products`")
      or die ('запит не вдался');
      if(mysqli_num_rows($select_products) > 0){
         while($fetch_products = mysqli_fetch_assoc($select_products)){

      ?>
      <div class="box">
         <div class="price"><?php echo $fetch_products['price']; ?> грн</div>
         <img class="image" src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="">
         <div class="name"><?php echo $fetch_products['name']; ?></div>
         <div class="description"><?php echo $fetch_products['description']; ?></div>
         <a href="admin_update_product.php?update=<?php echo $fetch_products['id']; ?>" class="option-btn"> Оновити</a>
         <a href="admin_products.php?delete=<?php echo $fetch_products['id']; ?>" class="delete-btn" onclick="return confirm('Видалити товар?');">Видалити</a>
      </div>
      <?php
      }
      }else{
         echo  '<p class="empty"> Товари ще не додано</p>';

      }
      ?>
     

   </div>
</section>