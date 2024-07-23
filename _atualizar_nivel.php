<?php

include 'conexao.php';
$id = $_POST['id'];
$nome_usuario = $_POST['nome_usuario'];
$mail_usuario = $_POST['mail_usuario'];
$nivel_usuario = $_POST['nivel_usuario'];
$status = $_POST['status'];
$categoria = $_POST['cat'];

$sql = "UPDATE `usuarios` SET `nome_usuario`='$nome_usuario',`mail_usuario`='$mail_usuario',`nivel_usuario`='$nivel_usuario',`status`='$status',`cat`='$categoria'
WHERE id_usuario = $id";

$atualiza = mysqli_query($conexao, $sql);

?>

<!DOCTYPE html>
<html>

<head>
    <title>Atualização de nivel</title>
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
            <a href="listar_usuario.php" class="btn btn-sm btn-primary">Ir para lista de usuario</a>
        </center>
    </div>
</body>

</html>