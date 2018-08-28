<?php
require_once(__DIR__ . "/../classes/modelo/Marca.class.php");
require_once(__DIR__ . "/../classes/dao/MarcaDAO.class.php");

// // Pegar dados de todas as marcas.
// $dao = new MarcaDAO();
// $marcas = $dao->findAll();

// foreach ($marcas as $marca) {
//     echo("{$marca->getId()} - {$marca->getNome()}<br>");
// }

// // Pegar dados da marca por id.
// $dao = new MarcaDAO();
// $marca = $dao->findById(2);
// echo("{$marca->getId()} - {$marca->getNome()}");

// Adicionar ou atualizar marca.
$dao = new MarcaDAO();
$marca = new Marca();
$marca->setNome('PUMA');
$dao->save($marca);

// // Remover uma marca por id.
// $dao = new MarcaDAO();
// $dao->remove(6);