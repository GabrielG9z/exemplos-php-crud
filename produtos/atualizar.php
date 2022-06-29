<?php
require_once "../vendor/autoload.php";

use CrudPoo\Fabricante;
use CrudPoo\Produto;

$produto = new Produto;

//Pegando o valor do id e sanitizando
$produto ->setId($_GET['id']);

//chamando a função e recebendo os dados do produto
$dadosProduto = $produto->lerUmProduto();





if(isset($_POST['atualizar'])){
    require_once "../src/funcoes-produtos.php";
    $nome->setNome($_POST['nome']);
    $preco->setPreco($_POST['preco']);
    $quantidade->setQuantidade($_POST['quantidade']);
    $descricao->setDescricao($_POST['descricao']);
    $fabricanteId->setFabricanteId($_POST['fabricante']);
    
    $produto->atualizarProduto();
    
    // 'link ancora' para retornar à página desejada
    header("location:listar.php");
    }
    
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos - Atualizar</title>
</head>
<body>
    <div class="container">
        <h1>Produtos | ATUALIZAR</h1>
        <hr>
        
        <form action="" method="post">
            <p>
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" value="<?=$dadosProduto['nome']?>" required>
            </p>
            <p>
                <label for="preco">Preço: </label>
                <input value="<?=$dadosProduto['preco']?>"type="number" name="preco" id="preco" min="0" max="1000" step="0.01" required>
            </p>
            <p>
                <label for="quantidade">Quantidade:</label>
                <input value="<?=$dadosProduto['quantidade']?>" type="number" name="quantidade" id="quantidade" min="0" max="100" required>
            </p>

            <p>
                <!-- Para <option value =id>nome</option> -->
                <label for="fabricante">Fabricante:</label>
                <select name="fabricante" id="fabricante" required>
                <option value=""></option>
            
                <?php
                // o value id é para o banco de dados
                foreach ($listaFabricantes as $fabricante){ ?>
                
                <!-- Configuração para exibição dos fabricantes, a condicional se for verdadeira exibe o 'selected' no qual  -->

                <option <?php
                /*Se a chave estrangeira for idêntica à chave primária então coloque o atributo selected no option */ 
                 if($dadosProduto['fabricante_id'] == $fabricante['id']) 
                echo "selected"; ?> value="<?=$fabricante['id']?>">
                <?=$fabricante['nome']?> <!-- exibição no front -->
            </option>
            <?php } ?>
            </select>    
            </p>
            <p>
                <label for="descricao">Descrição:</label>
                <textarea name="descricao" id="descricao" cols="30" rows="10" required><?=$dadosProduto['descricao']?></textarea>
            </p>
            <button type="submit" name="atualizar">Atualizar Produto</button>
        </form>
        <p><a href="listar.php">Voltar pra lista de produtos</a></p>
        <p><a href="../index.php">Home</a></p>
    </div>
</body>
</html>