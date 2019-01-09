<?php
    require './config/database.php';

    session_start();

    $pic = $_POST['image'];
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

                    $header = 'Camagru || Upload';
                    $message = 'Image Successfully Uploaded!';
                    mail("$email", "$header", "$message");
                    echo "Success Message Sent To ".$email;
                    header('refresh:0; url="profile.php"');
                }
        }
        catch(PDOException $e){
            echo $connnect . "<br>" . $e->getMessage();
        }
?>
