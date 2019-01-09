<!doctype html>
<html>
<head>
    <title>Make Changes || Camagru</title>
    <link rel="stylesheet" href="./css/update.css">
    <link rel="navigation_bar icon" href="./image/camera.png"/>
</head>
<body>
        <div id="nav">
            <div id="session">
            <?php
                session_start();
                echo 'Make Changes to ' . $_SESSION['signin'];
            ?>
            </div>
            <a href="profile.php"><div id="nav-content1"><button id="nav-content">Profile?</button></div></a>
            <a href="sign_out.php"><div id="nav-content1"><button id="nav-content">Signout?</button></div></a>
            <a href="Gallery.php"><div id="nav-content1"><button id="nav-content">Gallery?</button></div></a>
        </div>
    <div id="form">
        <img src="./image/camera.png" alt="logo">
        <h1>Change Cridentials!</h1>
            <p>Now You Change Your Cridentials in case you got married or something!</p>
        <hr>

        <form method="POST" action="info.php">
                <div><label for="email">@email</label></div>
            <input type="email" name="email" placeholder="email address please" required>
                <div><label for="username">Username</label></div>
            <input type="text" name="username" placeholder="Username please" required>
                <div><label for="firstname">Firstname</label></div>
            <input type="text" name="firstname" placeholder="firstname please" required>
                <div><label for="lastname">Surname</label></div>
            <input type="text" name="lastname" placeholder="Surname please" required>

            <div class="upd-div"><input id="update" type="submit" name="change" value="Update"></div>
        </form>
    </div>
</body>
<footer id="bt-nav">eonwe &copy all rights reserved for Emmanuel</footer>
</html>