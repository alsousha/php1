<?php
include('constant.php');
include('function.php');
include('connect.php');

//если активирована ссылка удаления, удаляем из 2х таблиц и из папок
if(isset($_GET['del'])){
    $name = $_GET['del'];
    $query = "DELETE FROM galleryBig WHERE name = '$name'";
    $mysqli->query($query);
    
    $query = "DELETE FROM gallerySmall WHERE name = '$name'";
    $mysqli->query($query);
    
    unlink('img/small_img/'.$name);
    unlink('img/big_img/'.$name);
   } 


$message['status'] ='';
$message['text'] = '';
$files = array_diff(scandir('img/big_img/'), ['.', '..']);
//если файл отправлен
if(isset($_POST['sbm'])){
    $count = count($_FILES['photo']['name']);
    
    for($i=0; $i<$count; $i++){
        $name = translit($_FILES['photo']['name'][$i]);
        $pathBig = PHOTO_BIG.$name;
        $pathSmall = PHOTO_SMALL.$name;
        $sizeBig = $_FILES['photo']['size'][$i];
        $type = $_FILES['photo']['type'][$i];
        
        if($_FILES['photo']['error'][$i]){
            $message = ['text' => 'error adding file', 'status' => 'warning'];
        }elseif ($sizeBig > 10000000){
            $message = ['text' => 'error, file too big', 'status' => 'warning'];
        }elseif (
            $type == 'image/jpeg'||
            $type == 'image/png' ||
            $type == 'image/gif'){
                //$name = translit($name);
            
                if(move_uploaded_file($_FILES['photo']['tmp_name'][$i], $pathBig)){
                    $type = explode('/', $type)[1];

                    changeImage(200, 150, $pathBig, $pathSmall, $type);
                    $message = ['text' => "file added", 'status' => 'successful'];
                    $sizeSmall = filesize($pathSmall);

                    //запрос добавления большого изображения
                    $query = "INSERT INTO galleryBig (path, size, name, type) VALUES ('$pathBig', '$sizeBig', '$name', '$type')";
                    $mysqli->query($query);
                    //запрос добавления уменьшенного изображения
                    $query = "INSERT INTO gallerySmall (path, size, name, type) VALUES ('$pathSmall', '$sizeSmall', '$name', '$type')";
                    $mysqli->query($query);    
                }else 
                    $message = ['text' => 'error adding file', 'status' => 'warning'];
        }else
            $message = ['text' => 'error, file is not image', 'status' => 'warning'];
    }  
}
//скрипт для подсчета кол-ва просмотра. Не работает, так как не знаю как передать гэт запрос с картинкой
if(isset($_GET['img'])){
    $name = $_GET['img'];
    $query = "SELECT `count` FROM galleryBig WHERE name = '$name'";
    $result = mysqli_fetch_assoc($mysqli->query($query)); 
    $count = $result['count']+1;
   $query = "UPDATE galleryBig SET `count` = '$count' WHERE name = '$name";
   $mysqli->query($query); 
} 

?>

    






















