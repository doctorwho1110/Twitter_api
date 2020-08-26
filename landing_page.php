<?php

require_once 'connect.php';

if (isset($_POST['submit'])){

    $username= isset($_POST['username']) ? $_POST['username'] : null;
    $password_u = isset($_POST['password_u']) ? $_POST['password_u'] : null;

    if (!$username){
        echo 'Please enter an username !';
    } elseif (!$password_u){
        echo 'Please enter a password !';
    }
    else {

        // kullanıcı tarama işlemi

        $sorgu = $db->prepare('SELECT * FROM users WHERE 
        users.username = ?
        users.password_u =?');

        $tara=$sorgu->execute([
            $username,$password_u
        ]);

        // $kullanici = $sorgu->fetch(PDO::FETCH_ASSOC);

        // $sonId = $db->lastInsertId();

        if ($tara){
            header('Location:user_profile_page.php');
            // header('Location:index.php?sayfa=kategoriler');
            // exit;
        }
        else
        {
            $hata = $sorgu->errorInfo();
            echo 'MySQL Error: ' . $hata[2];
        }

        // if ($ekle){
        // // //    header('Location:index.php?sayfa=user_profile_page');
        // // //Landing sayfasına geri döner.
        // //     header('Location:landing_page.php');

        // } else {
        //     echo 'User did not add to system !';
        // }

    }

}

?>

<!-- Formu olusturmaya başlıyorum -->
<form action="" method="post">

    <!-- Ad-Soyadı almaya yarayan input -->
    Username: <br>
    <input type="text" placeholder="Your user name" name="username"> <br><br>

    Password: <br>
    <input type="text" placeholder="Your Password" name="password_u"> <br><br>

    <input type="hidden" name="submit" value="1"> 
    <button type="submit">Sign Up</button>

</form>