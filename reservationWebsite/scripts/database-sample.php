<?php
function autoLoad($classe)
{
    require 'class/' . $classe . '.php';
}

spl_autoload_register('autoLoad'); 

$serveur = "";
$login = "";
$password = "";
$bdd = "";

$db = new PDO("mysql:host=$serveur;dbname=$bdd;charset=utf8", $login, $password);

$manager = new Manager($db);
?>