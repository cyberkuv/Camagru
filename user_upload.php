<?php

    require './config/database.php';

    session_start();

    $pic = $_POST['img3'];
        $e=0;
        try{
            $usr = $_SESSION['signin'];
            $tmp = $connect->query("SELECT * FROM users");
                while ($row = $tmp->fetch()){
                    if ($row['email'] === $usr){
                        $email = $row['email'];
                        $e = 1;
                        break ;
                    }
                }
                if ($e == 1){
                    $sql = "INSERT INTO images (userid, email, img_base64, likes) 
                        VALUES ('$usr','$email','$pic','0')";
                    $connect->exec($sql);
                    echo 'Image succesfully uploaded. You will be redirected in 3seconds';
                    header('refresh:1; url="profile.php"');
                }
        }
        catch(PDOException $e){
            echo $connnect . "<br>" . $e->getMessage();
        }
?>