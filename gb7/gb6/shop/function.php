<?php
//include('connect.php');
function getGallery($mysqli)
{
    $query = "SELECT * FROM books"; 
    $result = $mysqli->query($query); 
    $content ='';

    if (mysqli_num_rows($result) > 0) { 
    while($book = mysqli_fetch_assoc($result)) {
        $id = $book['id'];
        $title = $book['title'];
        $author = $book['author'];
        $pathSmall = 'admin/'.$book['pathSmall'];
        $price_old = $book['price_old'];
        $price = $book['price'];

        $content .= '<div class="main-item-admin">';
        $content .= '<a href="pageBook.php?id='.$id.'"><img class="img_book" src="'.$pathSmall.'" alt="'.$title.'"><br/><span class="author">'.$author.'</span>'.$title.'</a><br><br>';
         $content .= '<div class="book-price">';
        $content .= '<span class="line-through">'.$price_old.' &#8399;</span>';
        $content .= '<span class="price">'.$price.' &#8399;</span><input type="button" value="Купить">';
        $content .= '</div></div>';
       }
    }
   return $content;
}

function getPageBook($mysqli)
{
    $id = $_GET['id'];
    $query = "SELECT * FROM books WHERE id = '$id'"; 
    $result = $mysqli->query($query); 
    $book =$result->fetch_assoc();
    return $book;   
}

function setReview($mysqli)
{
     
        if(!empty($_POST['name']) && !empty($_POST['messenge']) && !empty($_POST['email'])){
            $email = htmlspecialchars($_POST['email']);
            $name = htmlspecialchars($_POST['name']);
            $age = $_POST['age'];
            $text= htmlspecialchars($_POST['messenge']);
            $spam = (isset($_POST['spam'])) ? 1 : 0;
            //$spam = $_POST['spam']; 
            $date = date('Y-m-d H:i:s', time());
            
            $result = "INSERT INTO `contacts` (id, name, email, age, text, spam, date) VALUES (null, '$name', '$email', '$age', '$text', '$spam', '$date')";
            $mysqli->query($result);
            
            return['text'=>'form addeded', 'status'=>'successful'];      
        }else return ['text'=>'error! not all fields are filled', 'status'=>'warning']; 
}

function getReview($mysqli)
{
    $content = '';
   $query = "SELECT * FROM contacts";
    $result=$mysqli->query($query);

    if (mysqli_num_rows($result) > 0) { 
        while($row = mysqli_fetch_assoc($result)) { 
            $content .= '<div class="review">';
            $content .= '<p class="userName">'.$row['name'].' '.date('Y-m-d', time()); 
            $content .= '<p class="text">'.$row['text'].'</p>';
            $content .= '</div>';
        }
    }
    return $content;
}

function getAuth($auth)
{
    $title =($auth == 1) ? '<a href="out.php">Выйти</a>' : '<a href="pageUsers.php">Войти</a> | <a href="pageUsers.php">Зарегистрироваться </a>' ; 
      
    $tpl = file_get_contents('elems/auth.tpl');
    $pattern = '/{title}/';
    $c = preg_replace($pattern, $title, $tpl);
    return $c;
}
            
              
              




