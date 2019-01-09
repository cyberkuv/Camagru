<?php
require './config/database.php';

session_start();

if (!isset($_SESSION['signin']) || $_SESSION['signin'] === "")
    header('Location: index.php');
else {
    try {
        $stmt = $connect->query('SELECT * FROM images');
        $dte = $_POST['hidden'];
        while ($row = $stmt->fetch()){
            if ($row['reg_date'] === $_POST['hidden']){
                $likes = $row['likes'] + 1;
                $sql = "UPDATE images SET likes='$likes' WHERE reg_date='$dte'";
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
                if ($_POST['page'] === 'gallery')
                    header('Location: gallery.php');
                else if ($_POST['page'] === 'profile')
                    header('Location: profile.php');
                else if ($_POST['page'] === 'comment'){
                    $li = "http://localhost:8080/eonwe/comment.php?reg_date=".$row['reg_date'];
                        header('Location: '.$li);
                    }
                }
            }
        }
        catch(PDOException $e){
            echo $sql . "<br>" . $e->getMessage();
        }
    }
?>
