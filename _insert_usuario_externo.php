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
$status = 'Inativo';
$sql = "INSERT INTO `usuarios`(`nome_usuario`, `mail_usuario`, `senha_usuario`, `status`) VALUES ('$nomeusuario','$mail',md5('$senha'),'$status')";

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
        body {
            background-color: #000;
            color: #fff;
            font-family: Arial, sans-serif;
        }

        .error-container {
            max-width: 400px;
            margin: 100px auto;
            padding: 20px;
            background-color: #0a0a0a;
            border-radius: 4px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            text-align: center;
        }

        h1 {
            font-size: 36px;
            color: #fff;
            margin-bottom: 20px;
        }

        p {
            font-size: 18px;
            color: #ccc;
            margin-bottom: 30px;
        }

        a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #428bca;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #3071a9;
        }

        .erro {
            width: 100px;
            height: 100px;
        }
    </style>
</head>

<body>
    <div class="error-container">
        <h1>Usuário cadastrado com sucesso!</h1>
        <img class="erro" src="images/clipboard.png" alt="">
        <p>Favor entrar em contato com o ADM para aprovação!...</p>
        <a href="index.php">Voltar ao início</a>
    </div>
</body>

</html>