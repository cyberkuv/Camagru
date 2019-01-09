<!doctype html>
<html>
    <head>
        <title>
            Comment || Camagru
        </title>
        <link rel="stylesheet" href="./css/comment.css">
        <link rel="navigation_bar icon" href="./image/camera.png"/>
    </head>
    <body>
    </body>
</html>
<?php
    require './config/database.php';

    session_start();

    if (!isset($_SESSION['signin']) || $_SESSION['signin'] === "")
        header('Location: index.php');
    else{
        $reg = $_GET['reg_date'];
        $usr = $_SESSION['signin'];
        $stmt = $connect->query('SELECT * FROM images');
        while ($row = $stmt->fetch()){
            if ($row['reg_date'] == $reg){
                $gal = "<div id=\"nav\"><a href=\"Gallery.php\"><div id=\"nav-content1\"><button id=\"nav-content\">Back to Gallery</button></div></a></div>";
                $newd = date_format(date_create($row['reg_date']), 'D d M Y');
                $fig = "<figure>";
                $capt = "<figcation> <h3>".$newd." by ".$row['userid']."</h3><p>".$row['img_title']."</p></figcaption>";
                $img = "<img class=\"images\" name=\"".$row['img_title']."\" id=\"".$row['reg_date']." \"src=\"".$row['img_base64']."\" width=\"50%\">";
                $form = "<form name=\"".$row['reg_date']."\" action=\"like.php\" method=\"POST\"><input type=\"hidden\" name=\"page\" value=\"comment\"><input type=\"hidden\" name=\"hidden\" value=\"".$row['reg_date']."\"><input type=\"submit\" name=\"btn\" value=\"likes : ".$row['likes']."\"></form>";
                $fig2 = "</figure>";
                echo $gal.$fig.$capt.$img.$form.$fig2;
                echo "<div class=\"comme\">";
                if (isset($row['comments'])){
                    $com = array();
                    $com = unserialize($row['comments']);
                    foreach($com as $key=>$val){
                        echo htmlspecialchars($val)."<br/>";
                        
                        $msg = "Camagru || Comment";
                        $msgg = $val;
                        $text = "View comment @ http://localhost:8080/eonwe/Gallery.php";
                        mail($usr,$msg,$msgg,$text);
                    }
                }
                echo "</div>";
            }
        }
        echo "<form id=\"comi\" action=\"comment_update.php\" method=\"POST\">
                <input id=\"tt\" type=\"text\" name=\"com\" value=\"\" required/>
                <input type=\"hidden\" name=\"hidden_txt\" value=\"".$reg."\">
                    <input type=\"hidden\" name=\"usr\" value=\"".$usr."\">
                        <input id=\"ttt\" type=\"submit\" value=\"Comment\"></form>";
        echo "</body></html>";
    }
?>
