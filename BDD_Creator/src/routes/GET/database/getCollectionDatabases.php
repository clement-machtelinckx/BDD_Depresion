<?php
require_once '../../../../vendor/autoload.php';
include '../../../conf.php';
use App\Class\Database;

// route : http://localhost/BDD_Creator/src/routes/GET/database/getCollectionDatabases.php
// method : GET

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $db = new Database($HOST, $USERNAME, $PASSWORD);
    $db->connect();
    $databases = $db->getCollectionDatabases();
    echo json_encode($databases);
} else {
    echo json_encode(["result" => "error", "message" => "Invalid request method"]);
}
