<?php
include 'conexao.php';
session_start();
$usuario = $_SESSION['usuario'];
if (!isset($_SESSION['usuario'])) {
    header('Location: index.php');
    exit;
}


$sql1 = "SELECT `nivel_usuario`, `status`, `nome_usuario` FROM `usuarios` WHERE `mail_usuario` = '$usuario'";
$buscar = mysqli_query($conexao, $sql1);
$array = mysqli_fetch_array($buscar);
$nomeU = $array['nome_usuario'];

// Definir configurações de data e hora
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
$dataBrasileira = strftime('%d de %B de %Y');
$hora = date('H:i:s');
$dataHora = $dataBrasileira . ' ' . $hora;
$Atualizado = $nomeU . '  ' . $dataHora;

$id = $_POST['id'];
$ativo = $_POST['ativo'];
$serie = $_POST['serie'];
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$statuss = $_POST['statuss'];
$config = $_POST['config'];
$descri = $_POST['descri'];
$nome = $_POST['nome'];
$re = $_POST['re'];
$sites = $_POST['sites'];
$area = $_POST['area'];
$cargo = $_POST['cargo'];
$lider = $_POST['lider'];
$obs = $_POST['obs'];
$grupo = $_POST['grupo'];

$sql = "UPDATE `notebook` SET `ativo`='$ativo', `serie`='$serie', `marca`='$marca', `modelo`='$modelo', `statuss`='$statuss', `config`='$config', `descri`='$descri', `nome`='$nome', `re`='$re', `sites`='$sites', `area`='$area', `cargo`='$cargo', `lider`='$lider', `obs`='$obs', `grupo`='$grupo', `Atualizado`='$Atualizado' WHERE id_notebook = $id";

$atualiza = mysqli_query($conexao, $sql);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Atualização de Notebook</title>

    <link rel="shortcut icon" href="images/cropped-favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/fundo.css">
    <style>
        body {
            background-color: #111;
            color: #fff;
            font-family: Arial, sans-serif;
        }

        .container {
            width: 400px;
        }

        h3 {
            margin-top: 30px;
        }

        .btn {
            margin-top: 10px;
        }

        .error-container {
            max-width: 400px;
            margin: 100px auto;
            padding: 20px;
            background-color: #333;
            border-radius: 4px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            text-align: center;
        }

        .erro {
            width: 100px;
            height: 100px;
        }
    </style>
</head>

<body>
    <div class="error-container">
        <center>
            <img class="erro" src="images/atualizada.png" alt="">
            <h3>Atualizado com sucesso!</h3>
            <a href="listar_notebooks" class="btn btn-sm btn-primary">Ir para lista de notebooks</a>
        </center>
    </div>
</body>

</html>