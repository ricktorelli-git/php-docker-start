<?php
require_once __DIR__ . '/../../vendor/autoload.php';

use Dotenv\Dotenv;
use RickTorelli\config\database\ConnectionMysql;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();
$db = new ConnectionMysql();
$pdo = $db->getConnection();
$databaseStatus = checkDatabaseConnection($pdo);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="<?= $_ENV['APP_DESCRIPTION'] ?>">
    <meta name="author" content="<?= $_ENV['APP_AUTHOR'] ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $_ENV['APP_NAME'] ?></title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#"><?= $_ENV['APP_NAME'] ?></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Alternar navegação">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
</header>
<main>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="mt-5">Bem-vindo ao <?= $_ENV['APP_NAME'] ?></h1>
                <p class="lead"><?= $_ENV['APP_DESCRIPTION'] ?></p>
                <p><?= $databaseStatus ?></p>
            </div>
        </div>
    </div>
</main>
<footer>
    <div class="container">
        <div class="row">
            <div class="col">
                <p class="text-center mt-5 mb-5">&copy; <?= $_ENV['APP_NAME'] ?> - <?= date('Y') ?>
                    - Todos os direitos reservados</p>
            </div>
        </div>
    </div>
</footer>
<!--    <script src="assets/js/jquery.js"></script>-->
<script src="assets/js/bootstrap.js"></script>
</body>
</html>