
 <?php

//Json formatında cıktı almak icin kullanılır,app.js tarafındaki response json formatında olur.

require 'connect.php'; //Db baglantısını cagırma

$sonuc = [];

if (isset($_POST['tip'])){

    if ($_POST['tip'] == 'iletisim'){ //app.jsden gelen degerlerin alınacagının garantisini vermek icin

        $username_l = $_POST['username_l'] ?? false; //null check
        $password_l = $_POST['password_l'] ?? false;

        if (!$username_l)
        {   //adsoyad bos ya da hatalı gelirse
            $sonuc['hata'] = 'Enter an username!';
            $sonuc['target'] = 'username_l';//Hata mesajı dondugunde hata donduren inputa focuslama icin kullanilir,adsoyad form bilesenindeki id
        } elseif (!$password_l)
        {   //eposta bos ya da hatalı gelirse
            $sonuc['hata'] = 'Enter an password!';
            $sonuc['target'] = 'password_l';
        }
        else 
        {
            // // usersdan getir (Database)
            // $sorgu = $db->query('SELECT username,password_u FROM users');
            
            // // $insertSonuc = $sorgu->execute([
            // //     'username_l' => $username_l,
            // //     'password_l' => $password_l
            // // ]);

            // $cikti=sorgu->fetch(PDO::FETCH_ASSOC);

try {

    $sorgu = $db->prepare("SELECT * FROM users WHERE username = ?");
    $sorgu->bindParam(1, $username_l, PDO::PARAM_INT);
    $sorgu->execute();

    $cikti = $sorgu->fetch(PDO::FETCH_ASSOC);

    echo "Username: " . $cikti["username"] . "<br /> Password: " . $cikti["password_u"];

} catch (PDOException $e) {
    die($e->getMessage());
}

if ($sorgu){
    $sonuc['basarili'] = 'User has found';
} else {
    $sonuc['hata'] = 'An error occurred';
}


// $sorgu=$db->$query ("SELECT * FROM users WHERE username='" . $_POST["username_l"] . "',password_u='" $_POST["password_l"] "'";)
// $insertSonuc=$sorgu->execute();
// print_r($insertSonuc);

// if ($baglanti->connect_errno > 0) {
//     die("<b>Bağlantı Hatası:</b> " . $db->connect_error);
// }

// $db->set_charset("utf8");

// $sorgu = $db->prepare("SELECT * FROM users WHERE username = ? password_u=?");

// if ($db->errno > 0) {
//     die("<b>Sorgu Hatası:</b> " . $db->error);
// }

// $sorgu->bind_param("i", $sira);
// $sorgu->execute();

// $sonuc = $sorgu->get_result();

// $cikti = $sonuc->fetch_array();

// echo "Adı: " . $cikti["kisi_adi"] . "<br /> Soyadı: " . $cikti["kisi_soyadi"] . "<br /> E-posta: " . $cikti["kisi_eposta"];

// $sorgu->close();

        }

    }

    echo json_encode($sonuc); //Sonucu ekrana yazdır

}
