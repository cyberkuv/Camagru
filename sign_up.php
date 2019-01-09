<?php
    require './config/database.php';

    if(isset($_POST['register'])) {
    
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $cmp_password = $_POST['cmp_password'];

    if($password != $cmp_password)
        die('Passwords do not match');
    if(strlen($password) < 5)
        die('password must contain at least 8 characters!');
    if (!preg_match("#[0-9]+#",$password))
        die('Your Password Must Contain At Least 1 Number!');
    if (!preg_match("#[a-z]+#",$password))
        die('Your Password Must Contain At Least 1 LowerCase Letter');
    if (!preg_match("#[A-Z]+#",$password))
        die('Your Password Must Contain At Least 1 UpperCase Letter!');

    try {
        $sql = "SELECT COUNT(email) AS num FROM users WHERE email = :email";
        $stmt = $connect->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if($row['num'] > 0)
            die('Email Already In Use By a Different User!');

        $password = md5($password);
        $code = rand(100000, 999999);
        $stmt = $connect->prepare("INSERT INTO users (firstname, lastname, email, username, password, noti, conf, code)
            VALUES (:firstname, :lastname, :email, :username, :password, true, false, '$code')");

        $stmt->execute(array(
            ':firstname' =>$firstname,
            ':lastname' => $lastname,
            ':email' => $email,
            ':username' => $username,
            ':password' => $password,
        ));
        $link = "http://localhost:8080/eonwe/verify.php?user=".$username."&code=".$code;
        $subject = "Thank You For Registering To Our Website!";
        $txt = "Your Verification Link is !".$link;
        mail($email,$subject,$txt);
        echo "Confimation link has been sent to ".htmlspecialchars($email);
        header('refresh:5; url="index.php"');
        exit;
        }
        catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
?>
