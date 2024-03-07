<?php

$serveur = "";
$login = "";
$password = "";
$bdd = "";

$db = new PDO("mysql:host=$serveur;dbname=$bdd;charset=utf8", $login, $password);
?>