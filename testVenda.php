<?php
require_once(__DIR__ . "/./classes/modelo/Funcionario.class.php");
require_once(__DIR__ . "/./classes/modelo/Cliente.class.php");
require_once(__DIR__ . "/./classes/modelo/Produto.class.php");
require_once(__DIR__ . "/./classes/modelo/Venda.class.php");
require_once(__DIR__ . "/./classes/dao/VendaDAO.class.php");

// $cliente = new Cliente();
// $cliente->setId(1);

// $funcionario = new Funcionario();
// $funcionario->setMatricula(1);

// $venda = new Venda();
// $venda->setFuncionario($funcionario);
// $venda->setCliente($cliente);

// $prodA = new Produto();
// $prodA->setId(2);
// $venda->addProduto($prodA);

// $prodB = new Produto();
// $prodB->setId(16);
// $venda->addProduto($prodB);

// $prodC = new Produto();
// $prodC->setId(9);
// $venda->addProduto($prodC);

// $dao = new VendaDAO();
// echo("<pre>");
// var_dump($dao->insert($venda));
// echo("</pre>");