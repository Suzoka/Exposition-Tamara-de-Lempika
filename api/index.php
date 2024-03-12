<?php
header('Content-Type: application/json');

$parts = explode('/', $_SERVER['REQUEST_URI']);

switch ($parts[3]) {
    case 'reservations':
        include "reservationsActions.php";
        break;
    case 'archives':
        include "getArchives.php";
        break;
    case 'adminLogin':
        include "adminLogin.php";
        break;
    default:
        http_response_code(404);
        echo json_encode(["message" => "Requête inconnue"], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        break;
}

?>