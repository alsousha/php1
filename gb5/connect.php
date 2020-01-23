<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 'on');
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $db = 'geekbrains';

$mysqli = @new mysqli($host, $user, $password, $db);
if($mysqli->connect_errno) exit('Error on connect');