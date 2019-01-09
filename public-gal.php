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
        <br>
        <h1>Public Gallery...</h1><br>
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
                        $fig2 = "</figure>";
                        echo $fig.$capt.$img.$form.$com.$fig2;
                    }
                }
                catch(PDOException $e){
                    echo $connnect . "<br>" . $e->getMessage();
                }
            ?>
        <div><br><br>
    </body>
    <footer id="bt-nav">&copy; eonwe</footer> 
</html>