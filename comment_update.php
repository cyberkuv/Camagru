<?php
    require './config/database.php';

    $str = trim($_POST['com']);
    if (!empty($str)){
        session_start();
        $usr = $_SESSION['signin'];
        $reg = $_POST['hidden_txt'];
        $stmt = $connect->query('SELECT * FROM images');
        while ($row = $stmt->fetch()){
            if ($row['reg_date'] == $reg){
                if (!empty($row['comments'])){
                    $com = array();
                    $str = $usr." : ".$_POST['com'];
                    $com = unserialize($row['comments']);
                    array_push($com,$str);
                    $arr = serialize($com);
                }
                else{
                    $str = $usr." : ".$_POST['com'];
                    $com = array($str);
                    $arr = serialize($com);
                }
                $sql = "UPDATE images SET comments='$arr' WHERE reg_date='$reg'";
                $nw = $connect->prepare($sql);
                $nw->execute();
                if($row['noti'] == true){
                    $email = $row['email'];
                    $header = 'Camagru || Comment Notification!';
                    $message = 'Click the Following Link '."<br>".'http://localhost:8080/eonwe/gallery.php?email=$email'."<br>".'To View Comment!';
                    mail("$email", "$header", "$message");
                }
                header('refresh:0 url="gallery.php"');
            }
        }
    }
?>
