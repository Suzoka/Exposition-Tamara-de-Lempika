<?php
include "api_model.php";
$request_method = $_SERVER["REQUEST_METHOD"];

require_once 'includes/config.php';
require_once 'classes/JWT.php';

$jwt = new JWT();

if ($_SERVER['HTTP_AUTHORIZATION'] != null) {

    $token = str_replace('Bearer ', '', $_SERVER['HTTP_AUTHORIZATION']);
    if (!empty($token) && $jwt->isValid($token) && $jwt->check($token, SECRET) && !$jwt->isExpired($token)) {

        switch ($request_method) {

            case 'GET':
                if (!isset($parts[4]) || $parts[4] == null) {
                    $result = getAllReservedFormulesNotArchived()->fetchAll(PDO::FETCH_ASSOC);
                } else {
                    $search = $parts[4];
                    $result = searchReservedFormulesNotArchived($search)->fetch(PDO::FETCH_ASSOC);
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
            case 'PUT':
                if (isset($parts[4]) && $parts[4] != null) {
                    $id = $parts[4];
                    $data = json_decode(file_get_contents('php://input'));
                    if (checkId($id)) {
                        foreach ($data as $key => $value) {
                            switch ($key) {
                                case 'date':
                                    updateDate($id, $value);
                                    break;
                                case 'quantite':
                                    if ($value < 1) {
                                        deleteReservation($id);
                                        break;
                                    }
                                    updateQuantite($id, $value);
                                    break;
                                case 'nom':
                                    updateNom($id, $value);
                                    break;
                                case 'prenom':
                                    updatePrenom($id, $value);
                                    break;
                                case 'mail':
                                    updateMail($id, $value);
                                    //TODO : Renvoyer le mail
                                    break;
                                case 'reservationType':
                                    updateExtIdFormule($id, $value);
                                    break;
                                default:
                                    break;
                            }
                        }
                        echo json_encode(["message" => "Réservation modifiée"], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
                    } else {
                        echo json_encode(["message" => "ID inconnu"], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
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