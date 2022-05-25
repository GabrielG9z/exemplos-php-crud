<?php
require_once "conecta.php";

// Função de leitura de produtos com comando SQL PDO(PHP Data Objects) é um módulo de PHP montado sob o paradigma Orientado a Objetos, cujo objetivo é prover uma padronização da forma com que PHP se comunica com um banco de dados relacional.
function lerProdutos(PDO $conexao){
    $sql = "SELECT id, nome, descricao, preco, quantidade, fabricante_id FROM produtos ORDER BY nome";

    try {
        
    } catch (Exception $erro) {
        die("Erro:". $erro->getMessage());
    }
}