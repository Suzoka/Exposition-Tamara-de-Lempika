<?php
function autoLoad($classe)
{
    require 'class/' . $classe . '.php';
}

spl_autoload_register('autoLoad'); 

$serveur = "localhost";
$login = "root";
$password = "root";
$bdd = "resaexpo";

$db = new PDO("mysql:host=$serveur;dbname=$bdd;charset=utf8", $login, $password);

$manager = new Manager($db);
?>