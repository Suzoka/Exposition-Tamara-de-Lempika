<?php
include "api_model.php";
$request_method = $_SERVER["REQUEST_METHOD"];

switch ($request_method) {

    case 'POST':
        if (isset($_POST["login"]) && isset($_POST["password"])) {
            if (connexionAdmin($_POST["login"], $_POST["password"])) {
                header('Content-Type: application/json');
                // ! TODO : Création token JWT à faire ici
                echo json_encode(array("auth" => "true"), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            } else {
                header('Content-Type: application/json');
                echo json_encode(array("auth" => "false"), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            }
        }
        else {
            header('Content-Type: application/json');
            echo json_encode(array("message" => "Veuillez indiquer un login et un mot de passe"), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        }
        break;
    default:
        header('Content-Type: application/json');
        echo json_encode(array("message" => "Méthode non autorisée"), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        break;
}

?>