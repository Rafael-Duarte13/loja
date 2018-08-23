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
$sexos = $dao->findAll();
?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sexos</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
</head>
<body>
    <div class="container">
        <div class="row" style="margin-top: 50px;">
            <!-- formulário -->
            <div class="col-6">
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
                            <button type="submit" class="btn btn-success btn-block" name="salvar" value="salvar">Salvar</button>
                        </div>
                    </form>
                </fieldset>
            </div>
            <!-- tabela -->
            <div class="col-6">
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
                                        <form action="index.php" method="post">
                                            <input type="hidden" name="id" value="<?=$sexo->getId();?>">
                                            <button type="submit" class="btn btn-primary btn-sm" name="editar" value="editar">Editar</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="remover-sexo.php" method="post">
                                            <input type="hidden" name="sex_id" value="<?=$sexo->getId();?>">
                                            <button type="submit" class="btn btn-danger btn-sm">Remover</button>
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