<?php

include 'conexao.php';

$id = $_GET['id'];
$nivel = $_GET['nivel'];
if ($nivel == 1) {
    $update = "UPDATE `usuarios` SET `status` = 'Ativo', `nivel_usuario`= 1 WHERE `id_usuario` = $id"; // Atualiza o nível do usuário para 1 no banco de dados
    $atualiza = mysqli_query($conexao, $update); // Executa a consulta de atualização no banco de dados
}

if ($nivel == 2) {
    $update = "UPDATE `usuarios` SET `status` = 'Ativo', `nivel_usuario`= 2 WHERE `id_usuario` = $id"; // Atualiza o nível do usuário para 2 no banco de dados
    $atualiza = mysqli_query($conexao, $update); // Executa a consulta de atualização no banco de dados
}

if ($nivel == 3) {
    $update = "UPDATE `usuarios` SET `status` = 'Ativo', `nivel_usuario`= 3 WHERE `id_usuario` = $id"; // Atualiza o nível do usuário para 3 no banco de dados
    $atualiza = mysqli_query($conexao, $update); // Executa a consulta de atualização no banco de dados
}
?>


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<style>
    body {
        background-color: #1b1f27;
        color: white;
    }
</style>

<div class="container" style="width: 500px; margin-top: 30px;">
    <center>
        <h4><?php
            if ($nivel == 1) {
                echo "Administrador"; // Exibe o texto "Administrador" se o nível for igual a 1
            }
            if ($nivel == 2) {
                echo "Gestão Notebook"; // Exibe o texto "Gestão Notebook" se o nível for igual a 2
            }
            if ($nivel == 3) {
                echo "Visitante"; // Exibe o texto "Visitante" se o nível for igual a 3
            }
            ?> aprovado com sucesso!</h4>
    </center>
    <div style="padding-top: 20px;">
        <center>
            <a href="aprovar_usuario" role="button" class="btn btn-primary btn-sm">Voltar para a lista</a>
        </center>
    </div>

</div>