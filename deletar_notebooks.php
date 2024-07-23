<?php
include 'conexao.php';

$id = $_GET['id'];

if (isset($_POST['confirm'])) {
    // O usuário confirmou a exclusão
    $sql = "DELETE FROM `notebook` WHERE id_notebook = ?";
    $stmt = mysqli_prepare($conexao, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);

        // Verificar se a exclusão foi bem-sucedida
        if (mysqli_stmt_affected_rows($stmt) > 0) {
            // Redirecionar após a exclusão bem-sucedida
            header("Location: listar_notebooks");
            exit();
        } else {
            // Exibira mensagem de erro, se necessário
            echo "Erro ao excluir o registro.";
        }

        mysqli_stmt_close($stmt);
    } else {
        // Exibira mensagem de erro, se necessário
        echo "Erro na preparação da consulta.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/fundo.css">
    <title>Confirmação de Exclusão</title>
    <?php
    include 'includes/erros.php';
    ?>
</head>

<body>
    <div class="error-container" style="max-width: 402px;">
        <h1>Atenção!</h1>
        <img class="erro" src="img/atencao.png" alt="">
        <center>
            <div style="margin-top: 20px;">
                <p>Tem certeza que deseja excluir este registro?</p>
            </div>
            <div style="margin-top: 20px;">
                <form method="POST">
                    <button type="submit" name="confirm" class="btn btn-sm btn-danger">Sim, Excluir</button>
                    <a href="listar_notebooks" class="btn btn-sm btn-primary">Cancelar</a>
                </form>
            </div>
        </center>
    </div>
</body>

</html>