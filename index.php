<?php
include(__DIR__ . "/onLogado.php");

$mensagem = "";
if (isset($_SESSION['mensagem'])) {
    $mensagem = $_SESSION['mensagem'];
    session_destroy();
}
?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>LOGIN - LOJA ESPORTE</title>
    <link rel="icon" href="assets/img/icon1.png">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/all.css">
    <style>
        body {
            background-color: lightseagreen;
        }
        div#div-style {
            background-color: whitesmoke;
            border: 3px solid black;
            margin-top: 300px;
        }
        div#div-style-1 {
            margin-top: 30px;
        }
        #img {
            margin-left: 500px;
        }
    </style>
</head>
<body>
    <div class="container" id="div-style">
        <div class="row" id="div-style-1">
            <div class="col-12">
                <div align="center">
                    <img src="assets/img/icon2.png" alt="" height="80">
                </div>
                <fieldset>
                    <legend>Login na loja</legend>
                    <form action="valida.php" method="post">
                        <div class="form-group">
                            <label for="login">Usuário</label>
                            <input type="text" class="form-control" name="login" id="login">
                        </div>
                        <div class="form-group">
                            <label for="senha">Senha</label>
                            <input type="password" class="form-control" name="senha" id="senha">
                        </div>
                        <div class="mb-1" style="text-align: center; color: red;">
                            <?=$mensagem?>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-block" name="logar" value="logar">
                                <i class="fas fa-sign-in-alt"></i> Logar
                            </button>
                        </div>
                    </form>
                </fieldset>
            </div>
        </div>
    </div>
</body>
</html>