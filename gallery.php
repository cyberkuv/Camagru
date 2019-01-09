<?php
?>

<!doctype html>
<html>
    <head>
        <title>Gallery || Camagru</title>
        <link rel="navigation_bar icon" href="./image/camera.png"/>
        <link rel="stylesheet" type="text/css" href="./css/profile.css">
    </head>
    <style>
        input {
            background-color: green;
            border: solid orangered;
            border-radius: 5vmin;
            color: white;
        }
    </style>
    <body>
    <div id="nav">
        <div id="session">
        <?php
            session_start();
            echo 'See The World! ' . $_SESSION['signin'];
        ?>
        </div>
        <a href="profile.php"><div id="nav-content1"><button id="nav-content">Profile?</button></div></a>
        <a href="sign_out.php"><div id="nav-content1"><button id="nav-content">Signout?</button></div></a>
        <a href="update.php"><div id="nav-content1"><button id="nav-content">Edit?</button></div></a>
    </div>
        <h1>Gallery...</h1>
        <div id="images-bg-bx">
            <?php

                require './config/database.php';

                try{
                    $stmt = $connect->query("SELECT * FROM images");
                    while ($row = $stmt->fetch()){
                        $newd = date_format(date_create($row['reg_date']), 'D d M Y');
                        $fig = "<figure>";
                        $capt = "<figcation> <h3>".$row['userid']."</h3><p>".$newd."</p>".htmlspecialchars($row['img_title'])."</figcaption>";
                        $img = "<img class=\"images\" name=\"".$row['img_title']."\" id=\"".$row['reg_date']." \"src=\"".$row['img_base64']."\" width=\"50%\">";
                        $form = "<form name=\"".$row['reg_date']."\" action=\"like.php\" method=\"POST\"><input type=\"hidden\" name=\"page\" value=\"gallery\"><input type=\"hidden\" name=\"hidden\" value=\"".$row['reg_date']."\"><input type=\"submit\" name=\"btn\" value=\"likes : ".$row['likes']."\"></form>";
                        $com = "<a href=\"http://localhost:8080/Camagru/comment.php?reg_date=".$row['reg_date']."\"><button>Comment</button></a>";
                        $fig2 = "</figure>";
                        echo $fig.$capt.$img.$form.$com.$fig2;
                    }
                }
                catch(PDOException $e){
                    echo $connnect . "<br>" . $e->getMessage();
                }
            ?>
        <div>
    </body>
    <footer id="bt-nav">&copy; eonwe</footer> 
</html>