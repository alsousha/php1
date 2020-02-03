<?php 
include('server.php');
echo $auth;
?>
<!DOCTYPE html>
<html lang="ru">
  <head><?php include('../elems/head.php')?></head>
  <body>
    <header><?php include('../elems/header.php')?></header>
   
    <div class="main">
        <div class="container"><br>
    
         <a href="addBook.php">Добавить книгу</a>
         <div class="cleafix"></div>
          <?=getGalleryAdmin($mysqli)?>
        </div>
      </div>
      <div class="footer"><?php include('../elems/footer.php')?></div> 
    </body>
</html>