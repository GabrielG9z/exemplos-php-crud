<?php
require_once "../src/funcoes-fabricantes.php";
    //metodo get, o parametro id(pois é dinamico), e o tratamento filter
$id = filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT);

$teste = excluirFabricante($conexao, $id);
header("location:listar.php");
?>