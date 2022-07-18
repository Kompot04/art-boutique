<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Замовлення</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php @include 'header.php'; ?>

<section class="heading">
    <h3>Твоє замовлення</h3>
    <p> <a href="home.php">Головна</a></p>
</section>

<section class="placed-orders">

    <h1 class="title">Замовлення</h1>

    <div class="box-container">

    <?php
        $select_orders = mysqli_query($conn, "SELECT * FROM `orders` WHERE user_id = '$user_id'") or die('запит не вдался');
        if(mysqli_num_rows($select_orders) > 0){
            while($fetch_orders = mysqli_fetch_assoc($select_orders)){
    ?>
    <div class="box">
        <p> Дата оформлення: <span><?php echo $fetch_orders['order_date']; ?></span> </p>
        <p> Ім'я користувача: <span><?php echo $fetch_orders['name']; ?></span> </p>
        <p> Номер телефону: <span><?php echo $fetch_orders['number']; ?></span> </p>
        <p> Електронна пошта: <span><?php echo $fetch_orders['email']; ?></span> </p>
        <p> Адреса доставки: <span><?php echo $fetch_orders['address_delivery']; ?></span> </p>
        <p> Спосіб оплати: <span><?php echo $fetch_orders['payment_method']; ?></span> </p>
        <p> Твоє замовлення: <span><?php echo $fetch_orders['total_products']; ?></span> </p>
        <p> Загальна сума: <span><?php echo $fetch_orders['total_price']; ?> грн</span> </p>
        <p> Статус оплати: <span style="color:<?php if($fetch_orders['payment_status'] == 'в очікуванні'){echo 'tomato'; }else{echo 'green';} ?>"><?php echo $fetch_orders['payment_status']; ?></span> </p>
    </div>
    <?php
        }
    }else{
        echo '<p class="empty">Немає ще замовлень</p>';
    }
    ?>
    </div>

</section>


<?php @include 'footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>