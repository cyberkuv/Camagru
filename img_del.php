<?php

    require './config/database.php';

    $reg = $_GET['reg_date'];
    try{
        session_start();
        $usr = $_SESSION['signin'];
        $stmt = "DELETE FROM images WHERE reg_date='$reg' AND userid='$usr'";
        $connect->exec($stmt);
        echo "Image successfully deleted";
        header('refresh:3; url="profile.php"');
    }
    catch(PDOException $e){
        echo $sql . "<br>" . $e->getMessage();
    }
?>