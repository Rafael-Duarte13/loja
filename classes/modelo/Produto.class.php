<?php
require_once(__DIR__ . "/./Marca.class.php");

class Produto {
    private $id;
    private $nome;
    private $marca;
    private $valor;

    public function __construct() {
        $this->marca = new Marca();
    }

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

    public function getValor() {
        return $this->valor;
    }
    public function setValor($valor) {
        $this->valor = $valor;
    }

    public function getMarca() {
        return $this->marca;
    }
    public function setMarca(Marca $marca) {
        $this->marca = $marca;
    }
}