<?php
require_once(__DIR__ . "/./classes/modelo/UnidadeFederativa.class.php");
require_once(__DIR__ . "/./classes/modelo/cidade.class.php");
require_once(__DIR__ . "/./classes/dao/cidadeDAO.class.php");

$uf_id = $_GET['uf'];
$uf = new UnidadeFederativa();
$uf->setId($uf_id);
$dao = new CidadeDAO();
$cidades = $dao->findByUnidadeFederativa($uf);
?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cidades</title>
    <style>
        body {
            background-color: lightseagreen;
        }
    </style>
</head>
<body>
    <label class="col-sm-2 col-form-label" for="cidade">CIDADE</label>
    <div class="col-sm-10">
        <select class="form-control" name="cidade" id="cidade" onchange="showBairros(this.value);">
            <option value="0" selected disabled>selecione uma cidade</option>
            <?php foreach ($cidades as $cidade): ?>
                <option value="<?=$cidade->getId();?>">
                    <?=$cidade->getNome();?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
</body>
</html>