<?php
include "api_model.php";
$request_method = $_SERVER["REQUEST_METHOD"];

require_once 'includes/config.php';
require_once 'classes/JWT.php';

$jwt = new JWT();

if ($_SERVER['HTTP_AUTHORIZATION'] != null) {

    $token = str_replace('Bearer ', '', $_SERVER['HTTP_AUTHORIZATION']);
    if (!empty ($token) && $jwt->isValid($token) && $jwt->check($token, SECRET) && !$jwt->isExpired($token)) {

        switch ($request_method) {

            case 'GET':
                if (!isset ($parts[4]) || $parts[4] == null) {
                    $result = getAllUsers()->fetchAll(PDO::FETCH_ASSOC);
                } else {
                    $search = $parts[4];
                    $result = searchUser($search)->fetch(PDO::FETCH_ASSOC);
                }

                if ($result == null) {
                    http_response_code(404);
                    echo json_encode(["message" => "Aucun utilisateur n'a été trouvé"], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
                } else {
                    echo json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
                }
                break;
            case 'DELETE':
                if (isset ($parts[4]) && $parts[4] != null) {
                    $id = $parts[4];
                    deletedUserMail($id);
                    if (deleteUser($id)) {
                        echo json_encode(["message" => "utilisateur supprimé"], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
                    } else {
                        echo json_encode(["message" => "Erreur lors de la suppression"], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
                    }
                } else {
                    echo json_encode(["message" => "Veuillez indiquer un ID"], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
                }
                break;
            case 'PUT':
                if (isset ($parts[4]) && $parts[4] != null) {
                    $id = $parts[4];
                    $data = json_decode(file_get_contents('php://input'));
                    if (checkIdUser($id)) {
                        $modifs = [];
                        foreach ($data as $key => $value) {
                            switch ($key) {
                                case "Username":
                                    updateUsername($id, $value);
                                    $modifs[] = "Nom%20d'utilisateur : " . $value;
                                    break;
                                case "Mail":
                                    updateUserMail($id, $value);
                                    $modifs[] = "Mail : " . $value;
                                    break;
                                case "Nom":
                                    updateUserNom($id, $value);
                                    $modifs[] = "Nom : " . $value;
                                    break;
                                case "Prenom":
                                    updateUserPrenom($id, $value);
                                    $modifs[] = "Prénom : " . $value;
                                    break;
                                case "Role":
                                    updateUserRole($id, $value);
                                    $modifs[] = "Role : " . $value==1?"Administrateur":"Client";
                                    break;
                                default:
                                    break;
                            }
                        }
                        sendMailUser($id ,$modifs);
                        echo json_encode(["message" => "Utilisateur modifié"], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
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