<?php
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $db_name = 'shop';

    $mysqli = @new mysqli($host, $user, $password, $db_name);
    if($mysqli->connect_errno) exit('Error on connect');
    $mysqli->set_charset('utf8');