<?php

try {
    $db = new PDO('mysql:host=localhost;dbname=twitter_users','root', 'root');
} catch (PDOException $e){
    echo $e->getMessage();
}

?>