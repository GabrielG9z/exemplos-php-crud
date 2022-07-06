<?php
namespace CrudPoo;

/* O use PDO tem a mesma função da barra invertida. */
/* Indicamos o uso das classes nativas do PHP (ou seja classes que não fazem parte do nossos namespace) */
use PDO, Exception;

abstract class Banco {
    /* Propriedades/Atributos de acesso ao servidor de Banco de Dados ((private) pois só será acessado nesta classe.) O (static) serve pra acessar recursos sem que sejam um objeto.*/
    
    private static string $servidor = "localhost";
    private static string $banco = "vendas";
    private static string $usuario = "root";
    private static string $senha = "";
    
    /* A barra invertida (\) faz com que a referência PDO vá na raiz da linguagem, e não na classe 
    private static \PDO $conexao;*/

    private static PDO $conexao;

    /* Método de conexão ao banco */

    public static function conecta(): PDO {
        try {
            /* Acessando e concatenando as propriedades estáticas com o recurso (self::) self permite acessar recursos estáticos da própria Classe.*/

            self :: $conexao = new PDO(
                "mysql:host= ". self :: $servidor ." ;dbname= ". self :: $banco .";charset=utf8", self :: $usuario , self :: $senha);  
                              
            self :: $conexao->setAttribute(PDO :: ATTR_ERRMODE, 
            PDO :: ERRMODE_EXCEPTION );

        }
         catch (Exception $erro) {
            die("Deu ruim: ".$erro->getMessage());
        }
        return self :: $conexao;
    }
}

/* Realizando a chamada */
Banco::conecta(); //teste