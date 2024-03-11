<?php
include("./scripts/database.php");
session_start();

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$path = trim($path, '/');
$segments = explode('/', $path);

$page = explode('?', end($segments))[0];

switch ($page) {
    case "accueil":
    default:
        include("./views/accueil.php");
        break;
    case "connexion":
        include("./views/connexion.php");
        break;

    case "checkConnection":
        $manager->connectUser($_POST["login"], $_POST["password"]);
        header("Location: ./accueil");
        break;

    case "inscription":
        include("./views/inscription.php");
        break;

    case "checkInscription":
        $manager->createUser($_POST);
        header("Location: ./accueil");
        break;

    case "deconnexion":
        $manager->disconnection();
        header("Location: ./accueil");
        break;
}
?>