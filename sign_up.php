<?php

// INSERT INTO tablo_adi SET kol1 = değer1

//$db->query('INSERT INTO icerikler SET baslik = "başlık", icerik = "deneme içerikk", onay = 1');

/*
$sorgu = $db->prepare('INSERT INTO icerikler2 SET
baslik = ?,
icerik = ?,
onay = ?');
$ekle = $sorgu->execute([
    'deneme başlık', 'içerik', 1
]);

if ($ekle){
    echo 'verilerini eklendi!';
} else {
    $hata = $sorgu->errorInfo();
    echo 'MySQL Hatası: '. $hata[2];
}
*/

// $kategoriler = $db->query('SELECT * FROM kategoriler ORDER BY ad ASC')->fetchAll(PDO::FETCH_ASSOC);

// form gönderilmiş
if (isset($_POST['submit'])){

    $username = isset($_POST['username']) ? $_POST['username'] : null;
    $password_u = isset($_POST['password_u']) ? $_POST['password_u'] : null;

    if (!$username){
        echo 'Please enter an username !';
    } elseif (!$password_u){
        echo 'Please enter a password !';
    }
    else {

        // ekleme işlemi
        $sorgu = $db->prepare('INSERT INTO users SET
        username = ?,
        password_u = ?');

        $ekle = $sorgu->execute([
            $username, $password_u
        ]);

        if ($ekle){
           alert("Users has added");
           header('Location:index.php?sayfa=user_profile_page');
        } else {
            echo 'User did not add to system !';
        }

    }

}

?>

<form action="" method="post">

    Username: <br>
    <input type="text" value="<?php echo isset($_POST['username']) ? $_POST['username'] : '' ?>" name="username"> <br> <br>

    Password: <br>
    <input name="password_u" cols="30" rows="10"><?php echo isset($_POST['password_u']) ? $_POST['password_u'] : '' ?></textarea> <br> <br>

    <input type="hidden" name="submit" value="1">   
    <button type="submit">Sign Up</button>

</form>