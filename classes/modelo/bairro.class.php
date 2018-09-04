<?php

class Bairro {
    private $id;
    private $nome;
    private $cidade;

    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
    }

    public function getNome() {
        return $this->nome;
    }
    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getCidade() {
        return $this->cidade;
    }
    public function setCidade(Cidade $cidade) {
        $this->cidade = $cidade;
    }
}