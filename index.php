<?php
require_once "classes/modelo/Sexo.class.php";
require_once "classes/dao/SexoDAO.class.php";

$dao = new SexoDAO();

/*
    //Mostrando todos os dados
    $dao = new SexoDAO();
    $sexos = $dao->findAll();

    foreach ($sexos as $sexo) {
        echo("{$sexo->getId()} - {$sexo->getNome()} ");
    }
    
    //Mostrando apenas 1 dado
    $dao = new SexoDAO();
    $sexo = $dao->findById(2);
    echo("<br> {$sexo->getId()} - {$sexo->getNome()} - {$sexo->getSigla()} <br>");

/*

$sexo = new Sexo();
$sexo->setNome('teste');
$sexo->setSigla('t');

$dao->save($sexo);
*/

/*
$sexo = new Sexo();
$sexo->setId(9);
$sexo->setNome('TESTE');
$sexo->setSigla('T');

$dao->update($sexo);
*/

// $dao->remove(5);