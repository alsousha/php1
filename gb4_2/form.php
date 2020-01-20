<!--enctype исп при отправки файлов-->
<form action="server.php" method="post" enctype="multipart/form-data">
  <p>Add images</p>

 <!--  multiple - для загрузки неск файлов$
  accept="image/*" - все виды картинок -->
   <input multiple type="file" name="photo[]" accept="image/*"><br><br>
   <input type="submit" name="sbm" value="save">    
</form>