<?php
    require_once __DIR__ . '/../models/despesaModels.php';

 function registrarDespesa($dados){
    if (!isset($dados['descricao']) || !isset($dados['valor'])){
        http_response_code(400);
        echo json_encode(["error" => "Dados incompletos."]);
        return;
    }

    $ok = despesasModel::registrarDespesa($dados);

    if ($ok) {
        http_response_code(201);
        echo json_encode(["message" => "Despesa registrada com sucesso."]);
    } else {
        http_response_code(500);
        echo json_encode(["error" => "Erro ao registrar despesa."]);
    }
    
 };