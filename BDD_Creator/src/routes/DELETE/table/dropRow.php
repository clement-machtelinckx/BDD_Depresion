<?php

require_once '../../../../vendor/autoload.php';
include '../../../conf.php';
use App\Class\Database;

// route : http://localhost/BDD_Creator/src/routes/DELETE/table/dropRow.php
// method : DELETE
// {
//     "databaseName": "testjson",
//     "tableName": "testtabldzde222",
//     "columnName": "id",
//     "value": 65
// }

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $data = json_decode(file_get_contents('php://input'), true);
    $db = new Database($HOST, $USERNAME, $PASSWORD);
    $db->connect();
    if ($data['databaseName'] === '') {
        echo json_encode(["result" => "error", "message" => "Database name is required"]);
        return;
    } else if ($data['tableName'] === '') {
        echo json_encode(["result" => "error", "message" => "Table name is required"]);
        return;
    } else if ($data['columnName'] === '') {
        echo json_encode(["result" => "error", "message" => "Column name is required"]);
        return;
    }
    $db->useDatabase($data['databaseName']);
    $db->dropRow($data['tableName'], $data['columnName'], $data['value']);
} else {
    echo json_encode(["result" => "error", "message" => "Invalid request method"]);
    
}