<?php
    require './config/database.php';

    if(isset($_POST['del'])){
        $email = trim($_POST['email']);

        $sql = $connect->prepare("DELETE FROM `users` WHERE email='$email'");
        $sql->execute();
        echo 'Account Successfully Deleted!';
        header('refresh:3; url="index.php"');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/profile.css">
    <title>Camagru || Acc Delete</title>
</head>
<body>
    <div id="container">
        <form method="POST" action="">
            <input type="email" name="email" placeholder="Insert You Email Address!" required>
            <button name="del"><b>DELETE YOUR ACCOUNT SIR/MADAM!</b></button>
        </form>
    </div>
</body>
</html>