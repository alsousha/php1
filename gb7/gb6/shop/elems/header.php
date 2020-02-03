<?php 
//include('server.php');
include('function.php');
?>
<div class="header">
   <div class="headerInside">
       <div class="logo"><img src="/gb6/shop/assets/img/ikon/logo.png" alt="logo"></div>
       <div class="brand"><a href="/gb6/shop/index.php">Bookshop</a></div>
       <div class="navWrap">
           <a class="active" href="/gb6/shop/index.php">Главная</a>
           <a href="/gb6/shop/catalog.php">Каталог книг</a>
           <a href="/gb6/shop/contact.php">Контакты</a>
           <a href="/gb6/shop/review.php">Отзывы</a>
           <div class="auth">
               <?= getAuth($title)?>
           </div> 
       </div> 
           
   </div>
</div>