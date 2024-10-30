<?php

require_once '../../../../vendor/autoload.php';
include '../../../conf.php';
use App\Class\Database;

// route : http://localhost/BDD_Creator/src/routes/POST/database/restoreDatabase.php
// method : POST
// body : raw : JSON
// {
//     "databaseName": "test",
//     "databaseNewName": "test"
// }


header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $data = json_decode(file_get_contents('php://input'), true);
    $db = new Database($HOST, $USERNAME, $PASSWORD);
    $db->connect();

    $databaseNewName = $data["databaseNewName"];
    $databaseUnchangeName = $data["databaseName"];
    $databaseRestoreName = $data["databaseName"];
    $databaseRestoreName = str_replace("-", "", $databaseRestoreName);
    $databaseRestoreName = str_replace(".sql", "", $databaseRestoreName);

    $filePath = "/var/www/html/src/dump/" . $databaseUnchangeName;

if (!file_exists($filePath)) {
    die("File not found: " . $filePath);
}

try {
    $db->createDatabase($databaseNewName);
    $db->useDatabase($databaseNewName);

    $command = "mysql -u root -p{$PASSWORD} {$databaseNewName} < {$filePath} 2>&1";
    exec($command, $output, $returnVar);

    if ($returnVar !== 0) {
        throw new Exception("mysql command failed with output: " . implode("\n", $output));
    }
} catch (Exception $e) {
    echo json_encode($e->getMessage());
}

} else {
    echo json_encode(["result" => "error", "message" => "Invalid request method"]);
}