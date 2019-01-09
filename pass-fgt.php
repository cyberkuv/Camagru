<?php
    require './config/database.php';

    if(isset($_POST['passfgt'])){
        $email = trim($_POST['email']);
        $check = $connect->prepare("SELECT `email` FROM `users` WHERE `email`=?");
        $check->bindValue(1, $email);
        $check->execute();
        if($check->rowCount() == 0){
            die("Email Does Not Exist!");
        }
        else {
            $header = 'Camagru || PassReset';
            $message = 'Click the Following'."<br>".'http://localhost:8080/eonwe/passreset.php?email=$email'."<br>".'To Reset Your Password!';
            mail("$email", "$header", "$message");
            echo "Password Reset Link Sent to ".htmlspecialchars($email);
            header('refresh:5; url="index.php');
        }
    }
?>
