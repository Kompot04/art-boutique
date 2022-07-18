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
   <title>Про нас</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php @include 'header.php'; ?>

<section class="heading">
    <h3>Про нас</h3>
    <p> <a href="home.php">Головна</a></p>
</section>

<section class="about">

    <div class="flex">

        <div class="image">
            <img src="images/image1.jpg" alt="">
        </div>

        <div class="content">
            <h3>Чому саме ми?</h3>
            <p>Наш магазин займається продажем Картин за номерами з доставкою по всій Україні.
               Ми стежимо за тим, щоб у наявності був максимально повний асортимент за картинами-розмальовками, представлений на ринку України.
               Наша компанія керується принципами: якісний продукт, прийнятна ціна та головне — задоволений клієнт!</p>
            <a href="shop.php" class="btn">Купити зараз</a>
        </div>

    </div>

    <div class="flex">

        <div class="content">
            <h3>Що входить до набору?</h3>
            <p>У набір входить:
             бавовняне полотно на дерев'яному підрамнику з нанесеною пронумерованою схемою майбутньої картини,
             3 кисті різної товщини,
             акрилові пронумеровані фарби,
             кріплення до стіни для готової картини. Якщо виникли якісь питання зв'яжіться з нами.</p>
            <a href="contact.php" class="btn">Написати</a>
        </div>

        <div class="image">
            <img src="images/image.jpg" alt="">
        </div>

    </div>

    <div class="flex">

        <div class="image">
            <img src="images/image5.jpg" alt="">
        </div>

        <div class="content">
            <h3>Історії наших клієнтів</h3>
            <p>Картини по номерам є відмінним антистресом. Дуже цікаво повністю занурюєтеся у процес творчості та краси і відчути себе художником.
                Щоб надихнути вас приєднатися до нашої великої родини художників, ми вирішили поділитися відгуками клієнтів.
                Хтось тільки перший раз спробував себе у малюванні, а хтось вже намалював декілька неймовірних сюжетів і не планує зупинятися.</p>
            <a href="#reviews" class="btn">Відгуки</a>
        </div>

    </div>

</section>

<section class="reviews" id="reviews">

    <h1 class="title">Відгуки наших клієнтів</h1>

    <div class="box-container">

        <div class="box">
            <img src="images/image1.jpg" alt="">
            <p>Дуже чудові картини. Якість відмінна. Це вже п'ята картина, обов'язково ще замовлю.</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <h3>Марія</h3>
        </div>

        <div class="box">
            <img src="images/image2.jpg" alt="">
            <p>Швидка доставка, якість картин відмінна. Дуже багато різних сюжетів.</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <h3>Катерина</h3>
        </div>

        <div class="box">
            <img src="images/image6.jpg" alt="">
            <p>Замовляла на подарунок. Великий вибір картин, замовлю ще для себе обов'язковою</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <h3>Анна</h3>
        </div>

        
       

        

    </div>

</section>











<?php @include 'footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>