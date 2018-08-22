<?php
require_once "classes/modelo/Sexo.class.php";
require_once "classes/dao/SexoDAO.class.php";

$dao = new SexoDAO();

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

$dao->remove(8);