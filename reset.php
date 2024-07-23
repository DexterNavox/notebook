<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="images/cropped-favicon.ico" type="image/x-icon">
    <title>Alterar senha</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/reset.css">
</head>

<body>
    <div style="position: fixed; top: 6px; right: 20px;">
        <a class="btn btn-custom" href="menu.php" role="button">Voltar</a>
    </div>
    <div class="container my-5">
        <?php
        // Conexão com o banco de dados
        include 'conexao.php';
        // Inicializa a sessão
        session_start();
        $usuario = $_SESSION['usuario'];
        // Verifica se o formulário foi submetido
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Obtém os dados do formulário
            $senha_atual = md5($_POST["senha_atual"]);
            $senha_nova = md5($_POST["senha_nova"]);
            $usuario = $_SESSION["usuario"];
            // Verifica se a senha atual está correta
            $sql = "SELECT * FROM usuarios WHERE mail_usuario = '$usuario' AND senha_usuario = '$senha_atual'";
            $resultado = mysqli_query($conexao, $sql);
            if (mysqli_num_rows($resultado) == 1) {
                // Atualiza a senha do usuário no banco de dados
                $sql = "UPDATE usuarios SET senha_usuario = '$senha_nova' WHERE mail_usuario = '$usuario'";
                mysqli_query($conexao, $sql);
                // Exibe uma mensagem de sucesso ao usuário
                echo '<div class="alert alert-success" role="alert">Senha alterada com sucesso.</div>';
            } else {
                // Exibe uma mensagem de erro ao usuário
                echo '<div class="alert alert-danger" role="alert">Senha atual incorreta.</div>';
            }
        }
        // Obtém o e-mail do usuário logado
        if (isset($_SESSION["usuario"])) {
            $usuario = $_SESSION["usuario"];
            $sql = "SELECT mail_usuario FROM usuarios WHERE mail_usuario = '$usuario'";
            $resultado = mysqli_query($conexao, $sql);
            $dados = mysqli_fetch_assoc($resultado);
            if (isset($dados["mail_usuario"])) {
                $email_usuario = $dados["mail_usuario"];
                // Exibe o formulário HTML para a alteração de senha
        ?>
                <form method="POST" action="">
                    <h1>Alterar senha</h1>
                    <img class="erro" src="images/redefinir-senha.png" alt="">
                    <div class="form-group">
                        <label for="email_usuario" class="form-label">E-mail:</label>
                        <input type="email" name="email_usuario" value="<?php echo $email_usuario; ?>" readonly class="form-control"><br>
                        <label for="senha_atual" class="form-label">Senha atual:</label>
                        <input type="password" name="senha_atual" required class="form-control"><br>
                        <label for="senha_nova" class="form-label">Nova senha:</label>
                        <input type="password" name="senha_nova" required class="form-control"><br>
                        <button type="submit" class="btn btn-primary">Alterar senha</button>
                </form>
        <?php
            } else {
                echo "E-mail não encontrado.";
            }
        } else {
            echo "Você precisa estar logado para acessar esta página.";
        }
