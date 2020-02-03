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
            <div class="margin-20"></div>
                <h3>Напишите нам!</h3>
                <?php 
                if(isset($_POST['sbm'])){
                    $info = setReview($mysqli);
                    echo '<p class="'.$info['status'].'">'.$info['text'].'</p>'; 
                }
                ?>
                
                 <form class="form-contact" action="" method="post">
                   <label>Ваш email:</label>
                   <input class="input-info email" name="email" type="email" placeholder="email"><br/>
                   <label>Имя:</label>
                   <input class="input-info" name="name" id="input-name"type="text" placeholder="name"><br/>
                   <label>Ваш возраст:</label><br/>
                   <input type="radio" name="age" value="less12" checked><label>до 12 лет</label><br>
                   <input type="radio" name="age" value="12_16"><label>от 12 до 16</label><br>
                   <input type="radio" name="age" value="16_18"><label>от 16 до 18</label><br>
                   <input type="radio" name="age" value="more18"><label>старше 18 лет</label><br>
                   <textarea name="messenge" cols="40" rows="10"></textarea><br>
                   <input type="checkbox" checked="checked" name="spam">Хочу подписаться на рассылку<br/>
                   <input type="hidden" name="date" value="date">
                   <input type="submit" name="sbm" value="Отправить">     
                 </form>
                 
                 <?php
                echo getReview($mysqli);
                ?>
               
                 </div> <!--container-->
        </div><!--main--> 
    <div class="footer"><?php include('elems/footer.php')?></div>
  </body>
</html>