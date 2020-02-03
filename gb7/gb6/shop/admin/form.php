
 <form class="add_book" enctype="multipart/form-data" action="" method="POST">

    <input name="userfile" type="file" accept="image/*"/><br><br>
    <label>Автор:</label><br>
     <input type="text" name="author" value="<?php if(isset($author)) echo $author?>"><br><br>
     <label>Издательство: </label><br>
     <input type="text" name="publishing" value="<?php if(isset($publishing)) echo $publishing?>"><br><br>
     <label>Название книги: </label><br>
     <input type="text" name="title" value="<?php if(isset($title)) echo $title?>"><br><br>
     <label>Цена: </label><br>
     <input type="text" name="price" value="<?php if(isset($price)) echo $price?>"><br><br>
     <label>Прежняя цена</label><br>
     <input type="text" name="price_old" value="<?php if(isset($price_old)) echo $price_old?>"><br><br>
     <label>Год издания: </label><br>
     <input type="text" name="year" value="<?php if(isset($year)) echo $year?>"><br><br>
     <label>ISBN</label><br>
     <input type="text" name="ISBN" value="<?php if(isset($isbn)) echo $isbn?>"><br><br>
     <label>Кол-во страниц: </label><br>
     <input type="text" name="pages" value="<?php if(isset($pages)) echo $pages?>"><br><br>
     <label>Тип обложки: </label><br>
     <select name="type">
        <option value="soft" value="<?php if(isset($type)) echo $type?>">Мягкая</option>
        <option value="hard" value="<?php if(isset($type)) echo $type?>">Твердая</option>
     </select><br><br>
     <label>Тираж: </label><br>
     <input type="text" name="edition" value="<?php if(isset($edition)) echo $edition?>"><br><br>
     <label>Вес, г: </label><br>
     <input type="text" name="weight" value="<?php if(isset($weight)) echo $weight?>"><br><br>
     <label>Возрастные ограничения: </label><br>
     <input type="text" name="age" value="<?php if(isset($age)) echo $age?>"><br><br>
     <label>Описание книги</label><br>
     <textarea class="descr_book" name="description"><?php if(isset($description)) echo $description?></textarea><br><br>
    <input type="submit" name="sbm" value="Сохранить" />
</form>
       