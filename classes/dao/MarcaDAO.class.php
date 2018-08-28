<?php
require_once(__DIR__ . "/./Conexao.class.php");
require_once(__DIR__ . "/../modelo/Marca.class.php");

class MarcaDAO {

    public function findAll() {
        $sql = "SELECT * FROM tb_marcas";
        $statement = Conexao::get()->prepare($sql);
        $statement->execute();

        $rows = $statement->fetchAll();
        $marcas = array();
        foreach ($rows as $row) {
            $marca = new Marca();
            $marca->setId($row['mar_id']);
            $marca->setNome($row['mar_nome']);
            array_push($marcas, $marca);
        }
        return $marcas;
    }

    public function findById($id) {
        $sql = "SELECT * FROM tb_marcas WHERE mar_id = :id";
        $statement = Conexao::get()->prepare($sql);
        $statement->bindParam(":id", $id);
        $statement->execute();

        $row = $statement->fetch();

        $marca = new Marca();
        $marca->setId($row['mar_id']);
        $marca->setNome($row['mar_nome']);

        return $marca;
    }

    public function save(Marca $marca) {
        if ($marca->getId() == NULL) {
            $this->insert($marca);
        } else {
            $this->update($marca);
        }
    }
    
    private function insert(Marca $marca) {
        $sql = "INSERT INTO tb_marcas (mar_nome)
            VALUES (:nome)";
        try {
            $statement = Conexao::get()->prepare($sql);
            $statement->bindParam(":nome", $marca->getNome());
            $statement->execute();
            return $this->findById($marca->getId());
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
        return $marca;
    }

    private function update(Marca $marca) {
        $sql = "UPDATE tb_marcas 
            SET mar_nome = :nome WHERE mar_id = :id";
        try {
            $statement = Conexao::get()->prepare($sql);
            $statement->bindParam(":nome", $marca->getNome());
            $statement->bindParam(":id", $marca->getId());
            $statement->execute();
            return $this->findById($produto->getId());
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }

    public function remove($id) {
        $sql = "DELETE FROM tb_marcas WHERE mar_id = :id";
        try {
            $statement = Conexao::get()->prepare($sql);
            $statement->bindParam(":id", $id);
            $statement->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}