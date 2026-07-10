<?php

try {
    $databasePath = __DIR__ . '/../db.sqlite';

    $pdo = new PDO("sqlite:$databasePath");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    die(json_encode([
        'success' => false,
        'error' => 'Erro ao conectar no banco',
        'details' => $e->getMessage()
    ]));
}
