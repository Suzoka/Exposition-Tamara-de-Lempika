<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(204);
    exit;
}

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
    case 'users':
        include "usersActions.php";
        break;
    default:
        http_response_code(404);
        echo json_encode(["message" => "Requête inconnue"], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        break;
}

?>