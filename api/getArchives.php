<?php
include "api_model.php";
$request_method = $_SERVER["REQUEST_METHOD"];

switch ($request_method) {

    case 'GET':

        if (!isset($parts[4]) || $parts[4] == null) {
            $result = getAllArchives()->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $search = $parts[4];
            $result = searchArchives($search)->fetchAll(PDO::FETCH_ASSOC);
        }

        if ($result == null) {
            http_response_code(404);
            echo json_encode(["message" => "Aucun résultat n'a été trouvé"], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        } else {
            echo json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        }
        break;
    default:
        echo json_encode(["message" => "Méthode non autorisée"], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        break;
}
?>