<?php

require_once '../vendor/autoload.php';
require_once 'conf.php';
use App\Class\Database;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$db = new Database($HOST, $USERNAME, $PASSWORD);
$db->connect();
$dbColection = $db->getCollectionDatabases();

$date = date("Y-m-d");
$dir = 'C:\wamp64\www\BDD_Creator\src/dump/' . $date;

if (!file_exists($dir)) {
    mkdir($dir, 0777, true);
}

foreach ($dbColection as $databaseName) {
    if ('.' === $databaseName) continue;
    if ('..' === $databaseName) continue;
    if ('information_schema' === $databaseName) continue;
    if ('mysql' === $databaseName) continue;
    if ('performance_schema' === $databaseName) continue;
    if ('phpmyadmin' === $databaseName) continue;
    if ('sys' === $databaseName) continue;
    

    $time = time();
    $file = $databaseName . '_' . $time . ".sql";
    $filePath = $dir . '/' . $file;
    
    $logFile = 'C:\wamp64\www\BDD_Creator\src\cron_script.log';
    $command = "mysqldump --user={$USERNAME} --password={$PASSWORD} --host={$HOST} {$databaseName} --result-file={$filePath} 2>&1 >> {$logFile}";
    
    exec($command, $output, $returnVar);



    echo $file . "\n";
}
