<?php
include('server.php');

?>
<head>
    <link rel="stylesheet" href="css/style.css">
</head>

<!--enctype исп при отправки файлов-->
<form action="" method="post" enctype="multipart/form-data">
  <p>Add images</p>

 <!--  multiple - для загрузки неск файлов$
  accept="image/*" - все виды картинок -->
   <input multiple type="file" name="photo[]" accept="image/*"><br><br>
   <input type="submit" name="sbm" value="save">    
</form>
<span class="<?=$message['status']?>"><?=$message['text']?></span><br>
<a href="index.php">Main page</a>


