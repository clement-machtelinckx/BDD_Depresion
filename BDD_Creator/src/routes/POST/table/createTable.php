<?php

require_once '../../../../vendor/autoload.php';
include '../../../conf.php';
use App\Class\Database;

// route : http://localhost/BDD_Creator/src/routes/POST/table/createTable.php
// method : POST
// body : raw : JSON
// {
//     "databaseName": "test",
//     "tableName": "users",
//     "columns": "id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, firstname VARCHAR(30) NOT NULL, lastname VARCHAR(30) NOT NULL, email VARCHAR(50), reg_date TIMESTAMP"
// }


header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    exit;
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $db = new Database($HOST, $USERNAME, $PASSWORD);
    $db->connect();
}
if ($data['databaseName'] === '') {
    echo json_encode(["result" => "error", "message" => "Database name is required"]);
    return;
}
$db->useDatabase($data['databaseName']);
if ($data['tableName'] === '') {
    echo json_encode(["result" => "error", "message" => "Table name is required"]);
    return;
}
if ($data['columns'] === '') {
    echo json_encode(["result" => "error", "message" => "Columns are required"]);
    return;
}
$db->createTable($data['tableName'], $data['columns']);