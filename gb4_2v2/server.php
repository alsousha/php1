<?php
include('constant.php');
include('function.php');

//если активирована ссылка удаления
if(isset($_GET['del'])){
       unlink('img/small_img/'.$_GET['del']);
       unlink('img/big_img/'.$_GET['del']);
   } 
$message['status'] ='';
$message['text'] = '';
$files = array_diff(scandir('img/big_img/'), ['.', '..']);
//если файл отправлен
if(isset($_POST['sbm'])){
    $count = count($_FILES['photo']['name']);
    
    for($i=0; $i<$count; $i++){
        $file = $_FILES['photo']['name'][$i];
        
        if($_FILES['photo']['error'][$i]){
            $message = ['text' => 'error adding file', 'status' => 'warning'];
        }elseif ($_FILES['photo']['size'][$i] > 10000000){
            $message = ['text' => 'error, file too big', 'status' => 'warning'];
        }elseif ($_FILES['photo']['type'][$i] == 'image/jpeg'||
        $_FILES['photo']['type'][$i] == 'image/png' ||
        $_FILES['photo']['type'][$i] == 'image/gif'){
        
            $file_en = translit($file);
            
            if(move_uploaded_file($_FILES['photo']['tmp_name'][$i], PHOTO_BIG.$file_en)){
        
                $path = PHOTO_SMALL.$file_en;
        
                $type = explode('/', $_FILES['photo']['type'][$i])[1];
            
                changeImage(200, 150, PHOTO_BIG.$file_en, $path, $type);
                $message = ['text' => "file $file_en added", 'status' => 'successful'];
            }else 
                $message = ['text' => 'error adding file', 'status' => 'warning'];
        }else
            $message = ['text' => 'error, file is not image', 'status' => 'warning'];
    }  
}
?>

<?php
//if (copy($_FILES['userfile']['tmp_name'], PHOTO.translit($_FILES['userfile']['name']))) {
//            
//          } else {$message = 'Ошибка загрузки файла!';}
    //script

    
//    foreach($_FILES as $elem){
//        //print_r($elem);
//        echo $elem['name'][$i];
//        echo '<br>';
//        $i++;
//    }
    
    
//    
        
    
//    //перебираем кажд изобр и сохр в больш и мал папки
//    for($i=0; $i<count($_FILES['photo']['name']); $i++){
//        $name = $_FILES['photo']['name'][$i];
//        $pathBig = 'img/big_img/'.$name;
//        $pathSmall = 'img/small_img/'.$name;
//
//        if(move_uploaded_file($_FILES['photo']['tmp_name'][$i], $pathBig)){
//            echo "file $name added<br>";
//        }  else echo "error added";
//    }
//    //копирование файлов из big_img в small_img; уменьшение размера изобр
//    $files = array_diff(scandir('img/big_img/'), ['.', '..']);
//    foreach($files as $elem){
//        copy('img/big_img/'.$elem, 'img/small_img/'.$elem);
//    }
//    //уменьшение размера изобр
//    //$files = array_diff(scandir('img/small_img/'), ['.', '..']);
//    include('function.php');
//    foreach($files as $elem){
//        if(resize("img/small_img/$elem", 100));
//    }



    






