<?php
 require_once __DIR__ . '/../controllers/despesaController.php';
// Rota para manipular comentários
switch ($_SERVER['REQUEST_METHOD']) {
    case 'POST':
      $dados = json_decode(file_get_contents("php://input"), true);
      registrarDespesa($dados);
        break;
  
    default:
        http_response_code(405);
        echo json_encode(["error" => "Método não permitido."]);
        break;
}
