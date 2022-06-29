<?php
namespace CrudPoo;
use PDO, Exception;

final class Fabricante {
    /* Atributos */
    private int $id;
    private string $nome;

    /* Essa propriedade receberá os recursos PDO através da classe banco (dependencia do nosso projeto) */
    private PDO $conexao;

    public function __construct()
    {
        /* No momento em que for criado um objeto a partir da classe Fabricante, automaticamente será feita a conexão com o banco.---Static faz com que possamos acessar diretamente */
        $this->conexao = Banco::conecta();
    }

    public function lerFabricantes():array{
        //String com o comando SQL
        $sql = "SELECT id, nome FROM fabricantes";
        try{
        //preparação do comando
        $consulta = $this->conexao->prepare($sql);
        //Execução do comando
        $consulta->execute();
        //capturar os resultados
    $resultado = $consulta->fetchALL(PDO::FETCH_ASSOC);
        }catch(Exception $erro){
            die("Erro :".$erro->getMessage());
        }
    return $resultado;
    }





    public function inserirFabricante():void{
        $sql = "INSERT INTO fabricantes(nome) VALUES (:nome)";
        try {
            $consulta = $this->conexao->prepare($sql);
            /* bindParam('nome do parametro', $variável_com_valor, const de verificação.) */
            $consulta->bindParam(':nome',$this->nome, PDO::PARAM_STR);
            $consulta->execute();
            // Exception é uma variável
        } catch (Exception $erro) {
        die("Erro: ".$erro ->getMessage());        
        } 
    }
    
    public function lerUmFabricante():array{
        $sql = "SELECT id, nome FROM fabricantes WHERE id = :id";
    
        try {
            // Usamos o this pois conexão não é mais uma variável, e sim um propriedade dessa classe
            $consulta = $this->conexao->prepare($sql);
            $consulta ->bindParam(':id',$this->id, PDO::PARAM_INT);
            $consulta ->execute();
            $resultado = $consulta-> fetch(PDO::FETCH_ASSOC);
            return $resultado;
        } catch (Exception $erro) {
            die("Erro: ".$erro->getMessage());
        }
    }

    public function atualizarFabricante():void{
        $sql ="UPDATE fabricantes SET nome = :nome WHERE id = :id";
    
        try {
            $consulta = $this->conexao->prepare($sql);
            /* bindParam('nome do parametro', $variável_com_valor, const de verificação.) */
            /* $consulta->bindParam(':id',$this->getId(), PDO::PARAM_INT);
            $consulta->bindParam(':nome',$this->getNome(), PDO::PARAM_STR); */
            $consulta->bindParam(':id',$this->id, PDO::PARAM_INT);
            $consulta->bindParam(':nome',$this->nome, PDO::PARAM_STR);
            $consulta->execute();
            // Exception é uma variável
        } catch (Exception $erro) {
        die("Erro: ".$erro ->getMessage());        
        } 
    }

    public function getId(): int
    {
        return $this->id;
    }

    
    public function setId(int $id)
    {               
        // Filter var tem relação direta com o parametro passado na função no caso($id)
        $this->id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
    }

    
    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome)
    {
        $this->nome = filter_var($nome, FILTER_SANITIZE_SPECIAL_CHARS);
    }

    
}