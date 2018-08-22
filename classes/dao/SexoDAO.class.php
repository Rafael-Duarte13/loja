<?php
require_once __DIR__ . "/../modelo/Sexo.class.php";
class SexoDAO {

    private function getConexao() {
        $servidor = "10.2.2.68:3306";
        $usuario = "root";
        $senha = "";
        $banco = "db_loja_manha";
        
        $conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);

        return $conexao;
    }

    public function findAll() {
        $sql = "SELECT * FROM tb_sexos";
        $statement = $this->getConexao()->prepare($sql);
        $statement->execute();

        $result = $statement->fetchAll();
        $sexos = array();
        foreach ($result as $row) {
            $sexo = new Sexo();
            $sexo->setId($row['sex_id']);
            $sexo->setNome($row['sex_nome']);
            $sexo->setSigla($row['sex_sigla']);
            array_push($sexos, $sexo);
        }
        return $sexos;
    }

    public function findById($id) {
        $sql = "SELECT * FROM tb_sexos WHERE sex_id = $id";
        $statement = $this->getConexao()->prepare($sql);
        $statement->execute();

        $row = $statement->fetch();
        $sexo = new Sexo();

        $sexo->setId($row['sex_id']);
        $sexo->setNome($row['sex_nome']);
        $sexo->setSigla($row['sex_sigla']);

        return $sexo;
    }

    public function save(Sexo $sexo) {
        if ($sexo->getId() == NULL) {
            $this->insert($sexo);
        } else {
            $this->update($sexo);
        }
    }
    
    private function insert(Sexo $sexo) {
        $sql = "INSERT INTO tb_sexos (sex_nome, sex_sigla)
            VALUES ('{$sexo->getNome()}', '{$sexo->getSigla()}')";

        try {
            $this->getConexao()->exec($sql);
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    private function update(Sexo $sexo) {
        $sql = "UPDATE tb_sexos SET sex_nome = '{$sexo->getNome()}', sex_sigla = '{$sexo->getSigla()}'
            WHERE sex_id = {$sexo->getId()}";
        
        try {
            $this->getConexao()->exec($sql);
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function remove($id) {
        $sql = "DELETE FROM tb_sexos WHERE sex_id = $id";
        
        try {
            $this->getConexao()->exec($sql);
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
}