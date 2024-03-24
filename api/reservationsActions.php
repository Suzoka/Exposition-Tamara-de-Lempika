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
                if (!isset($parts[2]) || $parts[2] == null) {
                    $result = getAllReservedFormulesNotArchived()->fetchAll(PDO::FETCH_ASSOC);
                } else {
                    $search = $parts[2];
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
                if (isset($parts[2]) && $parts[2] != null) {
                    $id = $parts[2];
                    deletedReservationMail($id);
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
                if (isset($parts[2]) && $parts[2] != null) {
                    $id = $parts[2];
                    $data = json_decode(file_get_contents('php://input'));
                    if (checkId($id)) {
                        $modifs = [];
                        foreach ($data as $key => $value) {
                            switch ($key) {
                                case 'date':
                                    updateDate($id, $value);
                                    $modifs[] = "Date : ".$value;
                                    break;
                                case 'quantite':
                                    if ($value < 1) {
                                        deletedReservationMail($id);
                                        deleteReservation($id);
                                        break;
                                    }
                                    updateQuantite($id, $value);
                                    $modifs[] = "Quantite : ".$value;
                                    break;
                                case 'nom':
                                    updateNom($id, $value);
                                    $modifs[] = "Nom : ".$value;
                                    break;
                                case 'prenom':
                                    updatePrenom($id, $value);
                                    $modifs[] = "Prenom : ".$value;
                                    break;
                                case 'mail':
                                    updateMail($id, $value);
                                    $modifs[] = "Mail : ".$value;
                                    break;
                                case 'reservationType':
                                    updateExtIdFormule($id, $value);
                                    $modifs[] = "Type%20de%20formule : ".getReservationType($value);
                                    break;
                                default:
                                    break;
                            }
                        }
                        sendMailReservations($id ,$modifs);
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