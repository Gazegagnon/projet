<?php
session_start();

$pdo = new PDO("mysql:host=127.0.0.1;dbname=mon_projet_sira", "root", "", [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);


?>