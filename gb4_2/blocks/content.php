<?php
$path = $_SERVER['DOCUMENT_ROOT'].'/gb4_2/';
if(isset($_GET['del'])){
       unlink('img/small_img/'.$_GET['del']);
       unlink('img/big_img/'.$_GET['del']);
   } 
?>
<p class="textContent"><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non tempora ratione omnis, dolore est qui, inventore blanditiis suscipit laudantium voluptatum aliquid quae, eveniet alias ipsam exercitationem optio odio eum? Ipsa.</span><span>Facere omnis aliquam assumenda tempora veniam ea libero deserunt fuga sunt rerum, ipsum reiciendis, quod dolor quia nemo ipsam dolores. Beatae, omnis praesentium doloribus atque excepturi dolorem commodi voluptas hic.</span></p>
<a href="<?php $path?>form.php">Add image</a><br><br>
<div class=img>
<?php
    $files = array_diff(scandir('img/small_img/'), ['.','..']);
foreach($files as $elem){?>
   <div class="img_elem">
        <a href="img/big_img/<?=$elem ?>"><img class="gallery" src="img/small_img/<?=$elem ?>"></a><br>
        <a href="?del=<?=$elem?>">Delete image</a>
   </div>
   <?php 
} 
    ?>
<div class="clearfix"></div>

</div>
