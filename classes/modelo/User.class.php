<?php

class User {
    private $usuario;
    private $senha;

    public function __construct($usuario, $senha) {
        $this->setUsuario($usuario);
        $this->setSenha($senha);
    }

    public function getUsuario() {
        return $this->usuario;
    }
    public function setUsuario($usuario) {
        $this->usuario = strtolower($usuario);
    }

    public function getSenha() {
        return $this->senha;
    }
    public function setSenha($senha) {
        $this->senha = md5($senha);
    }

    public function logar($usuario, $senha) {
        if ($this->usuario == $usuario && $this->senha == md5($senha)) {
            return true;
        }
        return false;
    }
}