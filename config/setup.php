<?php
    $host = "localhost";
    $user = "root";
    $pass = "emmanuel";
    $db = "Camagru";
    try{
       $connect = new PDO("mysql:host=$host", $user, $pass);
       $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "connected to localhost <br/>";
    }
    catch (PDOException $e){
        echo "error ".$e->getMessage();
    }
    try{
       $sql = "CREATE DATABASE ".$db;
       $connect->exec($sql);
       echo "Database created <br/>";
    }
    catch (PDOException $e){
       echo "failed to create database ".$e->getMessage();
    }
    try{
        $connect = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $user_table = "CREATE TABLE users (
            userid INT(255) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            firstname VARCHAR(255) NOT NULL,
            lastname VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL,
            username VARCHAR(255) NOT NULL,
            password VARCHAR(255) NOT NULL,
            noti BOOLEAN,
            conf BOOLEAN,
            code INT(6) UNSIGNED NOT NULL,
            reg_date TIMESTAMP
        )";
        $connect->exec($user_table);
        echo "table users successfully created";
        
        $img_table = "CREATE TABLE images (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        userid VARCHAR(30) NOT NULL,
        email VARCHAR(100) NOT NULL,
        img_title TEXT,
        img_base64 LONGTEXT NOT NULL,
        comments TEXT,
        likes INT(6) UNSIGNED,
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";
        $connect->exec($img_table);
        echo "table image successfully created";
        header('refresh:3; url="index.php"');
    }
    catch(PDOException $e){
        echo "error creating table".$e->getMessage();
    }
    $con = null;
?>