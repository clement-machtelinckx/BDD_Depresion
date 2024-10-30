<?php

require_once '../../../../vendor/autoload.php';
include '../../../conf.php';
use App\Class\Database;


// route : http://localhost/BDD_Creator/src/routes/POST/table/insertRow.php
// method : POST
// {
//     "databaseName": "testjson",
//     "tableName": "testtabldzde222",
//     "values": [
//         {
//             "id": 65,
//             "name": "clement",
//             "password": "superpassword",
//             "confirmePassword": "superpassword"
//         }
//     ]
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
    $db->useDatabase($data['databaseName']);
    $db->insertRow($data['tableName'], $data['values']);
    
}