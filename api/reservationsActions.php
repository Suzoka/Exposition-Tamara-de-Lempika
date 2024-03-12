<?php
include "api_model.php";
$request_method = $_SERVER["REQUEST_METHOD"];

require_once 'includes/config.php';
require_once 'classes/JWT.php';

$jwt = new JWT();

if (isset($_SERVER['HTTP_AUTHORIZATION'])) {

    $token = str_replace('Bearer ', '', $_SERVER['HTTP_AUTHORIZATION']);
    if ($jwt->check($token, SECRET) && !$jwt->isExpired($token) && $jwt->isValid($token)) {

        switch ($request_method) {

            case 'GET':

                if (!isset($parts[4]) || $parts[4] == null) {
                    $result = getAllReservedFormulesNotArchived()->fetchAll(PDO::FETCH_ASSOC);
                } else {
                    $search = $parts[4];
                    $result = searchReservedFormulesNotArchived($search)->fetchAll(PDO::FETCH_ASSOC);
                }

                if ($result == null) {
                    http_response_code(404);
                    echo json_encode(["message" => "Aucun résultat n'a été trouvé"], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
                } else {
                    echo json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
                }
                break;
            case 'DELETE':
                if (isset($parts[4]) && $parts[4] != null) {
                    $id = $parts[4];
                    if (deleteReservation($id)) {
                        echo json_encode(["message" => "Réservation supprimée"], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
                    } else {
                        echo json_encode(["message" => "Erreur lors de la suppression"], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
                    }
                } else {
                    echo json_encode(["message" => "Veuillez indiquer un ID"], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
                }
                break;
            default:
                echo json_encode(["message" => "Méthode non autorisée"], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
                break;
        }
    } else {
        http_response_code(403);
        echo json_encode(["message" => "Accès refusé"], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }
} else {
    http_response_code(403);
    echo json_encode(["message" => "Veuillez renseigner un token"], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
}
?>