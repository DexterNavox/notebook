<?php
include 'conexao.php';
$ativo = $_POST['ativo'];
$sql = "SELECT * FROM notebook WHERE ativo = '$ativo'";
$resultado = mysqli_query($conexao, $sql);
if (mysqli_num_rows($resultado) > 0) {

    header('Location: erro_ativo.php');

    exit;
}
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
$Atualizado = $_POST['Atualizado'];
$sql = "INSERT INTO notebook(ativo,serie,marca,modelo,statuss,config,descri,nome,re,sites,area,cargo,lider,obs,grupo,Atualizado) VALUES('$ativo','$serie','$marca','$modelo','$statuss','$config','$descri','$nome','$re','$sites','$area','$cargo','$lider','$obs','$grupo','$Atualizado')";
$inserir = mysqli_query($conexao, $sql);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Notebook adicionado</title>
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
            <img class="erro" src="images/note.png" alt="">
            <h3>Notebook adicionado com sucesso!!</h3>
            <a href="listar_notebooks.php" class="btn btn-sm btn-primary">Ir para lista de notebooks</a>
        </center>
    </div>
</body>

</html>