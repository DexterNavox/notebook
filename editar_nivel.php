<?php
include 'conexao.php';

// Verifica se o parâmetro 'id' existe na URL e é um número inteiro
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    // Converta o valor de 'id' em um número inteiro
    $id = intval($_GET['id']);

    // Use consultas preparadas para evitar injeção de SQL
    $stmt = $conexao->prepare("SELECT * FROM `usuarios` WHERE id_usuario = ?");
    $stmt->bind_param("i", $id); // "i" indica que $id é um número inteiro
    $stmt->execute();

    // Agora você pode buscar os resultados da consulta
    $resultado = $stmt->get_result();

    // Verifica se encontrou algum registro
    if ($resultado->num_rows > 0) {
        $array = $resultado->fetch_assoc();
        $id_usuario = $array['id_usuario'];
        $nome_usuario = $array['nome_usuario'];
        $mail_usuario = $array['mail_usuario'];
        $nivel_usuario = $array['nivel_usuario'];
        $status = $array['status'];
        $categoria = $array['cat'];
    } else {
        // Redirecione o usuário para outra página
        header("Location: inativo");
        exit; // Certifique-se de sair após o redirecionamento
    }

    // Feche a declaração, mas NÃO feche a conexão com o banco de dados aqui
    $stmt->close();
} else {
    // Redirecione o usuário para outra página
    header("Location: inativo");
    exit; // Certifique-se de sair após o redirecionamento
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Notebook|GN</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style-produto2.css">
    <link rel="shortcut icon" href="images/cropped-favicon.ico" type="image/x-icon">
    <style>
        .label-white {
            color: white;
        }
    </style>
</head>

<body>
    <div class="container">
        <header class="mb-4">Controle de Usuários</header>
        <form action="_atualizar_nivel.php" method="post" id="notebook-form">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nome_usuario" class="label-white">Nome:</label>
                        <input type="text" class="form-control" placeholder="Nome" id="nome_usuario" name="nome_usuario" value="<?php echo $nome_usuario ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="mail_usuario" class="label-white">E-mail:</label>
                        <input type="email" class="form-control" placeholder="E-mail" id="mail_usuario" name="mail_usuario" value="<?php echo $mail_usuario ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="cat" class="label-white">Categoria:</label>
                        <input type="text" class="form-control" placeholder="Categoria" id="cat" name="cat" value="<?php echo $categoria ?>" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nivel_usuario" class="label-white">Nível:</label>
                        <input type="text" class="form-control" placeholder="Nível" id="nivel_usuario" name="nivel_usuario" value="<?php echo $nivel_usuario ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="status" class="label-white">Status:</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="<?php echo $status ?>" selected><?php echo $status ?></option>
                            <option value="Ativo">Ativo</option>
                            <option value="Inativo">Inativo</option>
                        </select>
                    </div>
                </div>
            </div>
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <div class="form-group">
                <button type="submit" class="btn btn-warning btn-sm">Atualizar</button>
                <a href="listar_usuario.php" role="button" class="btn btn-primary btn-sm">Voltar à lista</a>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>