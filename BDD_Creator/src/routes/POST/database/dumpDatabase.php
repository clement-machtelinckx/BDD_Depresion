<?php

require_once '../../../../vendor/autoload.php';
include '../../../conf.php';
use App\Class\Database;

// route : http://localhost/BDD_Creator/src/routes/POST/database/dumpDatabase.php
// method : POST
// body : raw : JSON
// {
//     "databaseName": "test"
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
    if ($data['databaseName'] === '') {
        echo json_encode(["result" => "error", "message" => "Database name is required"]);
        return;
    }
    // $db = new Database($HOST, $USERNAME, $PASSWORD);
    $date = date("Y-m-d");
    $time = time();
    $databaseName = $data["databaseName"];
    // $db->useDatabase($databaseName);
    $fileName = $databaseName . $date . $time . ".sql";
    $dir = '/var/www/html/src/dump' . $fileName;
    exec("mysqldump --user={$USERNAME} --password={$PASSWORD} --host={$HOST} {$databaseName} --result-file={$dir} 2>&1", $output);
    if (file_exists($dir)) {
        echo json_encode(["result" => "success", "message" => "Database dumped successfully"]);
    } else {
        echo json_encode(["result" => "error", "message" => "Error dumping database: " . implode("\n", $output)]);
    }
} else {
    echo json_encode(["result" => "error", "message" => "Invalid request method"]);
}
