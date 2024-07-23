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

        $stmt = $conn->prepare("DELETE FROM dados WHERE id = :id");
        $stmt->bindParam(':id', $id);
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
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            color: #fff;
        }
        .btn-danger {
            background-color: #dc3545;
            border: none;
        }
        .btn-danger:hover {
            background-color: #b8232e;
        }
    </style>
    <title>Excluir Dados</title>
</head>
<body>
    <div class="container">
        <h1>Excluir Dados</h1>
        <form action="delete.php" method="post">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <p>Tem certeza de que deseja excluir este registro?</p>
            <button type="submit" class="btn btn-danger">Excluir</button>
        </form>
    </div>
</body>
</html>
