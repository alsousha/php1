<?php
header('Location: /gb4_2/index.php');
//если файл отправлен
if(isset($_POST['sbm'])){
    
    //перебираем кажд изобр и сохр в больш и мал папки
    for($i=0; $i<count($_FILES['photo']['name']); $i++){
        $name = $_FILES['photo']['name'][$i];
        $pathBig = 'img/big_img/'.$name;
        $pathSmall = 'img/small_img/'.$name;

        if(move_uploaded_file($_FILES['photo']['tmp_name'][$i], $pathBig)){
            echo "file $name added<br>";
        }  else echo "error added";
    }
    //копирование файлов из big_img в small_img; уменьшение размера изобр
    $files = array_diff(scandir('img/big_img/'), ['.', '..']);
    foreach($files as $elem){
        copy('img/big_img/'.$elem, 'img/small_img/'.$elem);
    }
    //уменьшение размера изобр
    $files = array_diff(scandir('img/small_img/'), ['.', '..']);
    include('function.php');
    foreach($files as $elem){
        if(resize("img/small_img/$elem", 100));
    }
}


    






