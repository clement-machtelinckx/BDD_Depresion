<?php
require_once '../../../../vendor/autoload.php';
include '../../../conf.php';
use App\Class\Database;

// route : http://localhost/BDD_Creator/src/routes/PATCH/table/updateRow.php
// method : PATCH
// {
//     "databaseName": "testjson",
//      "tableName": "testtabldzde222",
//      "columnName": "id",
//      "value": "32",
//      "data": {
//          "id": "1",
//          "name": "test patchRow"
//      }
// }


header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: PATCH, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'PATCH') {
    $data = json_decode(file_get_contents('php://input'), true);
    $db = new Database($HOST, $USERNAME, $PASSWORD);
    $db->connect();
    $db->useDatabase($data['databaseName']);
    $db->updateRow($data['tableName'], $data['columnName'], $data['value'], $data['data']);
} else {
    echo json_encode(["result" => "error", "message" => "Invalid request method"]);
}
