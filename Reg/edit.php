<?php
$servername = "localhost";
$database = "trabalho_php";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST["id"];
        $ativo = $_POST["ativo"];
        $re = $_POST["re"];
        $ch_regularizacao = $_POST["ch_regularizacao"];
        $sites = $_POST["sites"];

        $stmt = $conn->prepare("UPDATE dados SET ativo = :ativo, re = :re, ch_regularizacao = :ch_regularizacao, sites = :sites WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':ativo', $ativo);
        $stmt->bindParam(':re', $re);
        $stmt->bindParam(':ch_regularizacao', $ch_regularizacao);
        $stmt->bindParam(':sites', $sites);

        $stmt->execute();

        header("Location: ../regularizacao");
    } else {
        $id = $_GET["id"];
        $stmt = $conn->prepare("SELECT * FROM dados WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $row = $stmt->fetch();
    }
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}
?>

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
    <title>Editar Dados</title>
</head>
<body>
    <div class="container">
        <h1>Editar Dados</h1>
        <form action="edit.php" method="post">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <div class="form-group">
                <label for="ativo">Ativo:</label>
                <input type="text" name="ativo" class="form-control" value="<?php echo $row['ativo']; ?>">
            </div>
            <div class="form-group">
                <label for="re">RE:</label>
                <input type="text" name="re" class="form-control" value="<?php echo $row['re']; ?>">
            </div>
            <div class="form-group">
                <label for="ch_regularizacao">CH.Regularizacao:</label>
                <input type="text" name="ch_regularizacao" class="form-control" value="<?php echo $row['ch_regularizacao']; ?>">
            </div>
            <div class="form-group">
    <label for="sites">Sites:</label>
    <select name="sites" id="sites" required class="form-control">
        <option value="<?php echo $row['sites']; ?>"><?php echo $row['sites']; ?></option>
        <?php
        include '../conexao.php';
        $sql2 = "SELECT * FROM `fornecedor` ORDER BY nome_fornecedor";
        $buscar2 = mysqli_query($conexao, $sql2);
        while ($array2 = mysqli_fetch_array($buscar2)) {
            $id_fornecedor = $array2['id_fornecedor'];
            $nome_fornecedor = $array2['nome_fornecedor'];
            ?>
            <option><?php echo $nome_fornecedor ?></option>
                                    <?php  } ?>
    </select>
</div>



            <button type="submit" class="btn btn-success">Salvar Alterações</button>
            <a class="btn btn-warning" href="../regularizacao" role="button">Voltar</a>
        </form>
    </div>
</body>
</html>

