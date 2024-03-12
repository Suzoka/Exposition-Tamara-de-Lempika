<?php
include "api_model.php";
$request_method = $_SERVER["REQUEST_METHOD"];

switch ($request_method) {

    case 'POST':
        $data = json_decode(file_get_contents("php://input"), true);
        if (isset($data["login"]) && isset($data["password"])) {
            if (connexionAdmin($data["login"], $data["password"])) {
                
                require_once 'includes/config.php';
                require_once 'classes/JWT.php';

                $header = [
                    'typ' => 'JWT',
                    'alg' => 'HS256'
                ];

                $payload = [
                    'login' => $data["login"],
                    'role' => 'admin'
                ];

                $jwt = new JWT();

                $token = $jwt->generate($header, $payload, SECRET);
                echo json_encode(["auth" => "true", "token"=>$token], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            } else {
                echo json_encode(["auth" => "false", "token"=>null], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            }
        } else {
            echo json_encode(["message" => "Veuillez indiquer un login et un mot de passe"], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        }
        break;
    default:
        echo json_encode(["message" => "Méthode non autorisée"], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        break;
}

?>