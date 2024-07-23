<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #333;
            color: #fff;
        }
        .container {
            background-color: #444;
            padding: 20px;
            border-radius: 10px;
            margin-top: 55px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            color: #fff;
        }
        input[type="text"] {
            background-color: #555;
            border: 1px solid #777;
            color: #fff;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        a.btn-primary {
            text-decoration: none;
        }
    </style>
    <title>Cadastro de Dados</title>
</head>
<body>
    <?php
session_start();
$usuario = $_SESSION['usuario'];
if (!isset($_SESSION['usuario'])) {
    header('Location: index.php');
}
include 'conexao.php';


$sql = "SELECT `nivel_usuario`, `status` FROM `usuarios` WHERE `mail_usuario` = '$usuario'";
$buscar = mysqli_query($conexao, $sql);
$array = mysqli_fetch_array($buscar);

$nivel = $array['nivel_usuario'];
$status = $array['status'];
include '../date.php';
if ($status == 'Inativo') {
    header('Location: ../acesso-negado');
    exit();
}

if ($nivel == 3) {
    header('Location: ../acesso-negado');
    exit();
}
?>
    <div class="container">
        <h1>Cadastro de Dados</h1>
        <form action="process.php" method="post">
            <div class="form-group">
                <label for="ativo">Ativo:</label>
                <input type="text" name="ativo" class="form-control">
            </div>
            <div class="form-group">
                <label for="re">RE:</label>
                <input type="text" name="re" class="form-control">
            </div>
            <div class="form-group">
                <label for="ch_regularizacao">CH.Regularização:</label>
                <input type="text" name="ch_regularizacao" class="form-control">
            </div>
            <div class="form-group">
    <label for="sites">Site</label>
    <select name="sites" id="sites" class="form-control" required>
        <option value="" disabled selected>Selecione o Site</option>
        <?php
        include 'conexao.php';
        $sql2 = "SELECT * FROM `fornecedor` ORDER BY nome_fornecedor";
        $buscar2 = mysqli_query($conexao, $sql2);
        while ($array2 = mysqli_fetch_array($buscar2)) {
            $id_fornecedor = $array2['id_fornecedor'];
            $nome_fornecedor = $array2['nome_fornecedor'];
        ?>
            <option><?php echo $nome_fornecedor ?></option>
        <?php } ?>
    </select>
</div>

            <button type="submit" class="btn btn-success">Cadastrar</button>
            
            <a class="btn btn-primary" href="../regularizacao" role="button">Listar</a>
        </form>
    </div>
</body>
</html>