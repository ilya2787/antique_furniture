<?php
    $user = "root";
    $password = "Senya2006@!";
    $host = "localhost";
    $DB = "PITCTOK";
    $dbh = 'mysql:host='.$host.';dbname='.$DB.';charset=utf8';
    $pdo = new PDO($dbh, $user, $password) or die("Ошибка ". mysqli_error($link_BD));
?>