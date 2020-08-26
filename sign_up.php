<?php

require_once 'connect.php';

if (isset($_POST['submit'])){

    $username = isset($_POST['username']) ? $_POST['username'] : null;
    $password_u = isset($_POST['password_u']) ? $_POST['password_u'] : null;

    if (!$username){
        echo 'Please enter an username !';
    } elseif (!$password_u){
        echo 'Please enter a password !';
    }
    else {

        // inserting to database
        $sorgu = $db->prepare('INSERT INTO users SET
        username = ?,
        password_u = ?');

        $ekle = $sorgu->execute([
            $username, $password_u
        ]);

        // $sonId = $db->lastInsertId();

        if ($ekle){
            header('Location:landing_page.php');
        } else {
            $hata = $sorgu->errorInfo();
            echo 'MySQL Error: ' . $hata[2];
        }
    }

}

?>

<form action="" method="post">

    <p>Sign Up Sayfası</p><br>
    Username: <br>
    <input type="text" value="<?php echo isset($_POST['username']) ? $_POST['username'] : '' ?>" name="username"> <br> <br>

    Password: <br>
    <input type="text" value="<?php echo isset($_POST['password_u']) ? $_POST['password_u'] : '' ?>" name="password_u"> <br> <br>

    <input type="hidden" name="submit" value="1">   
    <button type="submit">Create an Account</button>

</form>