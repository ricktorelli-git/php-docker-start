<?php

declare(strict_types=1);

namespace app\database;

use PDO;
use PDOException;

class ConnectionMysql
{
    private PDO $pdo;

    public function __construct()
    {
        $host = $_ENV['DB_HOST'];
        $port = $_ENV['DB_HOST'];
        $db = $_ENV['DB_DATABASE'];
        $user = $_ENV['DB_USER'];
        $pass = $_ENV['DB_PASSWORD'];

        $dsn = "mysql:host=$host;port=$port;dbname=$db;charset=utf8mb4";

        try {
            $this->pdo = new PDO($dsn, $user, $pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getConnection(): PDO
    {
        return $this->pdo;
    }
    public function checkDatabaseConnection($pdo) {
        try {
            $stmt = $pdo->query("SELECT 1");
            if ($stmt) {
                return "Conexão com o banco de dados está ok. " . $_ENV['DB_DATABASE'];
            }
        } catch (PDOException $e) {
            return "Erro ao verificar o banco de dados: " . $e->getMessage();
        }
    }
}