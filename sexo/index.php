<?php
require_once(__DIR__ . "/../classes/modelo/Sexo.class.php");
require_once(__DIR__ . "/../classes/dao/SexoDAO.class.php");
?>
<?php
$dao = new SexoDAO();
$sexo = new Sexo();
if (isset($_POST['salvar']) && $_POST['salvar'] == 'salvar') {
    $sexo = new Sexo();
    $sexo->setNome($_POST['sexo']);
    $sexo->setSigla($_POST['sigla']);
    if ($_POST['id'] != '') {
        $sexo->setId($_POST['id']);
    }
    $dao->save($sexo);
    header('location: index.php');
}
if (isset($_POST['editar']) && $_POST['editar'] == 'editar') {
    $sexo = $dao->findById($_POST['id']);
}
if (isset($_POST['remover']) && $_POST['remover'] == 'remover') {
    $dao->remove($_POST['sex_id']);
}
$sexos = $dao->findAll();
?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sexos</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/all.css">
    <style>
        body {
            background-color: lightseagreen;
        }
        div#div-style {
            background-color: whitesmoke;
            border: 3px solid black;
            margin-top: 5px;
        }
        div#div-style-1 {
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <!-- Barra de navegação -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <!-- Botão responsivo -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSite">
                <span class="navbar-toggler-icon"></span>
            </button>    
            <!-- Menus da navbar -->
            <div class="collapse navbar-collapse" id="navbarSite">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../produto/index.php"><i class="fab fa-product-hunt"></i> PRODUTOS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../marca/index.php"><i class="fab fa-bandcamp"></i> MARCAS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php"><i class="fas fa-transgender"></i> SEXOS</a>
                    </li>
                </ul>

                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="../logoult.php"><i class="fas fa-angle-double-left"></i> DESLOGAR</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

    <div class="container" id="div-style">
        <div class="row" id="div-style-1">
            <!-- formulário -->
            <div class="col-4">
                <fieldset>
                    <legend>Dados do sexo</legend>
                    <form action="index.php" method="post">
                        <input type="hidden" name="id" value="<?=$sexo->getId();?>">
                        <div class="form-group">
                            <label for="sexo">Sexo:</label>
                            <input type="text" class="form-control" name="sexo" id="sexo" autofocus maxlength="12" required value="<?=$sexo->getNome();?>">
                        </div>
                        <div class="form-group">
                            <label for="sigla">Sigla:</label>
                            <input type="text" class="form-control" name="sigla" id="sigla" maxlength="1" required value="<?=$sexo->getSigla();?>">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-block" name="salvar" value="salvar"><i class="fas fa-save"></i> Salvar</button>
                        </div>
                    </form>
                </fieldset>
            </div>
            <!-- tabela -->
            <div class="col-8">
                <fieldset>
                    <legend>Lista de sexos</legend>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>sexo</th>
                                <th>sigla</th>
                                <th colspan="2">ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($sexos as $sexo): ?>
                                <tr>
                                    <td><?=$sexo->getId();?></td>
                                    <td><?=$sexo->getNome();?></td>
                                    <td><?=$sexo->getSigla();?></td>
                                    <td>
                                        <form method="post">
                                            <input type="hidden" name="id" value="<?=$sexo->getId();?>">
                                            <button type="submit" class="btn btn-primary" name="editar" value="editar"><i class="fas fa-edit"></i></button>
                                        </form>
                                    </td>
                                    <td>
                                        <form method="post">
                                            <input type="hidden" name="sex_id" value="<?=$sexo->getId();?>">
                                            <button type="submit" class="btn btn-danger" name="remover" value="remover"><i class="fas fa-trash-alt"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </fieldset>
            </div>
        </div>
    </div>
</body>
</html>