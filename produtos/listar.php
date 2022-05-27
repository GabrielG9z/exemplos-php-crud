<?php
require_once "../src/funcoes-produtos.php";
// Chamando a função criada na página de funções Transformando a função lerProdutos em uma variavel $listaDeProdutos;
$listaDeProdutos = lerProdutos($conexao);
//Chamando a função ultilitária e testando :)
//dump($listaDeProdutos)
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos - Lista</title>
    <style>
        h3 {
          color: darkred;
          font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }

        .atualizar{
            background-color: greenyellow;
        }
        .excluir{
            background-color: red;
        }
        
    </style>
</head>
<body>
    <div class="container">
        <h1>Produtos | SELECT <a href="../index.php">-Home</a></h1>
        <hr>
        <h2>Lendo e carregando todos os produtos </h2>

        <p><a href="inserir.php">Inserir um novo produto</a></p>

    </div>

    <div class="produtos">


    </div>

<?php
foreach ($listaDeProdutos as $produto){
?>
<article>
    <h3><b>Nome do produto: </b><?=$produto['nome']?></h3>
    <!-- com formatação direta -->
    <p><b>Preço: </b><?=number_format($produto['preco'],2,",",".")?></p>
    <!-- com função para formatar sendo possível reaproveitar -->
    <p>Preço: <?=formataMoeda($produto['preco'])?></p>
    <p><b>Quantidade: </b><?=$produto['quantidade']?></p>
    <p><b>Descrição:  </b><?=$produto['descricao']?></p>
    <p><b>Fabricante: </b><?=$produto['fabricante']?></p>

    <p>
        <a href="atualizar.php?id=<?=$produto['id']?>" class="atualizar">Atualizar</a>
        <a href="excluir.php?id=<?=$produto['id']?>" class="excluir">Excluir</a>
    </p>
</article>
<?php
};
?>
</body>
</html>