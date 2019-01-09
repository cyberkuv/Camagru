<?php
    require './config/database.php';

    if(isset($_POST['change'])){
        $username = trim($_POST['username']);
        $firstname = trim($_POST['firstname']);
        $lastname = trim($_POST['lastname']);
        $email = trim($_POST['email']);

        $sql = $connect->prepare("UPDATE `users` SET firstname='$firstname', lastname='$lastname', username='$username' WHERE email='$email'");
        $sql->execute();
        echo 'Congratulations!! You Have Successfully updated your Credentials!';
        header('refresh:5; url="update.php"');
    }
?>
