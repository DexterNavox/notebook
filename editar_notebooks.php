<?php
include 'conexao.php';

// Verifica se o parâmetro 'id' existe na URL e é um número inteiro
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    // Converta o valor de 'id' em um número inteiro
    $id = intval($_GET['id']);

    // Use consultas preparadas para evitar injeção de SQL
    $stmt = $conexao->prepare("SELECT * FROM `notebook` WHERE id_notebook = ?");
    $stmt->bind_param("i", $id); // "i" indica que $id é um número inteiro
    $stmt->execute();

    // Agora você pode buscar os resultados da consulta
    $resultado = $stmt->get_result();

    // Verifica se encontrou algum registro
    if ($resultado->num_rows > 0) {
        $array = $resultado->fetch_assoc();
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
    } else {
        // Redirecione o usuário para outra página
        header("Location: inativo");
        exit; // Certifique-se de sair após o redirecionamento
    }

    // Feche a declaração, mas NÃO feche a conexão com o banco de dados aqui
    $stmt->close();
} else {
    // Redirecione o usuário para outra página
    header("Location: inativo");
    exit; // Certifique-se de sair após o redirecionamento
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Notebook|GN</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style-produto1.css">
    <!-- Favicon -->
    <link rel="shortcut icon" href="images/cropped-favicon.ico" type="image/x-icon">

</head>

<body>
    <div class="container">
        <form action="_atualizar_notebooks" method="post" id="notebook-form">
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
                                <input type="text" name="ativo" id="ativo" value="<?php echo $ativo ?>" required>
                                <input type="text" class="form-control" name="id" value="<?php echo $id ?>" style="display:none;">
                            </div>
                            <div class="input-field">
                                <label for="serie">N° de Serie</label>
                                <input type="text" name="serie" id="serie" value="<?php echo $serie ?>" required>
                            </div>
                            <div class="input-field">
                                <label for="marca">Marca</label>
                                <input type="text" name="marca" id="marca" value="<?php echo $marca ?>" required>
                            </div>
                            <div class="input-field">
                                <label for="modelo">Modelo</label>
                                <input type="text" name="modelo" id="modelo" value="<?php echo $modelo ?>" required>
                            </div>
                            <div class="input-field">
                                <label for="statuss">Status</label>
                                <select name="statuss" id="statuss" required>
                                    <option><?php echo $statuss ?></option>
                                    <?php
                                    include 'conexao.php';
                                    $sql = "SELECT * FROM `categoria` order by categoria ASC";
                                    $buscar = mysqli_query($conexao, $sql);
                                    while ($array = mysqli_fetch_array($buscar)) {
                                        $id_categoria = $array['id_categoria'];
                                        $statuss = $array['categoria'];
                                    ?>
                                        <option><?php echo $statuss ?></option>
                                    <?php  } ?>
                                </select>
                            </div>
                            <div class="input-field">
                                <label for="config">CH. Configuração</label>
                                <input type="text" name="config" id="config" value="<?php echo $config ?>" required>
                            </div>
                            <div class="input-field">
                                <label for="config">Descrição de Defeito</label>
                                <input type="text" name="descri" id="descri" value="<?php echo $descri ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="details ID">
                        <span class="title">Dados Pessoais</span>
                        <div class="fields">
                            <div class="input-field">
                                <label for="nome">Nome</label>
                                <input type="text" name="nome" id="nome" value="<?php echo $nome ?>" required>
                            </div>
                            <div class="input-field">
                                <label for="re">RE</label>
                                <input type="text" name="re" id="re" value="<?php echo $re ?>" required>
                            </div>
                            <div class="input-field">
                                <label for="sites">Site</label>
                                <select name="sites" id="sites" required>
                                    <option><?php echo $sites ?></option>
                                    <?php
                                    include 'conexao.php';
                                    $sql2 = "SELECT * FROM `fornecedor` ORDER BY nome_fornecedor";
                                    $buscar2 = mysqli_query($conexao, $sql2);
                                    while ($array2 = mysqli_fetch_array($buscar2)) {
                                        $id_fornecedor = $array2['id_fornecedor'];
                                        $nome_fornecedor = $array2['nome_fornecedor'];
                                    ?>
                                        <option><?php echo $nome_fornecedor ?></option>
                                    <?php  } ?>
                                </select>
                            </div>
                            <div class="input-field">
                                <label for="area">Área</label>
                                <input type="text" name="area" id="area" value="<?php echo $area ?>" required>
                            </div>
                            <div class="input-field">
                                <label for="cargo">Cargo</label>
                                <input type="text" name="cargo" id="cargo" value="<?php echo $cargo ?>" required>
                            </div>
                            <div class="input-field">
                                <label for="lider">Lider Imediato</label>
                                <input type="text" name="lider" id="lider" value="<?php echo $lider ?>" required>
                            </div>
                            <div class="input-field">
                                <label for="obs">Observações</label>
                                <input type="text" name="obs" id="obs" value="<?php echo $obs ?>" required>
                            </div>
                            <div class="input-field">
                                <label for="grupo">Grupo</label>
                                <select name="grupo" id="grupo" required="required">
                                    <option><?php echo $grupo ?></option>
                                    <option value="Atento">Atento</option>
                                    <option value="Presencial">Presencial</option>
                                </select>
                            </div>
                            <div class="input-field">
                                <label for="Atualizado">Atualizado</label>
                                <input type="text" name="Atualizado" id="Atualizado" placeholder="Atualizado" value="<?php echo $Atualizado ?>" readonly>
                            </div>
                            <div>
                                <a href="listar_notebooks" role="button" class="btn btn-primary btn-sm">Voltar a
                                    lista</a>
                                <button type="submit" id="botao" class="btn btn-warning btn-sm">Atualizar</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </form>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var statusSelect = document.getElementById("statuss");
                var storedData = null;

                statusSelect.addEventListener("change", function() {
                    var selectedOption = statusSelect.options[statusSelect.selectedIndex].text;
                    var obsField = document.getElementById("obs");

                    if (selectedOption === "Sala") {
                        if (!storedData) {
                            storedData = {
                                descri: document.getElementById("descri").value,
                                nome: document.getElementById("nome").value,
                                re: document.getElementById("re").value,
                                area: document.getElementById("area").value,
                                cargo: document.getElementById("cargo").value,
                                lider: document.getElementById("lider").value,
                                obs: document.getElementById("obs").value,
                                grupo: document.getElementById("grupo").value,
                            };
                        }

                        document.getElementById("descri").value = "N/A";
                        document.getElementById("nome").value = "0";
                        document.getElementById("re").value = "0";
                        document.getElementById("area").value = "0";
                        document.getElementById("cargo").value = "0";
                        document.getElementById("lider").value = "0";
                        obsField.value = "SALA";
                        document.getElementById("grupo").value = "Atento";
                    } else if (selectedOption === "Devolvido no site") {
                        if (!storedData) {
                            storedData = {
                                descri: document.getElementById("descri").value,
                                nome: document.getElementById("nome").value,
                                re: document.getElementById("re").value,
                                area: document.getElementById("area").value,
                                cargo: document.getElementById("cargo").value,
                                lider: document.getElementById("lider").value,
                                obs: document.getElementById("obs").value,
                                grupo: document.getElementById("grupo").value,
                            };
                        }

                        document.getElementById("descri").value = "N/A";
                        document.getElementById("nome").value = "0";
                        document.getElementById("re").value = "0";
                        document.getElementById("area").value = "0";
                        document.getElementById("cargo").value = "0";
                        document.getElementById("lider").value = "0";
                        obsField.value = "CHAMADO";
                        document.getElementById("grupo").value = "Atento";
                    } else if (storedData) {
                        document.getElementById("descri").value = storedData.descri;
                        document.getElementById("nome").value = storedData.nome;
                        document.getElementById("re").value = storedData.re;
                        document.getElementById("area").value = storedData.area;
                        document.getElementById("cargo").value = storedData.cargo;
                        document.getElementById("lider").value = storedData.lider;
                        obsField.value = storedData.obs;
                        document.getElementById("grupo").value = storedData.grupo;
                    }
                });
            });
        </script>

    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
</body>

</html>