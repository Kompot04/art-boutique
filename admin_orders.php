<?php

@include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
};

if(isset($_POST['update_order'])){
   $order_id = $_POST['order_id'];
   $update_payment = $_POST['update_payment'];
   mysqli_query($conn, "UPDATE `orders` SET payment_status = '$update_payment' WHERE id = '$order_id'") or die('запит не вдался');
   $message[] = 'Статус оплати змінено';
}

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM `orders` WHERE id = '$delete_id'") or die('запит не вдался');
   header('location:admin_orders.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Замовлення </title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="css/admin_style.css">

</head>
<body>
   
<?php @include 'admin_header.php'; ?>

<section class="placed-orders">

   <h1 class="title">Оформлені замовлення</h1>

   <div class="box-container">

      <?php
      
      $select_orders = mysqli_query($conn, "SELECT * FROM `orders`") or die('запит не вдался');
      if(mysqli_num_rows($select_orders) > 0){
         while($fetch_orders = mysqli_fetch_assoc($select_orders)){
      ?>
      <div class="box">
         <p> ID користувача: <span><?php echo $fetch_orders['user_id']; ?></span> </p>
         <p> Дата оформлення: <span><?php echo $fetch_orders['order_date']; ?></span> </p>
         <p> Прізвище та Ім'я: <span><?php echo $fetch_orders['name']; ?></span> </p>
         <p> Номер телефону: <span><?php echo $fetch_orders['number']; ?></span> </p>
         <p> Електронна пошта: <span><?php echo $fetch_orders['email']; ?></span> </p>
         <p> Адреса доставки: <span><?php echo $fetch_orders['address_delivery']; ?></span> </p>
         <p> Перелік товарів: <span><?php echo $fetch_orders['total_products']; ?></span> </p>
         <p> Загальна сума: <span><?php echo $fetch_orders['total_price']; ?> грн</span> </p>
         <p> Спосіб оплати: <span><?php echo $fetch_orders['payment_method']; ?></span> </p>
         <form action="" method="post">
            <input type="hidden" name="order_id" value="<?php echo $fetch_orders['id']; ?>">
            <select name="update_payment">
               <option disabled selected><?php echo $fetch_orders['payment_status']; ?></option>
               <option value="в очікуванні">В очікуванні</option>
               <option value="завершено">Завершено</option>
            </select>
            <input type="submit" name="update_order" value="Оновити" class="option-btn">
            <a href="admin_orders.php?delete=<?php echo $fetch_orders['id']; ?>" class="delete-btn" onclick="return confirm('Видалити замовлення?');">Видалити</a>
         </form>
      </div>
      <?php
         }
      }else{
         echo '<p class="empty">Немає ще замовлень</p>';
      }
      ?>
   </div>

</section>




<script src="js/admin_script.js"></script>

</body>
</html>