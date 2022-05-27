<?php
require_once "../src/funcoes-fabricantes.php";
$listaFabricantes = lerFabricantes($conexao);

if(isset($_POST['inserir'])){
require_once "../src/funcoes-produtos.php";
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
$preco = filter_input(INPUT_POST, 'preco', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
$quantidade = filter_input(INPUT_POST, 'quantidade', FILTER_SANITIZE_NUMBER_INT);
$descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS);
$fabricanteId = filter_input(INPUT_POST, 'fabricante', FILTER_SANITIZE_NUMBER_INT);

inserirProduto($conexao, $nome, $preco, $quantidade, $descricao, $fabricanteId);

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
    <title>Produtos - Inserir</title>
</head>
<body>
    <div class="container">
        <h1>Produtos | INSERT</h1>
        <hr>
        
        <form action="" method="post">
            <p>
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" required>
            </p>
            <p>
                <label for="preco">Preço: </label>
                <input type="number" name="preco" id="preco" min="0" max="1000" step="0.01" required>
            </p>
            <p>
                <label for="quantidade">Quantidade:</label>
                <input type="number" name="quantidade" id="quantidade" min="0" max="100" required>
            </p>

            <p>
                <!-- Para <option value =id>nome</option> -->
                <label for="fabricante">Fabricante:</label>
                <select name="fabricante" id="fabricante" required>
                <option value=""></option>
            
                <?php
                // o value id é para o banco de dados
                foreach ($listaFabricantes as $fabricante){ ?>
                <option value="<?=$fabricante['id']?>">
                <?=$fabricante['nome']?> <!-- exibição no front -->
            </option>
            <?php } ?>
            </select>    
            </p>
            <p>
                <label for="descricao">Descrição:</label>
                <textarea name="descricao" id="descricao" cols="30" rows="10" required></textarea>
            </p>
            <button type="submit" name="inserir">Inserir Produto</button>
        </form>
        <p><a href="listar.php">Voltar pra lista de produtos</a></p>
        <p><a href="../index.php">Home</a></p>
    </div>
</body>
</html>