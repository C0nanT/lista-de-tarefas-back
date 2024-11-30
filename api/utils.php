<?php
require_once 'Classes/Database.php';

header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

$pdo = Database::getInstance()->getConnection();

function logMessage($message)
{
    error_log($message . "\n", 3, __DIR__ . '/logs/tasks.log');
}