<?php require_once(__DIR__ . "/../classes/modelo/Marca.class.php"); ?>
<?php require_once(__DIR__ . "/../classes/dao/MarcaDAO.class.php"); ?>
<?php 
$dao = new MarcaDAO();
$marca = new Marca();
if (isset($_POST['salvar']) && $_POST['salvar'] == 'salvar') {
    $marca->setNome($_POST['marca']);
    if ($_POST['id'] != '') {
        $marca->setId($_POST['id']);
    }
    $dao->save($marca);
    header('location: index.php');
}
if (isset($_POST['editar']) && $_POST['editar'] == 'editar') {
    $marca = $dao->findById($_POST['id']);
}
if (isset($_POST['remover']) && $_POST['remover'] == 'remover') {
    $dao->remove($_POST['id']);
    header('location: index.php');
}
$marcas = $dao->findAll();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
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
            border-radius: 25px;
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
                        <a class="nav-link active" href="index.php"><i class="fab fa-bandcamp"></i> MARCAS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../sexo/index.php"><i class="fas fa-transgender"></i> SEXOS</a>
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
        <div id="div-style-1">
            <fieldset>
                <legend>Dados da Marca</legend>
                <form action="index.php" method="post">
                    <input type="hidden" name="id" value="<?=$marca->getId();?>">
                    <div class="form-group">
                        <label for="marca">Marca</label>
                        <input type="text" class="form-control" name="marca" id="marca" maxlength="12" required value="<?=$marca->getNome();?>">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-block" name="salvar" value="salvar">
                            <i class="fas fa-save"></i> Salvar
                        </button>
                    </div>
                </form>
            </fieldset>
        </div>

        <fieldset>
            <legend>Lista de Marcas</legend>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>marca</th>
                        <th colspan="2">ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($marcas as $marca): ?>
                        <tr>
                            <td><?=$marca->getId();?></td>
                            <td><?=$marca->getNome();?></td>
                            <td>
                                <form method="post">
                                    <input type="hidden" name="id" value="<?=$marca->getId();?>">
                                    <button type="submit" class="btn btn-primary" name="editar" value="editar"><i class="fas fa-edit"></i></button>
                                </form>
                            </td>
                            <td>
                                <form method="post">
                                    <input type="hidden" name="id" value="<?=$marca->getId();?>">
                                    <button type="submit" class="btn btn-danger" name="remover" value="remover"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </fieldset>
    </div>
</body>
</html>