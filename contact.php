<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};

if(isset($_POST['send'])){

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $number = mysqli_real_escape_string($conn, $_POST['number']);
    $msg = mysqli_real_escape_string($conn, $_POST['message']);

    $select_message = mysqli_query($conn, "SELECT * FROM `messages` WHERE name = '$name' AND email = '$email' AND number = '$number' AND message = '$msg'") or die('запит не вдался');

    if(mysqli_num_rows($select_message) > 0){
        $message[] = 'Лист вже відправлено';
    }else{
        mysqli_query($conn, "INSERT INTO `messages`(user_id, name, email, number, message) VALUES('$user_id', '$name', '$email', '$number', '$msg')") or die('запит не вдался');
        $message[] = 'Лист успішно відправлено';
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Контакти</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php @include 'header.php'; ?>

<section class="heading">
    <h3>Напишіть нам</h3>
    <p> <a href="home.php">Головна</a> </p>
</section>

<section class="contact">

    <form action="" method="POST">
        <h3>Відправити лист</h3>
        <input type="text" name="name" placeholder="ваше ім'я" class="box" required> 
        <input type="email" name="email" placeholder="електронна пошта" class="box" required>
        <input type="number" name="number" placeholder="номер телефону" class="box" required>
        <textarea name="message" class="box" placeholder="повідомлення" required cols="30" rows="10"></textarea>
        <input type="submit" value="Відправити" name="send" class="btn">
    </form>

</section>


<?php @include 'footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>