<?php

namespace CrudPoo;
use PDO, Exception;
final class Produto {
    private int $id;
    private string $nome;
    private float $preco;
    private int $quantidade;
    private string $descricao;
    private int $fabricanteId;
    private PDO $conexao;

    public function __construct()
    {
        $this->conexao = Banco::conecta();
    }

     public function lerProdutos():array{
        $sql = "SELECT produtos.id, produtos.nome, produtos.descricao, produtos.preco, produtos.quantidade, fabricante_id, fabricantes.nome AS fabricante FROM produtos INNER JOIN fabricantes 
        ON produtos.fabricante_id = fabricantes.id ORDER BY fabricantes.nome";
    
        try {
            $consulta = $this->conexao->prepare($sql);
        
            $consulta->execute();
            
            $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $erro) {
            die("Erro:". $erro->getMessage());
        }
        return $resultado; 
    }

    public function inserirProduto():void {
        $sql = "INSERT INTO produtos (nome, preco, quantidade, descricao, fabricante_id) VALUES(:nome, :preco, :quantidade, :descricao, :fabricante_id)";
    
        try {
            $consulta = $this->conexao->prepare($sql);
            $consulta->bindParam(':nome',$this->nome, PDO::PARAM_STR);
            $consulta->bindParam(':preco',$this->preco, PDO::PARAM_STR);
            $consulta->bindParam('quantidade',$this->quantidade,PDO::PARAM_INT);
            $consulta->bindParam('descricao',$this->descricao, PDO::PARAM_STR);
            $consulta->bindParam('fabricante_id', $this->fabricanteId, PDO::PARAM_INT);
            $consulta->execute();
        } catch (Exception $erro) {
            die("Erro:". $erro->getMessage());
        }
    }

    public function lerUmProduto():array{
        $sql = "SELECT id, nome, preco, quantidade, descricao, fabricante_id FROM produtos WHERE id = :id";
    
        try {
            $consulta = $this->conexao->prepare($sql);
            $consulta->bindParam(':id', $this->id, PDO::PARAM_INT);
            $consulta->execute();
            $resultado = $consulta->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $erro) {
            die("Erro ".$erro->getMessage());
        }
        return $resultado;
    } 

    public function atualizarProduto():void {
        $sql = "UPDATE  produtos SET nome = :nome, preco = :preco, quantidade = :quantidade, descricao = :descricao, fabricante_id = :fabricanteId WHERE id = :id";
    
        try {
            $consulta = $this->conexao->prepare($sql);
            $consulta->bindParam(':id', $this->id, PDO::PARAM_INT);
            $consulta->bindParam(':nome',$this->nome, PDO::PARAM_STR);
            $consulta->bindParam(':preco',$this->preco, PDO::PARAM_STR);
            $consulta->bindParam('quantidade',$this->quantidade,PDO::PARAM_INT);
            $consulta->bindParam('descricao',$this->descricao, PDO::PARAM_STR);
            $consulta->bindParam('fabricanteId', $this->fabricanteId, PDO::PARAM_INT);
            $consulta->execute();
        } catch (Exception $erro) {
            die("Erro:". $erro->getMessage());
        }
    
    }
    
    public function getId(): int
    {
        return $this->id;
    }

    
    public function setId(int $id): self
    {
        $this->id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);

        return $this;
    }

    
    public function getNome(): string
    {
        return $this->nome;
    }

    
    public function setNome(string $nome): self
    {
        $this->nome = filter_var($nome, FILTER_SANITIZE_SPECIAL_CHARS);

        return $this;
    }

    
    public function getPreco(): float
    {
        return $this->preco;
    }

    
    public function setPreco(float $preco): self
    {
        $this->preco = filter_var($preco, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );

        return $this;
    }

    
    public function getQuantidade(): int
    {
        return $this->quantidade;
    }

    
    public function setQuantidade(int $quantidade): self
    {
        $this->quantidade = filter_var($quantidade, FILTER_SANITIZE_NUMBER_INT);

        return $this;
    }

    
    public function getDescricao(): string
    {
        return $this->descricao;
    }

    
    public function setDescricao(string $descricao): self
    {
        $this->descricao = filter_var($descricao, FILTER_SANITIZE_SPECIAL_CHARS);

        return $this;
    }

    
    public function getFabricanteId(): int
    {
        return $this->fabricanteId;
    }

    
    public function setFabricanteId(int $fabricanteId): self
    {
        $this->fabricanteId = $fabricanteId;

        return $this;
    }
}