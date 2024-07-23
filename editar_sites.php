<?php
include 'conexao.php';

// Verifica se o parâmetro 'id' existe na URL e é um número inteiro
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    // Converta o valor de 'id' em um número inteiro
    $id = intval($_GET['id']);

    // Use consultas preparadas para evitar injeção de SQL
    $stmt = $conexao->prepare("SELECT * FROM `fornecedor` WHERE id_fornecedor = ?");
    $stmt->bind_param("i", $id); // "i" indica que $id é um número inteiro
    $stmt->execute();

    // Agora você pode buscar os resultados da consulta
    $resultado = $stmt->get_result();

    // Verifica se encontrou algum registro
    if ($resultado->num_rows > 0) {
        $array = $resultado->fetch_assoc();
        $id_notebook = $array['id_fornecedor'];
        $fornecedor = $array['nome_fornecedor'];
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

// Agora você pode continuar com o restante do seu código
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Sites|GN</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilo_editar_sites.css">
    <!-- Favicon -->
    <link rel="shortcut icon" href="images/cropped-favicon.ico" type="image/x-icon">
</head>

<body>

    <div class="container" style="margin-top: 40px" id="container">
        <h3>Edição de Site</h3>
        <form action="_atualizar_sites" method="post" style="margin-top: 20px">
            <?php
            $sql = "SELECT * FROM `fornecedor` WHERE id_fornecedor = $id";
            $buscar = mysqli_query($conexao, $sql);
            while ($array = mysqli_fetch_array($buscar)) {
                $id_fornecedor = $array['id_fornecedor'];
                $fornecedor = $array['nome_fornecedor'];
            ?>
                <div class="form-group">
                    <label>Nome do Site</label>
                    <input type="text" class="form-control" name="fornecedor" value="<?php echo $fornecedor ?>">
                    <input type="text" class="form-control" name="id" value="<?php echo $id_fornecedor ?>" style="display:none;">
                </div>
                <div style="text-align: right;">
                    <a href="listar_sites" role="button" class="btn btn-primary btn-sm">Voltar a lista</a>
                    <button type="submit" id="botao" class="btn btn-warning btn-sm">Atualizar</button>
                </div>
            <?php } ?>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>

</body>

</html>