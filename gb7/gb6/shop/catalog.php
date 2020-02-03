<?php 
include('connect.php');
//include('function.php');
?>
<!DOCTYPE html>
<html lang="ru">
  <head><?php include('elems/head.php')?></head>
  <body>
    <header><?php include('elems/header.php')?></header>
   
    <div class="main">
        <div class="container">
           <hr>
            <h2>Каталог книг</h2>
            <hr>
            <h3>Новинки</h3>
            <div class="main-wrapper">
            <?= getGallery($mysqli); ?>
            </div> 
        </div>
      </div>
      <div class="footer"><?php include('elems/footer.php')?></div> 
    </body>
</html>