<?php
    $dsn = 'mysql:dbname=glotelho_besoins;host=127.0.0.1';
    $user = 'root';
    $psw = '123456seven.@Said';

    try {
        $db_connection = new PDO($dsn, $user, $psw);
    } catch (PDOException $e) {
        echo 'Connextion échoué : ' . $e->getMessage();
    }

?>