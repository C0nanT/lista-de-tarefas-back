<?php
require_once 'Classes/Database.php';
require_once '../vendor/autoload.php';

date_default_timezone_set('America/Sao_Paulo');

header("Access-Control-Allow-Origin: http://localhost:3000");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS, DELETE, PUT, PATCH");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}
$pdo = Database::getInstance()->getConnection();

function logMessage($message)
{
    $logDir = __DIR__ . '/../logs';
    if (!is_dir($logDir)) {
        mkdir($logDir, 0777, true);
    }

    $timestamp = date('Y-m-d H:i:s');
    error_log("[$timestamp] $message\n", 3, $logDir . '/tasks.log');
}