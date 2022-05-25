<?php
require_once "conecta.php";

// Função de leitura de produtos com comando SQL PDO(PHP Data Objects) é um módulo de PHP montado sob o paradigma Orientado a Objetos, cujo objetivo é prover uma padronização da forma com que PHP se comunica com um banco de dados relacional.
function lerProdutos(PDO $conexao):array{
    $sql = "SELECT produtos.id, produtos.nome, produtos.descricao, produtos.preco, produtos.quantidade, fabricante_id, fabricantes.nome AS fabricante FROM produtos INNER JOIN fabricantes 
    ON produtos.fabricante_id = fabricantes.id ORDER BY fabricantes.nome";

    try {
        $consulta = $conexao->prepare($sql);
        //Não é necessário o bindParam() pois é uma consulta apenas de exibição.
        $consulta->execute();
        // Transformando os dados em um Array com a função fetchAll para termos os dados tratados (PDO: FETCH_ASSOC)= Transforma em um array associativo.
        $resultado = $consulta->fetchAll(PDO::FETCH_UNIQUE);
    } catch (Exception $erro) {
        die("Erro:". $erro->getMessage());
    }
    return $resultado; 
}

// Funções Ultilitárias
function dump($dados){
    echo"<pre>";
    var_dump($dados);
    echo"</pre>";
}

function formataMoeda(float $valor):string {
    return "R$ ".number_format($valor,2, ",", ".");
}