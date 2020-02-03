<?php
print_r($_GET);
if(isset($_GET['sum']) || isset($_GET['dif']) || isset($_GET['mult']) || isset($_GET['div'])){
    if($_GET['x'] == null || $_GET['y'] == null ){
        echo "error! not all fields are filled";
    }else{
        if(is_numeric($_GET['x']) && is_numeric($_GET['y'])){
            $x = htmlspecialchars($_GET['x']);
            $y = htmlspecialchars($_GET['y']);

            if(isset($_GET['sum'])) $result = $x + $y; 
            if(isset($_GET['dif'])) $result =  $x - $y; 
            if(isset($_GET['mult'])) $result = $x * $y; 
            if(isset($_GET['div'])){
                if($y != 0) $result = round(($x / $y),2); 
                else echo "error! y = 0";
            } 
        } else echo "Error, not is numeric!";
    }
        
    
    
}

