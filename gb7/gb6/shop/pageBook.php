<?php
include('function.php');
include('connect.php');
    ?>
<!DOCTYPE html>
<html lang="ru">
  <head><?php include('elems/head.php')?></head>
  <body>
    <header><?php include('elems/header.php')?></header>
    <div class="main">   
        <div class="margin-20"></div>
        <div class="container">
          <div class="book-description">
             <h2>Описание книги</h2>
              <div class="book-image">
                 <?php 
                    //массиву $book присваиваем массив с данными конкретной книги по id
                    $book = getPageBook($mysqli);
                    $id = $book['id'];
                    $title = $book['title'];
                    $author = $book['author'];
                    $price_old = $book['price_old'];
                    $price = $book['price'];
                    $publishing = $book['publishing'];
                    $year = $book['year'];
                    $isbn = $book['isbn'];
                    $pages = $book['pages'];
                    $type = $book['type'];
                    $edition = $book['edition'];
                    $weight = $book['weight'];
                    $age = $book['age'];
                    $description = $book['description'];
                    $pathBig = 'admin/'.$book['pathBig'];
                    $pathSmall = 'admin/'.$book['pathSmall'];
                  ?> 
                  <a href="<?=$pathBig?>" target="_blank"><img class="product_img" src="<?=$pathSmall?>" alt="<?=$title?>"></a> 
              </div>
              <div class="book-description-brief">
                  <h3>Краткое описание книги</h3>
                  <table class="table-brief">
                      <tr>
                          <td><i>автор:</i></td>
                          <td><?=$author?></td>
                      </tr>
                      <tr>
                          <td><i>наименование:</i></td>
                          <td><?=$title?></td>
                      </tr>
                      <tr>
                          <td><i>цена:</i></td>
                          <td><span class="line-through"><?=$price_old?> &#8399;</span><span class="price"><?=$price?> &#8399;</span></td>
                      </tr>
                  </table>
                  <input type="button" value="Купить">
              </div> <!--book-description-brief-->
              <div class="book-characteristics">
                  <h3>Основные характеристики</h3>
                  <ul>
                      <li><i>ID товара: </i><?=$id?></li>
                      <li><i>Издательство: </i><?=$publishing?></li>
                      <li><i>Год издания: </i> <?=$year?></li>
                      <li><i>ISBN: </i><?=$isbn?></li>
                      <li><i>Кол-во страниц: </i><?=$pages?></li>
                      <li><i>Тип обложки: </i><?=$type?></li>
                      <li><i>Тираж: </i><?=$edition?></li>
                      <li><i>Вес, г: </i><?=$weight?></li>
                      <li><i>Возрастные ограничения: </i><?=$age?></li>
                  </ul>
              </div> <!--characteristic-->    
              <div class="main-description">
                <h3>Аннотация</h3> 
                <p class="first-letter"><?= $description ?></p> 
              </div><!--main-description-->
              <hr> 
          </div>
        </div> <!--container-->
    </div> <!--main-->
   <div class="footer"><?php include('elems/footer.php')?></div>
  </body>
</html>
