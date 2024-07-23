<?php
include 'conexao.php';

$id = $_GET['id'];

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar|GN</title>
    <link rel="shortcut icon" href="images/cropped-favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style-produto1.css">

</head>

<body>
    <div class="container">
        <form action="#" method="post">
            <?php
            $sql = "SELECT * FROM `notebook` WHERE id_notebook = $id";
            $buscar = mysqli_query($conexao, $sql);
            while ($array = mysqli_fetch_array($buscar)) {
                $id_notebook = $array['id_notebook'];
                $ativo = $array['ativo'];
                $serie = $array['serie'];
                $marca = $array['marca'];
                $modelo = $array['modelo'];
                $statuss = $array['statuss'];
                $config = $array['config'];
                $descri = $array['descri'];
                $nome = $array['nome'];
                $re = $array['re'];
                $sites = $array['sites'];
                $area = $array['area'];
                $cargo = $array['cargo'];
                $lider = $array['lider'];
                $obs = $array['obs'];
                $grupo = $array['grupo'];
                $Atualizado = $array['Atualizado'];
            ?>
                <header>Controle de Notebook</header>
                <div class="form first">
                    <div class="details personal">
                        <span class="title">Dados do Notebook</span>
                        <div class="fields">
                            <div class="input-field">
                                <label for="ativo">Ativo</label>
                                <input type="text" name="ativo" id="ativo" value="<?php echo $ativo ?>" readonly>
                                <input type="text" class="form-control" name="id" value="<?php echo $id ?>" style="display:none;">
                            </div>
                            <div class="input-field">
                                <label for="serie">N° de Serie</label>
                                <input type="text" name="serie" id="serie" value="<?php echo $serie ?>" readonly>
                            </div>
                            <div class="input-field">
                                <label for="marca">Marca</label>
                                <input type="text" name="marca" id="marca" value="<?php echo $marca ?>" readonly>
                            </div>
                            <div class="input-field">
                                <label for="modelo">Modelo</label>
                                <input type="text" name="modelo" id="modelo" value="<?php echo $modelo ?>" readonly>
                            </div>
                            <div class="input-field">
                                <label for="statuss">Status</label>
                                <input type="text" name="statuss" id="statuss" value="<?php echo $statuss ?>">
                            </div>
                            <div class=" input-field">
                                <label for="config">CH. Configuração</label>
                                <input type="text" name="config" id="config" value="<?php echo $config ?>" readonly>
                            </div>
                            <div class="input-field">
                                <label for="config">Descrição de Defeito</label>
                                <input type="text" name="descri" id="descri" value="<?php echo $descri ?>" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="details ID">
                        <span class="title">Dados Pessoais</span>
                        <div class="fields">
                            <div class="input-field">
                                <label for="nome">Nome</label>
                                <input type="text" name="nome" id="nome" value="<?php echo $nome ?>" readonly>
                            </div>
                            <div class="input-field">
                                <label for="re">RE</label>
                                <input type="text" name="re" id="re" value="<?php echo $re ?>" readonly>
                            </div>
                            <div class="input-field">
                                <label for="sites">Site</label>
                                <input type="text" name="sites" id="sites" value="<?php echo $sites ?>" readonly>
                            </div>
                            <div class="input-field">
                                <label for="area">Área</label>
                                <input type="text" name="area" id="area" value="<?php echo $area ?>" readonly>
                            </div>
                            <div class="input-field">
                                <label for="cargo">Cargo</label>
                                <input type="text" name="cargo" id="cargo" value="<?php echo $cargo ?>" readonly>
                            </div>
                            <div class="input-field">
                                <label for="lider">Lider Imediato</label>
                                <input type="text" name="lider" id="lider" value="<?php echo $lider ?>" readonly>
                            </div>
                            <div class="input-field">
                                <label for="obs">Observações</label>
                                <input type="text" name="obs" id="obs" value="<?php echo $obs ?>" readonly>
                            </div>
                            <div class="input-field">
                                <label for="obs">Grupo</label>
                                <input type="text" name="grupo" id="grupo" value="<?php echo $grupo ?>" readonly>
                            </div>
                            <div class="input-field">
                                <label for="Atualizado">Atualizado</label>
                                <input type="text" name="Atualizado" id="Atualizado" value="<?php echo $Atualizado ?>" readonly>
                            </div>

                            <div>
                                <a href="listar_notebooks.php" role="button" class="btn btn-primary btn-sm">Voltar a
                                    lista</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
</body>

</html>