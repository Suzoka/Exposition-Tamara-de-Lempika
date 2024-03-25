<?php
include ("./scripts/database.php");
session_start();

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$path = trim($path, '/');
$segments = explode('/', $path);

$page = explode('?', end($segments))[0];

if (!isset ($_SESSION["lang"])) {
    $_SESSION["lang"] = "fr";
}
?>

<!DOCTYPE html>
<html lang="<?php echo $_SESSION["lang"] == "fr" ? "fr" : "en" ?>">


<?php
switch ($page) {
    case "accueil":
    case "":
        $_SESSION["from"] = "accueil";
        include ("./views/accueil.php");
        break;
    case "connexion":
        include ("./views/connexion.php");
        break;

    case "checkConnection":
        if ($manager->connectUser($_POST["login"], $_POST["password"])) {
            header("Location: ./" . $_SESSION["from"]);
        } else {
            header("Location: ./connexion?error=1");
        }
        break;
    case "inscription":
        include ("./views/inscription.php");
        $_SESSION['form_values'] = [];
        break;

    case "checkInscription":
        if ($manager->createUser(new User(['username' => $_POST["login"], 'mail' => $_POST["mail"], 'password' => password_hash($_POST["password"], PASSWORD_DEFAULT), 'role' => '0', 'nom' => $_POST["nom"], 'prenom' => $_POST["prenom"]]))) {
            header("Location: ./" . $_SESSION["from"]);
        } else {
            $_SESSION['form_values'] = $_POST;
            header("Location: ./inscription?error=1");
        }
        break;

    case "deconnexion":
        $manager->disconnection();
        header("Location: ./" . $_SESSION["from"]);
        break;

    case "lostPassword";
        include ("./views/lostPassword.php");
        break;

    case "checkLostPassword":
        $mail = isset($_SESSION["user"]) ? $_SESSION["user"]->getMail() : $_POST["mail"];
        $username = isset($_SESSION["user"]) ? $_SESSION["user"]->getUsername() : $_POST["username"];

        if ($manager->lostPassword($mail, $username)) {
            header("Location: ./lostPasswordSent");
        } else {
            header("Location: ./lostPassword?error=1");
        }
        break;

    case "lostPasswordSent":
        include ("./views/lostPasswordSent.php");
        break;

    case "resetPassword":
        if (isset ($_GET["key"])) {
            include ("./views/resetPassword.php");
        } else {
            header("Location: ./connexion");
        }
        break;

    case "checkResetPassword":
        if (isset ($_GET["key"])) {
            if ($manager->resetPassword($_POST["password"], $_GET["key"])) {
                header("Location: ./resetPasswordValidation");
            } else {
                header("Location: ./resetPassword?key=" . $_GET["key"] . "&error=1");
            }
        } else {
            header("Location: ./resetPassword?error=1");
        }
        break;

    case "resetPasswordValidation":
        include ("./views/resetPasswordValidation.php");
        break;

    case "deleteCompte" :
        $manager->deleteUser($_SESSION["user"]->getId_user(), $_SESSION["user"]->getMail());
        header("Location: ./deconnexion");
        break;

    case "billetterie":
        $_SESSION["from"] = "billetterie";
        include ("./views/billetterie.php");
        break;

    case "newReservation":
        if ($manager->createReservation($_POST)) {
            include ("./views/validation.php");
        } else {
            header("Location: ./billetterie?error=1");
        }
        break;

    case "compte":
        $_SESSION["from"] = "compte";
        if (isset ($_GET['page'])) {
            $activePage = $_GET['page'];
        } else {
            $activePage = "infos";
        }
        include ("./views/compte.php");
        break;

    case "editCompteInfos":
        if ($manager->editUserInfos($_POST, $_SESSION["user"]->getId_user())) {
            $_SESSION["user"] = $manager->updateSession($_SESSION["user"]->getId_user());
            header("Location: ./compte?page=infos");
        } else {
            header("Location: ./compte?page=edit&error=1");
        }
        break;

    case "languageFR":
        $_SESSION["lang"] = "fr";
        header("Location: ./" . $_GET["from"]);
        break;

    case "languageEN":
        $_SESSION["lang"] = "en";
        header("Location: ./" . $_GET["from"]);
        break;
    default:
        include ("./views/404.php");
        break;
}
?>