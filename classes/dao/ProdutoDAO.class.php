<?php
require_once(__DIR__ . "/./Conexao.class.php");
require_once(__DIR__ . "/../modelo/Produto.class.php");
require_once(__DIR__ . "/../modelo/Marca.class.php");

class ProdutoDAO {
    public function findAll() {
        $sql = "SELECT pro_id, pro_nome, pro_preco, mar_id, mar_nome FROM tb_produtos
            JOIN tb_marcas ON mar_id = pro_mar_id";
        $statement = Conexao::get()->prepare($sql);
        $statement->execute();

        $rows = $statement->fetchAll();
        $produtos = array();
        foreach ($rows as $row) {
            $marca = new Marca();
            $marca->setId($row['mar_id']);
            $marca->setNome($row['mar_nome']);

            $produto = new Produto();
            $produto->setId($row['pro_id']);
            $produto->setNome($row['pro_nome']);
            $produto->setValor($row['pro_preco']);
            $produto->setMarca($marca);
            array_push($produtos, $produto);
        }
        return $produtos;
    }

    public function findById($id) {
        $sql = "SELECT pro_id, pro_nome, pro_preco, mar_id, mar_nome FROM tb_produtos
            JOIN tb_marcas ON mar_id = pro_mar_id WHERE pro_id = :id";
        $statement = Conexao::get()->prepare($sql);
        $statement->bindParam(":id", $id);
        $statement->execute();

        $row = $statement->fetch();
        
        $marca = new Marca();
        $marca->setId($row['mar_id']);
        $marca->setNome($row['mar_nome']);

        $produto = new Produto();
        $produto->setId($row['pro_id']);
        $produto->setNome($row['pro_nome']);
        $produto->setValor($row['pro_preco']);
        $produto->setMarca($marca);

        return $produto;
    }

    public function save(Produto $produto) {
        if ($produto->getId() == NULL) {
            $this->insert($produto);
        } else {
            $this->update($produto);
        }
    }
    
    private function insert(Produto $produto) {
        $sql = "INSERT INTO tb_produtos (pro_nome, pro_preco, pro_mar_id)
            VALUES (:nome, :valor, :marca)";

        try {
            $statement = Conexao::get()->prepare($sql);
            $statement->bindParam(":nome", $produto->getNome());
            $statement->bindParam(":valor", $produto->getValor());
            $statement->bindParam(":marca", $produto->getMarca()->getId());
            $statement->execute();
            return $this->findById($produto->getId());
        } catch(PDOException $e) {
            echo $e->getMessage();
            return null;
        }
        return $produto;
    }
    
    private function update(Produto $produto) {
        $sql = "UPDATE tb_produtos 
            SET pro_nome = :nome, 
                pro_preco = :valor, 
                pro_mar_id = :marca
            WHERE pro_id = :id";
        
        try {
            $statement = Conexao::get()->prepare($sql);
            $statement->bindParam(":nome", $produto->getNome());
            $statement->bindParam(":valor", $produto->getValor());
            $statement->bindParam(":marca", $produto->getMarca()->getId());
            $statement->bindParam(":id", $produto->getId());
            $statement->execute();
            return $this->findById($produto->getId());
        } catch(PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }

    public function remove($id) {
        $sql = "DELETE FROM tb_produtos WHERE pro_id = :id";
        try {
            $statement = Conexao::get()->prepare($sql);
            $statement->bindParam(":id", $id);
            $statement->execute();
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
}