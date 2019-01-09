<?php

    require './config/database.php';

    if(isset($_POST['change'])){
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        $rpassword = trim($_POST['repeat_password']);

        if($password != $rpassword){
            die("Passwords Do Not Match!");
        }
        if(strlen($password) < 5){
            die('password must contain at least 8 characters!');
        }
        if (!preg_match("#[0-9]+#",$password)){
            die('Your Password Must Contain At Least 1 Number!');
        }
        if (!preg_match("#[a-z]+#",$password)){
            die('Your Password Must Contain At Least 1 LowerCase Letter');
        }
        if (!preg_match("#[A-Z]+#",$password)){
            die('Your Password Must Contain At Least 1 UpperCase Letter!');
        }
        else{
            $password = md5($password);
            $sql = $connect->prepare("UPDATE `users` SET password='$password' WHERE email='$email'");
            $sql->execute();
            echo 'Password Successfully Change!';
            header('refresh:3; url="index.php"');
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/password_reset.css">
    <title>Camagru || PassWord Change</title>
</head>
<body>
<div id=bxxxx>
    <div class="modal">
        <form class="modal-content" method="POST" action="passreset.php">
            <div class="container">
        <h4>Change Password</h4>
            <p>Now you Casn Get A New Password!</p>
        <hr>
            <label for="email"><b>Email</b></label>
            <input type="email" placeholder="Enter Email" name="email" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" required>

            <label for="psw"><b>Repeat Password</b></label>
            <input type="password" placeholder="Repeat New Password" name="repeat_password" required>

            <div class="clearfix">
                <button type="submit" name="change" class="signupbtn">Change!</button>
            </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>