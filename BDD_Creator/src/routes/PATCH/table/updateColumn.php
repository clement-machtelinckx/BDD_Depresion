<?php
require_once '../../../../vendor/autoload.php';
include '../../../conf.php';
use App\Class\Database;

// route : http://localhost/BDD_Creator/src/routes/PATCH/table/updateColumn.php
// method : PATCH
// {
//     "databaseName": "testjson",
//      "tableName": "testtabldzde222",
//      "columnName": "id",
//      "newColumnName": "name",
//      "ColumnType": "VARCHAR(255)"
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
    $db->updateColumn($data['tableName'], $data['columnName'], $data['newColumnName'], $data['ColumnType']);
} else {
    echo json_encode(["result" => "error", "message" => "Invalid request method"]);
}