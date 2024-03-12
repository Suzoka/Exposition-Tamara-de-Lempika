<?php
include "api_model.php";
$request_method = $_SERVER["REQUEST_METHOD"];

switch ($request_method) {

    case 'POST':
        if (isset($_POST["login"]) && isset($_POST["password"])) {
            if (connexionAdmin($_POST["login"], $_POST["password"])) {
                header('Content-Type: application/json');
                // ! TODO : Création token JWT à faire ici

                require_once 'includes/config.php';
                require_once 'classes/JWT.php';

                $header = [
                    'typ' => 'JWT',
                    'alg' => 'HS256'
                ];

                // TODO : Réfléxion sur les infos à mettre dans le token
                $payload = [
                    'user_id' => 123,
                    'roles' => [
                        'ROLE_ADMIN',
                        'ROLE_USER'
                    ],
                    'email' => 'contact@demo.fr'
                ];

                $jwt = new JWT();

                $token = $jwt->generate($header, $payload, SECRET);
                echo json_encode(["auth" => "true", "token"=>$token], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            } else {
                header('Content-Type: application/json');
                echo json_encode(["auth" => "false", "token"=>null], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            }
        } else {
            header('Content-Type: application/json');
            echo json_encode(["message" => "Veuillez indiquer un login et un mot de passe"], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        }
        break;
    default:
        header('Content-Type: application/json');
        echo json_encode(["message" => "Méthode non autorisée"], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        break;
}

?>