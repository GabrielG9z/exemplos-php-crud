<?php
require_once "../src/funcoes-fabricantes.php";
    //metodo get, o parametro id(pois é dinamico), e o tratamento filter
$id = filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT);

$teste = excluirFabricante($conexao, $id);
header("location:listar.php");
?>

<p>Clique no botão para exibir a caixa de confirmação.</p>

<button onclick="funcao1()">Clique aqui</button>

<p id="demo"></p>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>
<body>
</head>
<body>

//Comando SQL Upadte para Atualizar os dados
     $sql = "UPDATE clientes set nome='$nome',cpf='$cpf',email='$email',setor='$setor',rua='$rua',numero='$numero',telefone='$telefone' WHERE id='$codigo'";
     //Testa o comando SQL
     mysql_query($sql) or die("Não foi possivel exercutar o comando Sql");
     //Mensagem de Sucesso na operação
     echo "O arquivo foi Alterado com sucesso";
     //Fechar a conexão
     mysql_close($conn);
}
else 
{
    echo "<script>alert('não houve conexão com o banco');</script>";
}
?>
</script>
</body>
</html>