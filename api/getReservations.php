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
    default:
        header('Content-Type: application/json');
        echo json_encode(array("message" => "Méthode non autorisée"), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        break;
}
?>