<?php
include('server.php');
?>
<!DOCTYPE html>
<html lang="ru">
  <head><?php include('../elems/head.php')?></head>
  <body>
    <header><?php include('../elems/header.php')?></header>
   
    <div class="main">
        <div class="container">
         <h3>Добавление новой книги</h3>
         <span class="<?=$message['status']?>"><?=$message['text']?></span><br>
         <?php include('form.php')?>
        <br>
        <a href="index.php">Вернуться на главную</a>
        </div>
      </div>
      <div class="footer"><?php include('../elems/footer.php')?></div> 
    </body>
</html>