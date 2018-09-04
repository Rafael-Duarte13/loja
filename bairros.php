<?php
require_once(__DIR__ . "/./classes/modelo/cidade.class.php");
require_once(__DIR__ . "/./classes/modelo/bairro.class.php");
require_once(__DIR__ . "/./classes/dao/bairroDAO.class.php");

$cid_id = $_GET['cidade'];
$cidade = new Cidade();
$cidade->setId($cid_id);
$dao = new BairroDAO();
$bairros = $dao->findByCidade($cidade);
?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bairros</title>
</head>
<body>
    <label class="col-sm-2 col-form-label" for="bairro">BAIRRO</label>
    <div class="col-sm-10">
        <select class="form-control" name="bairro" id="bairro">
            <option value="0" selected disabled>selecione um bairro</option>
            <?php foreach ($bairros as $bairro): ?>
                <option value="<?=$bairro->getId();?>">
                    <?=$bairro->getNome();?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
</body>
</html>