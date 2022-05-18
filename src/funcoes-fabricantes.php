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

//Inserir fabricantes                                 :void = função que não tem return;
function inserirFabricante(PDO $conexao, string $nome):void{
    // :qualquerCoisa -> isso é um named parameter;
    // 
    $sql = "INSERT INTO fabricantes(nome) VALUES ('$nome')";
    try {
        $consulta = $conexao->prepare($sql);
        /* bindParam('nome do parametro', $variável_com_valor, const de verificação.) */
        $consulta->bindParam(':nome',$nome, PDO::PARAM_STR);
        $consulta->execute();
        // Exception é uma variável
    } catch (Exception $erro) {
    die("Erro: ".$erro ->getMessage());        
    } 
}
// 
function lerUmFabricante(PDO $conexao, int $id):array{
    $sql = "SELECT id, nome FROM fabricantes WHERE id = :id";

    try {
        $consulta = $conexao->prepare($sql);
        $consulta ->bindParam(':id',$id, PDO::PARAM_INT);
        $consulta ->execute();
        $resultado = $consulta-> fetch(PDO::FETCH_ASSOC);
        return $resultado;
    } catch (Exception $erro) {
        die("Erro: ".$erro->getMessage());
    }
}

function atualizarFabricante(PDO $conexao, int $id, $nome):void{
    $sql ="UPDATE fabricantes SET nome = :nome WHERE id = :id";

    try {
        $consulta = $conexao->prepare($sql);
        /* bindParam('nome do parametro', $variável_com_valor, const de verificação.) */
        $consulta->bindParam(':id',$id, PDO::PARAM_INT);
        $consulta->bindParam(':nome',$nome, PDO::PARAM_STR);
        $consulta->execute();
        // Exception é uma variável
    } catch (Exception $erro) {
    die("Erro: ".$erro ->getMessage());        
    } 
}