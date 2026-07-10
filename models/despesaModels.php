<?php
 require_once __DIR__ . '/../config/Database.php';
class despesasModel {
    public static function registrarDespesa($dados) {
       global $pdo;

        // Verifica se a despesa já existe
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM despesas WHERE valor = ? AND descricao = ?");
        $stmt->execute([floatval($dados['valor']), $dados['descricao']]);
        $existe = $stmt->fetchColumn();

        if($existe > 0){
            return false; // Despesa duplicada
        }

        // Insere a despesa uma única vez
        $stmt = $pdo->prepare("INSERT INTO despesas (valor, descricao) VALUES (?, ?)");
        return $stmt->execute([floatval($dados['valor']), $dados['descricao']]);

    }
}         