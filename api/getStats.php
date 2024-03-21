<?php
include "api_model.php";
$request_method = $_SERVER["REQUEST_METHOD"];

switch ($request_method) {

    case 'GET':
        $result = getStats();
        echo json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        break;
    default:
        echo json_encode(["message" => "Méthode non autorisée"], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        break;
}

?>