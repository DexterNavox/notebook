<?php

include 'conexao.php';

$catproduto = $_POST['catproduto'];

$sql = "INSERT INTO `categoria`(`categoria`) VALUES ('$catproduto')";
$inserir = mysqli_query($conexao, $sql);

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
            <h3>Status adicionado com sucesso!</h3>
            <a href="menu.php" class="btn btn-sm btn-primary">Voltar ao menu</a>
        </center>
    </div>
</body>

</html>