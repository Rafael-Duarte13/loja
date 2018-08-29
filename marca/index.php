<?php
require_once(__DIR__ . "/../classes/modelo/Marca.class.php");
require_once(__DIR__ . "/../classes/dao/MarcaDAO.class.php");

// $dao = new MarcaDAO();
// $marca = new Marca();
// if (isset($_POST['salvar']) && $_POST['salvar'] == 'salvar') {
//     $marca = new Marca();
//     $marca->setNome($_POST['marca']);
//     if ($_POST['id'] != '') {
//         $marca->setId($_POST['id']);
//     }
//     $dao->save($marca);
//     header('location: index.php');
// }
// if (isset($_POST['editar']) && $_POST['editar'] == 'editar') {
//     $marca = $dao->findById($_POST['id']);
// }
// $marcas = $dao->findAll();
?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Marcas - Loja de Esporte</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/all.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-5">
                <form action="index.php" method="post">
                    <legend><h2>Dados da marca</h2></legend>
                    <div class="col-10">
                        <label for="id_marc">ID</label>
                        <input type="text" class="form-control" name="id" id="id_marc" value="<?=$marca->getId();?>" disabled>
                    </div>
                    <div class="col-10">
                        <label for="marc">Nome</label>
                        <input type="text" class="form-control" name="marca" id="marc" value="<?=$marca->getNome()?>">
                    </div>
                    <div class="col-10 mt-2">
                        <button type="submit" class="btn btn-success" name="salvar" value="salvar"><i class="fas fa-save"></i> Salvar</button>
                        <button type="reset" class="btn btn-danger">Limpar</button>
                    </div>
                </form>
            </div>
            <div class="col-7">
                <table class="table table-striped table-hover">
                    <legend><h2>Marcas cadastradas</h2></legend>
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">nome</th>
                            <th scope="col" colspan="2">ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($marcas as $marca): ?>
                        <tr>
                            <th scope="col"><?=$marca->getId();?></th>
                            <td><?=$marca->getNome();?></td>
                            <td>
                                <form action="index.php" method="post">
                                    <input type="hidden" name="id" value="<?=$marca->getId()?>">
                                    <button type="submit" class="btn btn-primary" name="editar" value="editar"><i class="fas fa-edit"></i></button>
                                </form>
                            </td>
                            <td>
                                <form action="" method="post">
                                    <input type="hidden" name="marc_id" value="<?=$marca->getId();?>">
                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>