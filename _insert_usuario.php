<?php

include 'conexao.php';
include 'script/password.php';

$mail = $_POST['mail'];
$select = "SELECT * FROM usuarios WHERE mail_usuario = '$mail'";
$result = mysqli_query($conexao, $select);

if (mysqli_num_rows($result) > 0) {

    header("Location: erro_mail.php");
    exit;
}
$nomeusuario = $_POST['nome'];
$mail = $_POST['mail'];
$senha = $_POST['senha'];
$nivel = $_POST['nivel'];
$cat = $_POST['cat'];
$status = 'Ativo';
$sql = "INSERT INTO `usuarios`(`nome_usuario`, `mail_usuario`, `senha_usuario`, `nivel_usuario`,`cat`, `status`) VALUES ('$nomeusuario','$mail',md5('$senha'),$nivel,$cat,'$status')";
$inserir = mysqli_query($conexao, $sql);

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Usuário cadastrado com sucesso</title>

    <link rel="shortcut icon" href="images/cropped-favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
        /* Estilo para tema dark */
        body {
            background-color: #000000;
            color: #ffffff;
        }
    </style>
</head>

<body>
    <div class="container" style="width: 500px; margin-top: 30px;">
        <center>
            <h4>Usuário cadastrado com sucesso!</h4>
        </center>
        <div style="padding-top: 20px;">
            <center>
                <a href="cadastro_usuario.php" role="button" class="btn btn-primary btn-sm">Cadastrar novo usuário</a>
                <a href="menu.php" role="button" class="btn btn-success btn-sm">Voltar ao início</a>
            </center>
        </div>
    </div>
</body>

</html>