<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Atualização de Dados</title>
    <link rel="shortcut icon" href="images/cropped-favicon.ico" type="image/x-icon">
    <?php include 'includes/link.php' ?>
    <style>
        body {
            background-color: #1E1E1E;
            color: #FFFFFF;
            font-family: Arial, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 55vh;
            margin: 0;
        }

        .content {
            background-color: #2E2E2E;
            padding: 20px;
            border-radius: 10px;
            border: 2px solid #FFFFFF;
            box-shadow: 0px 0px 10px rgba(255, 255, 255, 0.2);
            max-width: 600px;
            width: 80%;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: #FFFFFF;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <div class="content">
        <h1>Atualização de Dados</h1>

        <?php
        // Conexão com o banco de dados
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "trabalho_php";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verificar conexão
        if ($conn->connect_error) {
            die("Conexão falhou: " . $conn->connect_error);
        }

        // Definir charset da conexão como utf8
        if (!$conn->set_charset("utf8")) {
            printf("Erro ao carregar charset utf8: %s\n", $conn->error);
            exit();
        }

        session_start();
        $usuario = $_SESSION['usuario'];
        if (!isset($_SESSION['usuario'])) {
            header('Location: index.php');
            exit; // Encerrar o script para evitar execução adicional
        }
        // Obter informações do usuário
        $sql1 = "SELECT `nivel_usuario`, `status`, `nome_usuario` FROM `usuarios` WHERE `mail_usuario` = '$usuario'";
        $buscar = mysqli_query($conn, $sql1);
        $array = mysqli_fetch_array($buscar);
        $nomeU = $array['nome_usuario'];

        if ($_FILES['file']['name']) {
            $filename = explode(".", $_FILES['file']['name']);
            if ($filename[1] == 'csv') {
                $handle = fopen($_FILES['file']['tmp_name'], "r");
                $success = true;
                $ativosNaoAtualizados = array();
                $firstLine = true;

                // Definir configurações de data e hora
                setlocale(LC_TIME, 'pt_BR.utf-8', 'pt_BR', 'pt_BR', 'portuguese');
                date_default_timezone_set('America/Sao_Paulo');
                $dataBrasileira = strftime('%d de %B de %Y');
                $hora = date('H:i:s');
                $dataHora = $dataBrasileira . ' ' . $hora;
                $Atualizado = $nomeU . ' ' . $dataHora;

                while ($data = fgetcsv($handle, 0, ';')) { // Use ';' como separador
                    if ($firstLine) {
                        $firstLine = false;
                        continue;
                    }

                    list(
                        $ativo, $serie, $marca, $modelo, $statuss, $config,
                        $descri, $nome, $re, $sites, $area, $cargo,
                        $lider, $obs, $grupo
                    ) = array_map('utf8_encode', $data); // Converter os dados para UTF-8

                    $query = "SELECT * FROM notebook WHERE ativo = '$ativo'";
                    $result = $conn->query($query);

                    if ($result->num_rows > 0) {
                        $updateQuery = "UPDATE `notebook` SET `serie`='$serie',`marca`='$marca',`modelo`='$modelo',`statuss`='$statuss',`config`='$config',`descri`='$descri',`nome`='$nome',`re`='$re',`sites`='$sites',`area`='$area',`cargo`='$cargo',`lider`='$lider',`obs`='$obs',`grupo`='$grupo', `Atualizado`='$Atualizado' WHERE ativo = '$ativo'";

                        $conn->query($updateQuery);
                    } else {
                        $ativosNaoAtualizados[] = $ativo;
                        $success = false;
                    }
                }
                fclose($handle);

                if ($success) {
                    echo "Dados atualizados com sucesso!";
                } else {
                    echo "Erro ao atualizar alguns ativos.<br>Ativos não atualizados: <br>" . implode(", ", $ativosNaoAtualizados);
                }
            }
        }

        $conn->close();
        ?>
        <br>
        <a class="btn btn-primary" href="atualiza.php" role="button">Voltar</a>
    </div>
</body>

</html>