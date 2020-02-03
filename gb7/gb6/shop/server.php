<?php
session_start();
include('connect.php');
include('function.php');
$login = (!empty($_POST['login']))?strip_tags($_POST['login']):"";
$pass = (!empty($_POST['pass']))?strip_tags($_POST['pass']):"";

print_r($_POST);

$_SESSION['login'] = $login;
$_SESSION['pass'] = $pass; 

$query = "SELECT * FROM users WHERE login='$login' and password='$pass'";
$res = $mysqli->query($query) or die(mysqli_error($mysqli));

if(mysqli_num_rows($res)==1){
    $_SESSION['auth'] = true;
    //если админ - 1, если зарег пользователь - 2;
    $status = ($_SESSION['login'] == 'admin') ? 1 : 2;
    $_SESSION['info'] = 'Привет, '.$_SESSION['login'];
    if($status == 1){
        //если админ, редирект на стр администратора
        header("Location: admin/index.php");
    }else header("Location: pageUsers.php");
}else{
    $_SESSION['auth'] = false;
    $_SESSION['info'] = 'Ошибка, пользователь '.$_SESSION['login'].' не найден или неверный пароль!';
    header("Location: pageUsers.php");
}
