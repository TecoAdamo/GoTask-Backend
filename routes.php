<?php
// require 'routes/livros.php';
$requestUri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

$rota = $_GET['rota'] ?? '';
$rota = ltrim($rota, '/'); // remove qualquer "/" do início


switch ($rota) {
    case 'task':
        require __DIR__ . '/routes/task.php';
        break;
    case 'comentarios':
        require __DIR__ . '/routes/comentarios.php';
        break;

    default:
        http_response_code(404);
        echo json_encode(["error" => "Rota não encontrada."]);
        break;
}