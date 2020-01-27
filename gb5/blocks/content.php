<?php

include('server.php');
//include('connect.php');
//include('function.php');

?>
<p class="textContent"><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non tempora ratione omnis, dolore est qui, inventore blanditiis suscipit laudantium voluptatum aliquid quae, eveniet alias ipsam exercitationem optio odio eum? Ipsa.</span><span>Facere omnis aliquam assumenda tempora veniam ea libero deserunt fuga sunt rerum, ipsum reiciendis, quod dolor quia nemo ipsam dolores. Beatae, omnis praesentium doloribus atque excepturi dolorem commodi voluptas hic.</span></p>

<a href="form.php">Add image</a><br><br>
<div class=img>
<?php
    
  $countImg = countImg($mysqli); 
    
//получаем массив имен изображений из БД   
  $arr = getArrGallery($mysqli);
    
for($i=0; $i<$countImg; $i++) :?>
    <div class="img_elem">
        <a href="img/big_img/<?=$arr[$i]['name']?>?img=<?=$arr[$i]['name']?>" class="photo" target="_blank">
            <img class="gallery" src="img/small_img/<?=$arr[$i]['name'] ?>"></a><br>
        <a href="?del=<?=$arr[$i]['name']?>">Delete image</a>
        <p class="count"> просмотров: <?=$arr[$i]['count']?></p>
   </div>    
<?php endfor ?>
 
    <div class="clearfix"></div>
</div>





























