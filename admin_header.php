<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>

<header class="header">

   <div class="flex">

      <a href="admin_page.php" class="logo">Адмін<span>Панель</span></a>

      <nav class="navbar">
         <a href="admin_page.php">Головна</a>
         <a href="admin_products.php">Товари</a>
         <a href="admin_orders.php">Замовлення</a>
         <a href="admin_user.php">Користувачі</a>
         <a href="admin_contacts.php">Повідомлення</a>
      </nav>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="user-btn" class="fas fa-user"></div>
      </div>

      <div class="account-box">
         <p>Ім'я користувача: <span><?php echo $_SESSION['admin_name']; ?></span></p>
         <p>emai: <span><?php echo $_SESSION['admin_email']; ?></span></p>
         <a href="logout.php" class="delete-btn">Вийти</a>
         <div><a href="login.php">Увійти</a> | <a href="register.php">Реєстрація</a> </div>
      </div>

   </div>

</header>