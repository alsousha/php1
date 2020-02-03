<?php

function getGalleryAdmin($mysqli)
{
    $query = "SELECT * FROM books"; 
    $result = $mysqli->query($query); 
    $content ='';

    if (mysqli_num_rows($result) > 0) { 
    while($book = mysqli_fetch_assoc($result)) {
        
        $id = $book['id'];
        $title = $book['title'];
        $author = $book['author'];
        $price_old = $book['price_old'];
        $price = $book['price'];
        $publishing = $book['publishin'];
        $year = $book['year'];
        $isbn = $book['isbn'];
        $pages = $book['pages'];
        $type = $book['type'];
        $edition = $book['edition'];
        $weight = $book['weight'];
        $age = $book['age'];
        $description = $book['description'];
        $pathBig = $book['pathBig'];
        $pathSmall = $book['pathSmall'];
        
        $content .= '<div class="main-item-admin">';
        $content .= '<a href="../pageBook.php?id='.$id.'"><img class="img_book" src="'.$pathSmall.'" alt="'.$title.'"><br/><span class="author">'.$author.'</span><br>'.$title.'</a><br><br>';
        $content .= '<a class="edit" href="editBook.php?edit='.$id.'">Edit</a>';
        $content .= '<a class="del" href="?del='.$id.'">Delete</a>';
        $content .= '</div>';
       }
    }
   return $content;
}

function translit($string) {
      $translit = array(
        'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'yo', 'ж' => 'zh',
        'з' => 'z', 'и' => 'i', 'й' => 'j', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o',
        'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c',
        'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sch', 'ы' => 'y', 'ъ' => '', 'ь' => '', 'э' => 'eh', 'ю' => 'yu', 'я'=>'ya');

      return str_replace(' ', '_', strtr(mb_strtolower(trim($string)), $translit));
   }

function changeImage($h, $w, $src, $newsrc, $type) {
    $newimg = imagecreatetruecolor($h, $w);
    switch ($type) {
      case 'jpeg':
        $img = imagecreatefromjpeg($src);
        imagecopyresampled($newimg, $img, 0, 0, 0, 0, $h, $w, imagesx($img), imagesy($img));
        imagejpeg($newimg, $newsrc);
        break;
      case 'png':
        $img = imagecreatefrompng($src);
        imagecopyresampled($newimg, $img, 0, 0, 0, 0, $h, $w, imagesx($img), imagesy($img));
        imagepng($newimg, $newsrc);
        break;
      case 'gif':
        $img = imagecreatefromgif($src);
        imagecopyresampled($newimg, $img, 0, 0, 0, 0, $h, $w, imagesx($img), imagesy($img));
        imagegif($newimg, $newsrc);
        break;
    }
   }

