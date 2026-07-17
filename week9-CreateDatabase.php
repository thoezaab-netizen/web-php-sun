<?php
    $host = 'localhost';
    $username = 'root';
    $password = '';

    $pdo = new PDO(
        "mysql:host=$host", $username, $password);
    
    $pdo->setAttribute(
        PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>