<?php

require __DIR__ . '/vendor/autoload.php';

use Dotenv\Dotenv;

class Database
{
    private $pdo;
    private static $instance;

    private function __construct()
    {
        $dotenv = Dotenv::createImmutable(__DIR__);
        $dotenv->load();

        $host = $_ENV['DB_HOST'];
        $dbName = $_ENV['DB_NAME'];
        $username = $_ENV['DB_USER'];
        $password = $_ENV['DB_PASS'];
        $charset = $_ENV['DB_CHARSET'];

        $dsn = "mysql:host={$host};dbname={$dbName};charset={$charset}";

        try {
            $this->pdo = new PDO($dsn, $username, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Erro de conexão: " . $e->getMessage());
        }
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function getConnection()
    {
        return $this->pdo;
    }

    private function __clone()
    {
    }

    private function __wakeup()
    {
    }
}

