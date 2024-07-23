<!DOCTYPE html>
<html>

<head>
    <title>Erro de E-mail</title>
    <link rel="shortcut icon" href="images/cropped-favicon.ico" type="image/x-icon">
    <?php
    include 'includes/erros.php';
    ?>
</head>

<body>
    <div class="error-container">
        <h1>Atenção!</h1>
        <img class="erro" src="images/spam.png" alt="">
        <p>Já existe um cadastro com o e-mail informado!
            Favor verificar com o ADM.
        </p>
        <a href="index.php">Tentar novamente</a>
    </div>
</body>