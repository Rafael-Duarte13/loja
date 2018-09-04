<?php
require_once(__DIR__ . "/./classes/modelo/UnidadeFederativa.class.php");
require_once(__DIR__ . "/./classes/dao/UnidadeFederativaDAO.class.php");

$dao = new UnidadeFederativaDAO();
$ufs = $dao->findAll();
?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EXEMPLO AJAX</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/all.css">
    <style>
        body {
            background-color: lightseagreen;
        }
        div#div-style {
            background-color: whitesmoke;
            border: 3px solid black;
            border-radius: 30px;
            margin-top: 50px;
        }
        div#div_uf {
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <div class="container" id="div-style">
        <form action="" method="post">
            <!-- select estado -->
            <div class="form-group row col-12 ml-1" id="div_uf">
                <label class="col-sm-2 col-form-label" for="uf">UF</label>
                <div class="col-sm-10">
                    <select class="form-control" name="uf" id="uf" onchange="showCidades(this.value);">
                        <option value="0" selected disabled>selecione um estado</option>
                        <?php foreach ($ufs as $uf): ?>
                            <option value="<?=$uf->getId();?>">
                                <?=$uf->getNome();?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <!-- select cidade -->
            <div class="form-group row col-12 ml-1" id="div_cidade">
                <label class="col-sm-2 col-form-label" for="cidade">CIDADE</label>
                <div class="col-sm-10">
                    <select class="form-control" name="cidade" id="cidade">
                        <option value="0" selected disabled>selecione uma cidade</option>
                    </select>
                </div>
            </div>

            <!-- select bairro -->
            <div class="form-group row col-12 ml-1" id="div_bairro">
                <label class="col-sm-2 col-form-label" for="bairro">BAIRRO</label>
                <div class="col-sm-10">
                    <select class="form-control" name="bairro" id="bairro">
                        <option value="0" selected disabled>selecione um bairro</option>
                    </select>
                </div>
            </div>

            <!-- botão -->
            <div class="form-group col-12">
                <button type="submit" class="btn btn-success form-control">
                    <i class="fas fa-check"></i> Enviar
                </button>
            </div>
        </form>
    </div>

    <script src="assets/js/ajax_enderecos.js"></script>
</body>
</html>