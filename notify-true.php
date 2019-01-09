<?php
    require './config/database.php';

    if(isset($_POST['change'])){
        $email = trim($_POST['email']);

        $password = md5($password);
        $sql = $connect->prepare("UPDATE `users` SET noti=true WHERE email='$email'");
        $sql->execute();
        echo 'Notification Successfully Changed to TRUE!';
        header('refresh:3; url="profile.php"');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="navigation_bar icon" href="./image/camera.png"/>
    <link rel="stylesheet" href="./css/profile.css">
    <title>Camagru || Notifications</title>
</head>
<body>
<div id="nav">
    <div id="session">
    <?php
        session_start();
        echo 'Notifications!' ."<br>". $_SESSION['signin'];
    ?>
    </div>
    <a href="Gallery.php"><div id="nav-content1"><button id="nav-content">Gallery?</button></div></a>
    <a href="update.php"><div id="nav-content1"><button id="nav-content">Edit?</button></div></a>
    <a href="profile.php"><div id="nav-content1"><button id="nav-content">Profile?</button></div></a>
    <a href="sign_out.php"><div id="nav-content1"><button id="nav-content">Signout?</button></div></a>
</div>
    <div id="abs-form">
        <div id="form">
                <h1>Make False!</h1>
                <form action="notify.php" method="POST">
                    <label for="email">@email</label>
                    <div><input type="email" name="email" Placeholder="Insert Email To Make Changes!"></div><br>
                    <div><input type="submit" name="change"></div>
                </form>
            </div>
            <div id="form2">
                <h1>Make True!</h1>
                <form action="notify-true.php" method="POST">
                    <label for="email">@email</label>
                    <div><input type="email" name="email" Placeholder="Insert Email To Make Changes!"></div><br>
                    <div><input type="submit" name="change"></div>
            </form>
        </div>
    </div>
</body>
<footer id="bt-nav">&copy; eonwe
    <a href="del_acc.php"><div><button>Del Acc</button></div></a>
</footer>
</html>