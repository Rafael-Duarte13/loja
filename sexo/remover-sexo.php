<?php
require_once(__DIR__ . "/../classes/dao/SexoDAO.class.php");

$sexo = $_POST['sex_id'];
$dao = new SexoDAO();
$dao->remove($sexo);
header('location: index.php');