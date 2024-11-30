<?php
require_once 'Classes/Database.php';
require_once '../vendor/autoload.php';

header('Content-Type: application/json');

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");
header("Access-Control-Allow-Headers: *");

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: *");
    header("Access-Control-Allow-Headers: *");
    exit();
}

$pdo = Database::getInstance()->getConnection();

function logMessage($message)
{
    $timestamp = date('Y-m-d H:i:s');
    error_log("[$timestamp] $message\n", 3, __DIR__ . '/../logs/tasks.log');
}