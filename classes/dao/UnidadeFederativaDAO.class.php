<?php
require_once(__DIR__ . "/Conexao.class.php");
require_once(__DIR__ . "/../modelo/UnidadeFederativa.class.php");

class UnidadeFederativaDAO {
    public function findAll() {
        $sql = "SELECT * FROM tb_ufs";
        $statement = Conexao::get()->prepare($sql);
        $statement->execute();

        $rows = $statement->fetchAll();
        $ufs = array();
        foreach ($rows as $row) {
            $uf = new UnidadeFederativa();
            $uf->setId($row['uf_id']);
            $uf->setNome($row['uf_nome']);
            $uf->setSigla($row['uf_sigla']);
            array_push($ufs, $uf);
        }
        return $ufs;
    }

    public function findById($id) {
        $sql = "SELECT * FROM tb_ufs WHERE uf_id = :id";
        $statement = Conexao::get()->prepare($sql);
        $statement->bindParam(":id", $id);
        $statement->execute();

        $row = $statement->fetch();

        $uf = new UnidadeFederativa();
        $uf->setId($row['uf_id']);
        $uf->setNome($row['uf_nome']);
        $uf->setSigla($row['uf_sigla']);

        return $uf;
    }
}