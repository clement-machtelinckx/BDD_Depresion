<?php
require_once '../../../../vendor/autoload.php';
include '../../../conf.php';

use App\Class\Database;

// route : http://localhost/BDD_Creator/src/routes/PATCH/table/updateTableName.php
// method : PATCH
// {
//     "databaseName": "testjson",
//      "tableName": "testtabldzde222",
//      "newTableName": "testPatchTable",
// }


header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: PATCH, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    exit;
}

if($_SERVER["REQUEST_METHOD"] === "PATCH"){
    $data = json_decode(file_get_contents('php://input'), true);
    $db = new Database($HOST, $USERNAME, $PASSWORD);
    $db->connect();
    $db->useDatabase($data['databaseName']);
    $db->updateTableName($data['tableName'], $data['newTableName']);
} else {
    echo json_encode(["result" => "error", "message" => "Invalid request method"]);
}