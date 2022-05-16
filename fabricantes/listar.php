<!-- Criando a conexão com o MySQL (API/Driver de conexão) -->
<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "vendas";
 $conexao = new PDO(
    "mysql:host=$servidor; dbname=$banco; charset=utf8",$usuario,$senha
);
// Habilitando a verificação de erros
$conexao->setAttribute(PDO::ATTR_ERRMODE, //constante de erros em geral
PDO::ERRMODE_EXCEPTION );//constante de exceções de erros
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1>Fabricantes | SELECT</h1>
        <hr>
        <h2>Lendo e carregando todos os fabricantes </h2>
        <table>
            <caption>Lista de Fabricantes</caption>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
        
    </div>
</body>
</html>