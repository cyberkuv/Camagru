<?php
    require './config/database.php';
    
    if(isset($_POST['change'])){
        $email = trim($_POST['email']);

        $sql = $connect->prepare("UPDATE `users` SET conf=true WHERE email='$email'");
        $sql->execute();
        echo 'Account Successfully Confirmed!';
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
    <link rel="navigation_bar icon" href="./image/camera.png"/>
    <title>Camagru || Account Verification!</title>
</head>
<body>
    <div id="form">
            <h1>Verify Your Account!</h1>
        <form action="verify.php" method="POST">
            <label for="email">@email</label>
            <div><input type="email" name="email" Placeholder="Insert Email To Verify Account!"></div><br>
            <div><input type="submit" name="change"></div>
        </form>
    </div>
</body>
</html>