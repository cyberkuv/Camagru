<!DOCTYPE html>
<html lang="en-US">
<head>
    <title>
        <?php
            session_start();
            echo 'Logged in as ' . $_SESSION['signin'];
        ?>
        || Camagru
    </title>
    <link rel="stylesheet" href="./css/prof-cam.css">
    <link rel="navigation_bar icon" href="./image/camera.png"/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
<div id="nav">
    <div id="session">
        <?php
            session_start();
            echo 'Welcome Back ' . $_SESSION['signin'];
        ?>
    </div>
    <a href="Gallery.php"><div id="nav-content1"><button id="nav-content">Gallery?</button></div></a>
    <a href="update.php"><div id="nav-content1"><button id="nav-content">Edit?</button></div></a>
    <a href="notify.php"><div id="nav-content1"><button id="nav-content">Notify?</button></div></a>
    <a href="sign_out.php"><div id="nav-content1"><button id="nav-content">Signout?</button></div></a>
</div>

<div id="bt2">
    <div id="btns">
        <button onclick="myNone()">Normal</button><br>
        <button onclick="myGray()">Grayscale</button><br>
        <button onclick="mySaturate()">Saturate</button><br>
        <button onclick="myOpacity()">Opacity</button><br>
        <button onclick="myBrightness()">Brightness</button><br>
        <button onclick="myContrast()">Contrast</button><br>
        <button onclick="mySepia()">Sepia</button><br>
        <button onclick="myBlur()">Blur</button><br>
        <button onclick="myInvert()">Invert</button><br>
        <button onclick="myHuerotate()">Hue-rotate</button>
        <button onclick="myDropShadow()">Drop-Shadow</button>
    <form method="POST" action="user_upload.php" enctype="multipart/form-data">
        <img width="400" height="300" src="" alt="">
        <input type="file" name="img2" id="img2">
        <input type="hidden" name="img3" id="img3" value="">
        <input type="submit" name="insert" id="insert" value="insert">
    </form>
    </div>
</div>

<div id="cam-bx">
<div class="camera">
  <form method="POST" action="upload.php">
    <video id="video" autoplay="true"></video>
    <canvas id="canvas" width="640" height="480"></canvas>
    <input type="hidden" name="image" id="img">
    <canvas id="canvas2" width="640" height="480"></canvas>
    <a><img src="./image/camera.png" alt="capture" id="snap"></a>
    <button type="Submit" class="btn" name="delete">Clear..</button>
    <button type="Submit" class="btn" name="save">Save</button>
  </form>
</div>
</div>

<div class="filter">
    <button onclick="add_filters(0);"><img class="stickers" src="./filters/5d99688b4a6538c9394c0675746dd06c.png" alt="asta"></button>
    <button onclick="add_filters(1);"><img class="stickers" src="./filters/465d5167f497eae3c05d7bf7d7c617c1.png" alt="Wanted poster"></button>
    <button onclick="add_filters(2);"><img class="stickers" src="./filters/210840_jnLJlp7kSsg8P3NiqSKTvMNBO.gif" alt="venom"></button>
    <button onclick="add_filters(3);"><img class="stickers" src="./filters/Beanie-PNG-HD.png" alt="Beanie"></button>
    <button onclick="add_filters(4);"><img class="stickers" src="./filters/christmas-hat-png-1.png" alt="christmas hat"></button>
    <button onclick="add_filters(5);"><img class="stickers" src="./filters/DKzPipPXUAALzaE.png" alt="christmas hat"></button>
    <button onclick="add_filters(6);"><img class="stickers" src="./filters/Monkey-D-Luffy-Transparent-PNG.png" alt="christmas hat"></button>
    <button onclick="add_filters(7);"><img class="stickers" src="./filters/PHP-Logo-PNG-Picture.png" alt="christmas hat"></button>
    <button onclick="add_filters(8);"><img class="stickers" src="./filters/PostgreSQL_logo.3colors.540x557.png" alt="christmas hat"></button>
    <button onclick="add_filters(9);"><img class="stickers" src="./filters/shirtpage_headerimage_git@2x-843f6ee42ce981a023ac5008217d494a70893d8186abc089367d750e76154100.png" alt="christmas hat"></button>
    <button onclick="add_filters(10);"><img class="stickers" src="./filters/spider_PNG45.png" alt="christmas hat"></button>
    <button onclick="add_filters(11);"><img class="stickers" src="./filters/super_albino_llama_by_dj88-d2w5oc9.png" alt="christmas hat"></button>
</div><br><br><br>

<div id="prev">
    <h1 class="prevtxt">Preview!</h1>
        <?php
            require './config/database.php';

            session_start();
                try{
                    $stmt = $connect->query("SELECT * FROM images");
                    while ($row = $stmt->fetch()){
                        $newd = date_format(date_create($row['reg_date']), 'D d M Y');
                        $fig = "<figure>";
                        $capt = "<figcation> <h3>".$row['userid']."</h3><p>".$newd."</p>".htmlspecialchars($row['img_title'])."</figcaption>";
                        $img = "<img class=\"images\" name=\"".$row['img_title']."\" id=\"".$row['reg_date']." \"src=\"".$row['img_base64']."\" width=\"50%\">";
                        // $form = "<form name=\"".$row['reg_date']."\" action=\"like.php\" method=\"POST\"><input type=\"hidden\" name=\"page\" value=\"gallery\"><input type=\"hidden\" name=\"hidden\" value=\"".$row['reg_date']."\"><input type=\"submit\" name=\"btn\" value=\"likes : ".$row['likes']."\"></form>";
                        $com = "<div><a href=\"http://localhost:8080/Camagru/img_del.php?reg_date=".$row['reg_date']."\"><button>DELETE</button></a></div>";
                        $fig2 = "</figure>";
                        echo $fig.$capt.$img.$com.$fig2;
                    }
                }
                catch(PDOException $e){
                    echo $connnect . "<br>" . $e->getMessage();
                }
    ?>
</div><br><br><br><br>
</body>
<footer id="bt-nav">&copy; eonwe
    <a href="del_acc.php"><div><button>Del Acc</button></div></a>
</footer>
<script src="./javascript/camera.js"></script>
</html>