<?php
    try {
        $dsn = 'mysql:host=docker-mysql;dbname=hellodb;charset=utf8;port=3306';
        $pdo = new PDO($dsn, 'root', 'secret');
        echo "Connection to the MySQL database established successfully";
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
