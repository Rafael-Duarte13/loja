<?php
session_start();
$home = "/loja/produto";
if (isset($_SESSION['isLogado']) && $_SESSION['isLogado'] == true) {
    header("location: $home");
}