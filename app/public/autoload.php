<?php
function checkDatabaseConnection($pdo) {
    try {
        $stmt = $pdo->query("SELECT 1");
        if ($stmt) {
            return "Conexão com o banco de dados está ok. " . $_ENV['DB_DATABASE'];
        }
    } catch (PDOException $e) {
        return "Erro ao verificar o banco de dados: " . $e->getMessage();
    }
}
