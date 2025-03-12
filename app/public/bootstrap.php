<?php
require_once __DIR__ . '/../../vendor/autoload.php';

use Dotenv\Dotenv;
use app\database\ConnectionMysql;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();
$db = new ConnectionMysql();
$pdo = $db->getConnection();
$databaseStatus = $db->checkDatabaseConnection($pdo);



