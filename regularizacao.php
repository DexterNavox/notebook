<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-KyZXEAg3QhqLMpG8r+V5PVxlM5IV9t3z5z1+z1Ztzbw=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
    <script src="script.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,300;0,400;0,600;0,700;0,800;0,900;1,300;1,400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300;1,400&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="images/cropped-favicon.ico" type="image/x-icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" rel="stylesheet" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="fonts/css/all.min.css">

    <title>Editar Dados</title>
    <style>
        .button-container {
            display: flex;
            /* Torna os elementos filhos flexíveis */
            gap: 10px;
            /* Define um espaço entre os botões */
        }

        .h1,
        h1 {
            color: #fff;
        }

        .table-container {
            max-height: 300px;
            /* Defina a altura máxima desejada para a tabela */
            /* overflow: auto; Adicione uma barra de rolagem quando necessário */
            background-color: #fff;
        }
    </style>
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
    include 'date.php';
    if ($status == 'Inativo') {
        header('Location: acesso-negado');
        exit();
    }

    if ($nivel == 3) {
        header('Location: acesso-negado');
        exit();
    }
    ?>
    <?php
    include 'includes/menu_lateral.php';

    ?>
    <section class="home-section">
        <?php
        include 'includes/header.php';
        try {
            $conexao = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
            $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $conexao->query("SELECT * FROM dados");

            echo "<div class='container'>";
            echo "<h1>Regularização de Ativos</h1>";
            echo "<br>";
            echo "<div class='table-container' style='max-height: 300px; overflow: auto;'>";
            echo "<table class='table'>";
            echo "<tr><th>ID</th><th>Ativo</th><th>RE</th><th>CH.Regularizacao</th><th>Sites</th><th>Ações</th></tr>";

            while ($row = $stmt->fetch()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['ativo'] . "</td>";
                echo "<td>" . $row['re'] . "</td>";
                echo "<td>" . $row['ch_regularizacao'] . "</td>";
                echo "<td>" . $row['sites'] . "</td>";
                echo "<td><a href='Reg/edit.php?id=" . $row['id'] . "' class='btn btn-primary'>Editar</a> ";
                echo "<a href='Reg/delete.php?id=" . $row['id'] . "' class='btn btn-danger'>Excluir</a></td>";
                echo "</tr>";
            }

            echo "</table>";
            echo "</div>"; // Feche a div com a classe 'table-container'
            echo "<br>";
            echo "<div class='button-container' style='display: flex; justify-content: center;'>"; // Centralize os botões horizontalmente
            echo " <a class='btn btn-primary' href='Reg/cadastro' role='button'>Cadastrar</a>";
            echo "<form method='post' action='Reg/export.php'>"; // Substitua 'export.php' pelo nome do seu arquivo de exportação
            echo "<button type='submit' name='exportExcel' class='btn btn-success'>Exportar para CSV</button>";
            echo "</form>";
            echo "<button type='button' class='btn btn-warning' onclick='copyTableToClipboard()'>Copiar Tudo</button>";

            echo "</div>";
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
        ?>
    </section>

    <script>
        function copyTableToClipboard() {
            var table = document.querySelector(".table-container table"); // Seleciona a tabela
            var rows = table.rows;

            // Excluir a última coluna (coluna de Ações)
            for (var i = 0; i < rows.length; i++) {
                var cell = rows[i].cells[rows[i].cells.length - 1];
                cell.style.display = "none";
            }

            var range = document.createRange();
            range.selectNode(table);
            window.getSelection().removeAllRanges();
            window.getSelection().addRange(range);
            document.execCommand('copy');

            // Restaurar a última coluna (coluna de Ações)
            for (var i = 0; i < rows.length; i++) {
                var cell = rows[i].cells[rows[i].cells.length - 1];
                cell.style.display = "table-cell";
            }

            window.getSelection().removeAllRanges();
            alert("Dados da tabela (excluindo a coluna 'Ações') copiados para a área de transferência!");
        }
    </script>

    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-KyZXEAg3QhqLMpG8r+V5PVxlM5IV9t3z5z1+z1Ztzbw=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    </section>
    <script src="script.js"></script>
</body>

</html>