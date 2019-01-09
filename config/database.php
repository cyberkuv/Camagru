<?php

    session_start();

    $DB_DSN='mysql:host=localhost;dbname=camagru';
    $DB_USER="root";
    $DB_PASSWORD="emmanuel";

    try {
        $connect = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $e) {
        echo "Connect Failure: " . $e->getMessage();
    }
    
?>