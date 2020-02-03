<?php
//session_start();
//include('server.php');
//если форма отправилась
print_r($_POST);
if($_SESSION['auth']) echo 'true'; else echo 'false';
if($_POST['sbm']){
    //если пользователь авторизован
    if($_SESSION['auth']){
        //admin = 1
        if($status == 1){
            header("Location: admin/index.php");
        }else{
            header("Location: index.php");
        }
    }else{?>
        <h3><?=$_SESSION['info'] ?></h3>
        <form action="server.php" method="post">
            <input type="text" name="login" value="<?=$_SESSION['login']?>">
            <input type="password" name="pass" value="<?=$_SESSION['pass']?>">
            <input type="submit" name="sbm" value="Войти">
        </form>
    <?php }
    
}else {?>

    <form action="server.php" method="post">
        <input type="text" name="login" value="<?=$_SESSION['login']?>">
        <input type="password" name="pass" value="<?=$_SESSION['pass']?>">
        <input type="submit" name="sbm" value="Войти">
    </form>
<?php }?>
   
<a href="out.php">Выйти</a>