<?php

use CrudPoo\Fabricante;

require_once '../vendor/autoload.php';

$fabricante = new Fabricante;

// Invés de declarar o $id que é uma variável, já temos uma função programada pra isso
$fabricante->setId($_GET['id']);

// A chamada do método, e ele retorna um resultado, porisso deve ter uma variável pra armazenar o return.(Executamos um método e ele devolve um array com o fabricante)
$dadosFabricante = $fabricante->lerUmFabricante();



if(isset($_POST['atualizar'])){
    $fabricante->setNome($_POST['nome']);
    // Essa função não retorna
    $fabricante->atualizarFabricante();

   

    header("location:listar.php?status=sucesso");
}

?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fabricantes - Atualizar</title>
</head>
<body>
    <div class="container">
        <h1>Fabricantes | SELECT/UPDATE</h1>
        <hr>
        
        <form action="" method="post">
            <input type="hidden" name="">
            <p>
                <label for="nome">Nome:</label>
                <input value="<?=$dadosFabricante['nome']?>" type="text" name="nome" id="nome">
            </p>
            <button type="submit" name="atualizar">Atualizar fabricante</button>
        </form>
        <p><a href="listar.php">Voltar pra lista de fabricantes</a></p>
        <p><a href="../index.php">Home</a></p>
    </div>
</body>
</html>