<?php
require_once(__DIR__ . "/classes/modelo/User.class.php");
session_start();

$user = new User("admin", "senac");

$usuario = $_POST['login'];
$senha = $_POST['senha'];

$user->logar($usuario, $senha);

if ($user->logar($usuario, $senha)) {
    $_SESSION['isLogado'] = true;
    header('location: /loja/produto/');
} else {
    $_SESSION['isLogado'] = false;
    $_SESSION['mensagem'] = "Usuário ou senha inválidos.";
    header('location: /loja/');
}