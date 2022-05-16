<?php
require_once "conecta.php";

//Ler os dados dos fabricantes
function lerFabricantes($conexao):array{
    //String com o comando SQL
    $sql = "SELECT id, nome FROM fabricantes";
    try{
    //preparação do comando
    $consulta = $conexao->prepare($sql);
    //Execução do comando
    $consulta->execute();
    //capturar os resultados
$resultado = $consulta->fetchALL(PDO::FETCH_ASSOC);
    }catch(Exception $erro){
        die("Erro :".$erro->getMessage());
    }
return $resultado;
}

//Inserir fabricantes
function inserirFabricante(PDO $conexao, string $nome)