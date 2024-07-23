<?php
$servername = "localhost";
$database = "trabalho_php";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $ativo = $_POST["ativo"];
        $re = $_POST["re"];
        $ch_regularizacao = $_POST["ch_regularizacao"];
        $sites = $_POST["sites"];

        $stmt = $conn->prepare("INSERT INTO dados (ativo, re, ch_regularizacao, sites) VALUES (:ativo, :re, :ch_regularizacao, :sites)");
        $stmt->bindParam(':ativo', $ativo);
        $stmt->bindParam(':re', $re);
        $stmt->bindParam(':ch_regularizacao', $ch_regularizacao);
        $stmt->bindParam(':sites', $sites);

        $stmt->execute();

        header("Location: ../regularizacao");
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
    <title>Cadastro de Dados</title>
</head>
<body>
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
                <label for="ch_regularizacao">CH.Regularizacao:</label>
                <input type="text" name="ch_regularizacao" class="form-control">
            </div>
            <div class="form-group">
                <label for="sites">Sites:</label>
                <input type="text" name="sites" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>
</body>
</html>
