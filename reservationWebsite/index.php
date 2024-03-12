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
        $_SESSION["from"] = "accueil";
        include("./views/accueil.php");
        break;
    case "connexion":
        include("./views/connexion.php");
        break;

    case "checkConnection":
        if ($manager->connectUser($_POST["login"], $_POST["password"])) {
            header("Location: ./".$_SESSION["from"]);
        } else {
            header("Location: ./connexion?error=1");
        }
        break;
    case "inscription":
        include("./views/inscription.php");
        break;

    case "checkInscription":
        if ($manager->createUser(new User(['username' => $_POST["login"], 'mail' => $_POST["mail"], 'password' => password_hash($_POST["password"], PASSWORD_DEFAULT), 'role' => '0', 'nom' => $_POST["nom"], 'prenom' => $_POST["prenom"]]))) {
            header("Location: ./".$_SESSION["from"]);
        } else {
            header("Location: ./inscription?error=1");
        }
        break;

    case "deconnexion":
        $manager->disconnection();
        header("Location: ./".$_SESSION["from"]);
        break;
}
?>