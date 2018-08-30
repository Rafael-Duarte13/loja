<?php
require_once(__DIR__ . "/../classes/modelo/Produto.class.php");
require_once(__DIR__ . "/../classes/dao/ProdutoDAO.class.php");
require_once(__DIR__ . "/../classes/modelo/Marca.class.php");
require_once(__DIR__ . "/../classes/dao/MarcaDAO.class.php");

include(__DIR__ . "/../logado.php");

$marcaDao = new MarcaDAO();
$produtoDao = new ProdutoDAO();
$produto = new Produto();

if (isset($_POST['salvar']) && $_POST['salvar'] == 'salvar') {
    $produto->setNome($_POST['produto']);
    $produto->setValor($_POST['valor']);
    $produto->getMarca()->setId($_POST['marca']);
    if ($produto->getMarca()->getId() == 0) {
        $produto->getMarca()->setId(null);
    }
    if ($_POST['id'] != '') {
        $produto->setId($_POST['id']);
    }
    $produtoDao->save($produto);
    header('location: index.php');
}

if (isset($_POST['cancelar']) && $_POST['cancelar'] == 'cancelar') {
    header('location: index.php');
}

if (isset($_POST['buscar']) && $_POST['buscar'] == 'buscar') {
    $produtoDao->findById($_POST['id_buscar']);
}

if (isset($_POST['editar']) && $_POST['editar'] == 'editar') {
    $produto = $produtoDao->findById($_POST['id_edit']);
}

if (isset($_POST['remover']) && $_POST['remover'] == 'remover') {
    $produtoDao->remove($_POST['id_rem']);
    header('location: index.php');
}
$produtos = $produtoDao->findAll();
$marcas = $marcaDao->findAll();
?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Document</title>
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
                        <a class="nav-link active" href="index.php"><i class="fab fa-product-hunt"></i> PRODUTOS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../marca/index.php"><i class="fab fa-bandcamp"></i> MARCAS</a>
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
       <div class="row" id="div-style-1">
           <!-- Formulario -->
           <div class="col-5">
                <fieldset>
                    <legend>Dados dos Produtos</legend>
                    <form method="post">

                        <input type="hidden" name="id" value="<?=$produto->getId()?>">
                        <div class="form-group">
                            <!-- Input do produto -->
                            <label for="produto">Produto</label>
                            <input type="text" class="form-control" name="produto" id="produto" value="<?=$produto->getNome();?>">
                        </div>

                        <div class="row">
                            <div class="col form-group">
                                <!-- Select da marca -->
                                <label for="marca">Marca</label>
                                <select class="form-control" name="marca" id="marca">
                                    <option value="0" selected disabled>Selecione a marca</option>
                                    <?php foreach($marcas as $marca): ?>
                                        <?php
                                            $selected = "";
                                            if ($marca->getId() == $produto->getMarca()->getId()) {
                                                $selected = "selected";
                                            }
                                        ?>
                                        <option value="<?=$marca->getId();?>" <?=$selected?>><?=$marca->getNome();?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col form-group">
                                <!-- Input do preço -->
                                <label for="valor">Valor</label>
                                <input type="text" class="form-control" name="valor" id="valor" value="<?=$produto->getValor();?>">
                            </div>
                        </div>
                        <!-- Botão para salvar o produto -->
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-block" name="salvar" value="salvar" onclick="return confirmaSalvar();">
                                <i class="fas fa-save"></i> Salvar
                            </button>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-danger btn-block" name="cancelar" value="cancelar">
                                Cancelar
                            </button>
                        </div>
                    </form>
                </fieldset>
           </div>

           <!-- Tabela -->
           <div class="col-7">
               <fieldset>
                   <legend>Lista de Produtos</legend>
                   <table class="table table-striped table-hover">
                       <thead>
                           <tr>
                               <th>#</th>
                               <th>produto</th>
                               <th>marca</th>
                               <th>preço</th>
                               <th colspan="2">ações</th>
                           </tr>
                       </thead>
                       <tbody>
                           <?php foreach ($produtos as $produto): ?>
                                <tr>
                                    <td><?=$produto->getId();?></td>
                                    <td><?=$produto->getNome();?></td>
                                    <td><?=$produto->getMarca()->getNome();?></td>
                                    <td><?=$produto->getValor();?></td>
                                    <td>
                                        <form method="post">
                                            <input type="hidden" name="id_edit" value="<?=$produto->getId()?>">
                                            <button type="submit" class="btn btn-primary" name="editar" value="editar"><i class="fas fa-edit"></i></button>
                                        </form>
                                    </td>
                                    <td>
                                        <form method="post">
                                            <input type="hidden" name="id_rem" value="<?=$produto->getId()?>">
                                            <button type="submit" class="btn btn-danger" name="remover" value="remover" onclick="return confirmaRemover();"><i class="fas fa-trash-alt"></i></button>
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
   <script src="../assets/js/produto.js"></script>
</body>
</html>