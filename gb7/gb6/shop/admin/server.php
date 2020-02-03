<?php
session_start();
$auth = ($_SESSION['auth']);
include('../connect.php');
include('function.php');
$message['status'] ='';
$message['text'] = '';
$flag = 0;


if(isset($_GET['del']))
{
  $id = $_GET['del'];
   
  $query = "DELETE FROM books WHERE id = $id";
  $mysqli->query($query); 
  
  $query = "SELECT * FROM books WHERE id = $id";
  $result = mysqli_fetch_assoc($mysqli->query($query));
  if($result['pathBig']) unlink($result['pathBig']);
  if($result['pathSmall']) unlink($result['pathBig']);
  /*unlink($result['pathBig']);
  unlink($result['pathSmall']);*/
    
} 

if(isset($_GET['edit']))
{
    //чт подставить имеющиеся значения в форму
    $id = $_GET['edit'];
    $query = "SELECT * FROM books WHERE id = $id";
    $book = mysqli_fetch_assoc($mysqli->query($query)); 
    $author = trim(htmlspecialchars($book['author']));
    $publishing = trim(htmlspecialchars($book['publishing']));
    $title = trim(htmlspecialchars($book['title']));
    $price = trim(htmlspecialchars($book['price']));
    $price_old = trim(htmlspecialchars($book['price_old']));
    $year = trim(htmlspecialchars($book['year']));
    $isbn = trim(htmlspecialchars($book['isbn']));
    $pages = trim(htmlspecialchars($book['pages']));
    if($book['type'] == 'soft') $type = 'Мягкая';
    if($book['type'] == 'hard') $type = 'Твердая';        
    $edition = trim(htmlspecialchars($book['edition']));
    $weight = trim(htmlspecialchars($book['weight']));
    $age = trim(htmlspecialchars($book['age']));
    $description = trim(htmlspecialchars($book['description']));
    $pathBigBD =$book['pathBig'];
    $pathSmallBD = $book['pathSmall'];
    
    //устанавливаем флаг, чт знать обновлять или добавлять БД в функции addedForm
    $flag = 1;

} 
//если форма заполнена или отредактирована
if(isset($_POST['sbm'])){   
    if($_POST['author'] == null || $_POST['title'] == null ){
        $message = ['text' => "Не заполнены все поля!", 'status' => 'warning'];
    }else{
       
        $author = trim(htmlspecialchars($_POST['author']));
        $publishing = trim(htmlspecialchars($_POST['publishing']));
        $title = trim(htmlspecialchars($_POST['title']));
        $price = trim(htmlspecialchars($_POST['price']));
        $price_old = trim(htmlspecialchars($_POST['price_old']));
        $year = trim(htmlspecialchars($_POST['year']));
        $isbn = trim(htmlspecialchars($_POST['ISBN']));
        $pages = trim(htmlspecialchars($_POST['pages']));
        if($_POST['type'] == 'soft') $type = 'Мягкая';
        if($_POST['type'] == 'hard') $type = 'Твердая';        
        $edition = trim(htmlspecialchars($_POST['edition']));
        $weight = trim(htmlspecialchars($_POST['weight']));
        $age = trim(htmlspecialchars($_POST['age']));
        $description = trim(htmlspecialchars($_POST['description']));
        
        
        //если редактируем книгу и меняем изображение ИЛИ добавляем книгу
        if(($flag == 1 && $_FILES['userfile']['name']) || $flag == 0){
            //обрабатываем и сохраняем файл
            $fileName = translit($_FILES['userfile']['name']);
            $pathBig = 'img/'.$fileName;
            $pathSmall = 'img/imgsmall/'.$fileName;
            $typeImg = $_FILES['userfile']['type'];
            if(
                $typeImg != 'image/jpeg' &&
                $typeImg != 'image/png' &&
                $typeImg != 'image/gif'){
                $message = ['text' => "Файл не является изображением!", 'status' => 'warning'];
            }
            if(move_uploaded_file($_FILES['userfile']['tmp_name'], $pathBig)){
                //уменьшаем размер изобр и сохр в папку imgsmall
                $typeImg = explode('/', $typeImg)[1];
                changeImage(150, 220, $pathBig, $pathSmall, $typeImg);
            }
            if($flag == 1){
                //обновляем только поле с путем изображения
                $query = "UPDATE books SET author='$author', publishing='$publishing', title='$title', pathBig='$pathBig', pathSmall='$pathSmall', price='$price', price_old='$price_old', description='$description', year='$year', isbn='$isbn', pages='$pages', type='$type', edition='$edition', weight='$weight', age='$age' WHERE id = $id";
                $mysqli->query($query);
            
                $message = ['text' => "Данные книги изменены!", 'status' => 'successful'];
                
            }else{
                //иначе $flag = 0 и мы добавляем новую книгу
                $query = "INSERT INTO books (id, author, publishing, title, pathBig, pathSmall, price, price_old, description, year, isbn, pages, type, edition, weight, age) VALUES (null, '$author', '$publishing', '$title','$pathBig', '$pathSmall', '$price', '$price_old', '$description', '$year', '$isbn', '$pages', '$type', '$edition', '$weight', '$age')";
                $mysqli->query($query);
            
                $message = ['text' => "Книга добавлена!", 'status' => 'successful'];  
            }
        }else{
            //$flag = 1 и не меняем фото книги обновляем все поля кроме путей к файлу
            $query = "UPDATE books SET author='$author', publishing='$publishing', title='$title',  price='$price', price_old='$price_old', description='$description', year='$year', isbn='$isbn', pages='$pages', type='$type', edition='$edition', weight='$weight', age='$age' WHERE id = $id";
            $mysqli->query($query);
            
            $message = ['text' => "Данные книги изменены!", 'status' => 'successful'];
        }
            
            
    }
}
        
        
        

        /*if($flag == 1){
            //пользователь менял изображения книги
            if($_FILES['userfile']['name']){
                //делаем транслит имени файла
                $fileName = translit($_FILES['userfile']['name']);
      
                $pathBig = 'img/'.$fileName;
                $pathSmall = 'img/imgsmall/'.$fileName;
                $typeImg = $_FILES['userfile']['type'];

                if(
                    $typeImg != 'image/jpeg'||
                    $typeImg != 'image/png' ||
                    $typeImg != 'image/gif'){
                    $message = ['text' => "Файл не является изображением!", 'status' => 'warning'];
                }
                if(move_uploaded_file($_FILES['userfile']['tmp_name'], $pathBig)){
                    //уменьшаем размер изобр и сохр в папку imgsmall
                    $typeImg = explode('/', $typeImg)[1];
                    changeImage(150, 220, $pathBig, $pathSmall, $typeImg);
                }
                //обновляем только поле с путем изображения
                $query = "UPDATE books SET pathBig='$pathBig', pathSmall='$pathSmall' WHERE id = $id";
                $mysqli->query($query);  
                
            }
            //обновляем оставшиеся поля
            $query = "UPDATE books SET author='$author', publishing='$publishing', title='$title',  price='$price', price_old='$price_old', description='$description', year='$year', isbn='$isbn', pages='$pages', type='$type', edition='$edition', weight='$weight', age='$age' WHERE id = $id";
            $mysqli->query($query);
            
            $message = ['text' => "Данные книги изменены!", 'status' => 'successful'];
            
        }else{
        //если данные были получены при добавлении новой книги    
        $fileName = translit($_FILES['userfile']['name']);
      
        $pathBig = 'img/'.$fileName;
        $pathSmall = 'img/imgsmall/'.$fileName;
        $typeImg = $_FILES['userfile']['type'];
       
        if(
            $typeImg != 'image/jpeg'||
            $typeImg != 'image/png' ||
            $typeImg != 'image/gif'){
            $message = ['text' => "Файл не является изображением!", 'status' => 'warning'];
        }
        
        //перемещаем изображение из врем папки в папку img
        if(move_uploaded_file($_FILES['userfile']['tmp_name'], $pathBig)){
            //уменьшаем размер изобр и сохр в папку imgsmall
            $typeImg = explode('/', $typeImg)[1];
            changeImage(150, 220, $pathBig, $pathSmall, $typeImg);
            }
        $query = "INSERT INTO books (id, author, publishing, title, pathBig, pathSmall, price, price_old, description, year, isbn, pages, type, edition, weight, age) VALUES (null, '$author', '$publishing', '$title','$pathBig', '$pathSmall', '$price', '$price_old', '$description', '$year', '$isbn', '$pages', '$type', '$edition', '$weight', '$age')";
        $mysqli->query($query);
            
        $message = ['text' => "Книга добавлена!", 'status' => 'successful'];  
        }
    }
}*/
//формирование галереи в админ
getGalleryAdmin($mysqli);





