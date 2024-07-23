<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GN | Acionar Notebook</title>

    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,300;0,400;0,600;0,700;0,800;0,900;1,300;1,400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300;1,400&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="images/cropped-favicon.ico" type="image/x-icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" rel="stylesheet" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="bootstrap-icons.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/estilo_adicionar_notebook.css">
    <link rel="stylesheet" href="fonts/css/all.min.css">

<body>
    <?php
    session_start();
    $usuario = $_SESSION['usuario'];
    if (!isset($_SESSION['usuario'])) {
        header('Location: index.php');
        exit();
    }
    include 'conexao.php';

    $sql = "SELECT `nivel_usuario`, `status`,`nome_usuario` FROM `usuarios` WHERE `mail_usuario` = '$usuario'";
    $buscar = mysqli_query($conexao, $sql);
    $array = mysqli_fetch_array($buscar);

    $nivel = $array['nivel_usuario'];
    $status = $array['status'];
    $nomeU = $array['nome_usuario'];

    // Defina o local para o Brasil (português brasileiro)
    setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');

    // Defina o fuso horário para Brasília
    date_default_timezone_set('America/Sao_Paulo');

    // Obtém a data atual no formato brasileiro
    $dataBrasileira = strftime('%d de %B de %Y'); // Exemplo: "26 de setembro de 2023"

    // Obtém a hora atual no formato de 24 horas no fuso horário de Brasília
    $hora = date('H:i:s'); // Exemplo: "14:30:45"

    // Concatena a data e a hora em uma única variável
    $dataHora = $dataBrasileira . ' ' . $hora;
    include 'date.php';
    if ($status == 'Inativo') {
        header('Location: inativo.php');
        exit();
    }

    if ($nivel == 3) {
        header('Location: acesso-negado.php');
        exit();
    }
    include 'includes/menu_lateral.php';
    ?>

    <section class="home-section">
        <?php
        include 'includes/header.php';
        ?>
        <div class="text"></div>
        <div class="container2">
            <br>
            <header>Controle de Notebook</header>
            <form action="_inserir_notebooks.php" method="post" id="notebook-form">
                <div class="form first">
                    <div class="details personal">
                        <span class="title">Dados do Notebook</span>
                        <div class="fields">
                            <div class="input-field">
                                <label for="ativo">Ativo</label>
                                <input type="text" name="ativo" id="ativo" placeholder="Digite o Ativo" required>
                            </div>
                            <div class="input-field">
                                <label for="serie">N° de Serie</label>
                                <input type="text" name="serie" id="serie" placeholder="Digite o N° de Serie" required>
                            </div>
                            <div class="input-field">
                                <label for="marca">Marca</label>
                                <input type="text" name="marca" id="marca" placeholder="Digite a Marca" required>
                            </div>
                            <div class="input-field">
                                <label for="modelo">Modelo</label>
                                <input type="text" name="modelo" id="modelo" placeholder="Digite o Modelo" required>
                            </div>
                            <div class="input-field">
                                <label for="statuss">Status</label>
                                <select name="statuss" id="statuss" required>
                                    <option disabled selected>Selecione o Status</option>
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
                                <input type="text" name="config" id="config" placeholder="Digite o Chamado" required>
                            </div>
                            <div class="input-field">
                                <label for="config">Descrição de Defeito</label>
                                <input type="text" name="descri" id="descri" placeholder="Digite o Defeito" required>
                            </div>
                        </div>
                    </div>
                    <div class="details ID">
                        <span class="title">Dados Pessoais</span>
                        <div class="fields">
                            <div class="input-field">
                                <label for="nome">Nome</label>
                                <input type="text" name="nome" id="nome" placeholder="Digite o Nome" required>
                            </div>
                            <div class="input-field">
                                <label for="re">RE</label>
                                <input type="text" name="re" id="re" placeholder="Digite o RE" required>
                            </div>
                            <div class="input-field">
                                <label for="sites">Site</label>
                                <select name="sites" id="sites" required>
                                    <option value="" disabled selected>Selecione o Site</option> <!-- Opção padrão desabilitada -->
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
                                <input type="text" name="area" id="area" placeholder="Digite a Área" required>
                            </div>
                            <div class="input-field">
                                <label for="cargo">Cargo</label>
                                <input type="text" name="cargo" id="cargo" placeholder="Digite o Cargo" required>
                            </div>
                            <div class="input-field">
                                <label for="lider">Lider Imediato</label>
                                <input type="text" name="lider" id="lider" placeholder="Digite o Lider Imediato" required>
                            </div>
                            <div class="input-field">
                                <label for="obs">Observações</label>
                                <input type="text" name="obs" id="obs" placeholder="Observações" required>
                            </div>
                            <div class="input-field">
                                <label for="grupo">Grupo</label>
                                <select name="grupo" id="grupo" required="required">
                                    <option value="">Selecione o Grupo</option>
                                    <option value="Atento">Atento</option>
                                    <option value="Presencial">Presencial</option>
                                </select>
                            </div>
                            <div class="input-field">
                                <label for="Atualizado">Atualizado</label>
                                <input type="text" name="Atualizado" id="Atualizado" placeholder="Atualizado" value="<?php echo $nomeU . ' ' . $dataHora; ?>" readonly>
                            </div>
                            <div>
                                <button type="submit" id="botao" class="btn btn-success btn-sm">Cadastrar</button>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
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
    </section>

    <script src="script.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>