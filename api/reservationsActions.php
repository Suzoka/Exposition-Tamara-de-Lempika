<?php
include "api_model.php";
$request_method = $_SERVER["REQUEST_METHOD"];

switch ($request_method) {

    case 'GET':

        if (!isset($_GET['search'])) {
            $result = getAllReservedFormulesNotArchived()->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $search = $_GET['search'];
            $result = searchReservedFormulesNotArchived($search)->fetchAll(PDO::FETCH_ASSOC);
        }

        header('Content-Type: application/json');
        echo json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        break;
    case 'DELETE': // ! TODO : Ajouter JWT
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            if (deleteReservation($id)) {
                header('Content-Type: application/json');
                echo json_encode(["message" => "Réservation supprimée"], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            }
            else {
                header('Content-Type: application/json');
                echo json_encode(["message" => "Erreur lors de la suppression"], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            }
        } else {
            header('Content-Type: application/json');
            echo json_encode(["message" => "Veuillez indiquer un ID"], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        }
    default:
        header('Content-Type: application/json');
        echo json_encode(["message" => "Méthode non autorisée"], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        break;
}
?>