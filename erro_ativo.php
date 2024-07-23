<!DOCTYPE html>
<html>

<head>
    <title>Erro de Ativo</title>
    <link rel="shortcut icon" href="images/cropped-favicon.ico" type="image/x-icon">
    <?php
    include 'includes/erros.php';
    ?>
</head>

<body>
    <div class="error-container">
        <h1>Atenção!</h1>
        <img class="erro" src="images/atencao.png" alt="">
        <p>Já existe um registro com o número de ativo informado!</p>
        <a href="adicionar_notebooks">Tentar novamente</a>
    </div>
</body>

</html>