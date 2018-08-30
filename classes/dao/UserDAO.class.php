<?php
require_once(__DIR__ . "/Conexao.class.php");
require_once(__DIR__ . "/../modelo/User.class.php");

class UserDAO {

    public function findAll() {
        $sql = "SELECT fun_login, fun_senha FROM tb_funcionarios;";
        $statement = Conexao::get()->prepare($sql);
        $statement->execute();

        $result = $statement->fetchAll();
        $usuarios = array();
        foreach ($usuarios as $row) {
            $usuario = new User();
            $usuario->setUsuario($row['fun_login']);
            $usuario->setSenha($row['fun_senha']);
            array_push($usuarios, $usuario);
        }
        return $usuarios;
    }
}