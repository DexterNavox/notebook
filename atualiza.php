<!DOCTYPE HTML>
<html lang="pt-br">

<head>
    <title>Atualizador em Lote</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilo_adicionar_site.css">
    <link rel="shortcut icon" href="images/cropped-favicon.ico" type="image/x-icon">
    <?php include 'includes/link.php'; ?>
    <style>
        .h1,
        h1 {
            font-size: 2.5rem;
            color: #fff;
        }

        .p,
        p {
            color: #fff;
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
        header('Location: acesso-negado.php');
        exit();
    }

    if ($nivel == 3) {
        header('Location: acesso-negado.php');
        exit();
    }
    ?>
    <?php
    include 'includes/menu_lateral.php';

    ?>

    <section class="home-section">
        <?php include 'includes/header.php'; ?>
        <div class="text"></div>
        <div class="container" style="width: 659px;">
            <h1>Atualizador em Lote</h1>
            <p>Download da Planilha Base
                <a href="files/base.csv" class="btn btn-success" download>Download</a>

                <br>
            <form action="server.php" method="POST" enctype="multipart/form-data">
                <p><input type="file" name="file"></p>
                <button type="submit" class="btn btn-primary">Atualizar</button>
            </form>
        </div>


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