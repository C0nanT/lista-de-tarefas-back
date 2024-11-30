<?php
require_once 'Classes/Database.php';
require_once '../vendor/autoload.php';

header("Access-Control-Allow-Origin: http://localhost:3000");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS, DELETE, PUT");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}
$pdo = Database::getInstance()->getConnection();

function logMessage($message)
{
    $timestamp = date('Y-m-d H:i:s');
    error_log("[$timestamp] $message\n", 3, __DIR__ . '/../logs/tasks.log');
}