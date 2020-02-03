<?php
    include('server.php');
?>
<br><br>
<form action="" method="get">
    <input type="text" name="x" placeholder="x" style="width: 50px" value="<?php if(isset($x)) echo $x?>">
    <select name="action">
        <option value="sum">+</option>
        <option value="dif">-</option>
        <option value="mult">*</option>
        <option value="div">/</option>
    </select>
    <input type="text" name="y" placeholder="y" style="width: 50px" value="<?php if(isset($y)) echo $y?>">
    <input type="submit" name="sbm" value="OK">
    <?php 
    if(isset($result)) :?>
        <p style="border: 1px solid grey; padding: 1px; width: 50px;"><?=$result?></p>
    <?php endif ?>
</form>


 