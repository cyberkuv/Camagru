<?php
    require './config/database.php';

    if(isset($_POST['del-send'])){
        $email = trim($_POST['email']);
        $check = $connect->prepare("SELECT `email` FROM `users` WHERE `email`=?");
        $check->bindValue(1, $email);
        $check->execute();
        if($check->rowCount() == 0){
            die("Email Does Not Exist!");
        }
        else {
            $header = 'Camagru || Account Deletion!';
            $message = 'Click the Following'."<br>".'http://localhost:8080/eonwe/del_del.php?email=$email'."<br>".'To Delete Your Account!';
            mail("$email", "$header", "$message");
            echo "Delete Link Sent to ".htmlspecialchars($email);
            header('refresh:5; url="del_del.php');
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/password_reset.css">
    <title>Camagru || Leaving</title>
</head>
<body>
<div id=bxxxx>
    <div class="modal">
        <form class="modal-content" method="POST" action="del_acc.php">
            <div class="container">
        <h4>Leaving Us</h4>
            <p>Why You Leaving Us So Soon!</p>
        <hr>
            <label for="email"><b>Email</b></label>
            <input type="email" placeholder="Enter Email" name="email" required>

            <div class="clearfix">
                <button type="submit" name="del-send" class="signupbtn"><b>Send!</b></button>
            </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>
