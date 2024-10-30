<?php

require_once '../vendor/autoload.php';
require_once 'conf.php';
use App\Class\Database;
use Firebase\JWT\JWT;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$db = new Database($HOST, $USERNAME, $PASSWORD);
$db->connect();
$dbColection = $db->getCollectionDatabases();

// Generate a JWT token
$key = "your_secret_key"; // replace with your secret key
$payload = array(
    "iss" => "your_issuer", // replace with your issuer
    "aud" => "your_audience", // replace with your audience
    "iat" => time(),
    "exp" => time() + 3600, // token expires in 1 hour
);
$jwt = JWT::encode($payload, $key, 'HS256');

// Echo the JWT token
echo $jwt;
