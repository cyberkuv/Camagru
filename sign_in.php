<?php
    require './config/database.php';
    
    session_start();

    if(isset($_POST['signin'])) {

        $email = $_POST['email'];
        $password = $_POST['password'];
        $password = md5($password);

        $query = $connect->prepare("SELECT COUNT(`userid`) FROM `users` WHERE `email` = '$email' AND `password` = '$password' AND conf=true");
        $query->execute();
        $count = $query->fetchColumn();

        if($count == "1") {
            $_SESSION['signin'] = $email;
            header('location: profile.php');
        }
        else{
            echo 'Incorrect email and Password combination!'."<br>".'OR'."<br>".'User Does Not Exist!'."<br/>"."OR"."<br/>"."Account Not Verified!(Check Registration email for verification Link!)";
            header('refresh:5; url="index.php"');
        }
    }
?>