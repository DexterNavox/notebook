<?php

include 'conexao.php';

$id = $_GET['id'];

$sql = "DELETE FROM `categoria` WHERE id_categoria = $id";

$deletar = mysqli_query($conexao, $sql);
?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="css/estilo_deletar.css">
<link rel="shortcut icon" href="images/cropped-favicon.ico" type="image/x-icon">
<center>
    <div class="error-container" style="margin-top: 30px;">
        <img class="erro" src="img/botao-de-deletar.png" alt="">
        <h3>Status excluída com sucesso</h3>
        <a href="listar_status.php" class="btn btn-sm btn-primary">Ir para lista de status</a>
    </div>
</center>