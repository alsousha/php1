<?php
    include('server.php');
?>
<br><br>
<form action="" method="get">
    <input type="text" name="x" placeholder="x" style="width: 50px" value="<?php if(isset($x)) echo $x?>">
    <input type="text" name="y" placeholder="y" style="width: 50px" value="<?php if(isset($y)) echo $y?>"><br>
    <input type="submit" name="sum" value="sum">
    <input type="submit" name="dif" value="dif">
    <input type="submit" name="mult" value="mult">
    <input type="submit" name="div" value="div">
    <?php 
    if(isset($result)) :?>
        <p style="border: 1px solid grey; padding: 1px; width: 50px;"><?=$result?></p>
    <?php endif ?>
</form>