<?php

if(isset($_GET['sbm'])){
    if($_GET['x'] == null || $_GET['y'] == null ){
        echo "error! not all fields are filled";
    }else{
        if(is_numeric($_GET['x']) && is_numeric($_GET['y'])){
            $x = htmlspecialchars($_GET['x']);
            $y = htmlspecialchars($_GET['y']);

            if($_GET['action'] == 'sum') $result = $x + $y; 
            if($_GET['action'] == 'dif') $result =  $x - $y; 
            if($_GET['action'] == 'mult') $result = $x * $y; 
            if($_GET['action'] == 'div'){
                if($y != 0) $result = round(($x / $y),2); 
                else echo "error! y = 0";
            } 
        } else echo "Error, not is numeric!";
    }
}

