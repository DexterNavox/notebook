<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GN | Acionar Site</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,300;0,400;0,600;0,700;0,800;0,900;1,300;1,400&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300;1,400&display=swap"
        rel="stylesheet">
    <link rel="shortcut icon" href="images/cropped-favicon.ico" type="image/x-icon">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" rel="stylesheet"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="bootstrap-icons.css">

    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">

    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/estilo_adicionar_site.css">
    <link rel="stylesheet" href="fonts/css/all.min.css">

    <title>GN | Acionar Sites</title>

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
        header('Location: inativo.php');
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
        <?php
        include 'includes/header.php';
        ?>
        <div class="text"></div>
        <div class="container" style=" width:659px;">
            <center>
                <h3>Cadastro de Sites</h3>
            </center>
            <form action="_inserir_sites.php" method="post" style="margin-top: 20px">
                <div class="form-group">
                    <label>Nome do site</label>
                    <input type="text" class="form-control" name="fornecedor" placeholder="Insira o nome do site"
                        autocomplete="off">
                </div>
                <br>
                <div style="text-align: right;">
                    <a href="menu.php" role="button" class="btn btn-primary btn-sm">Voltar ao menu</a>
                    <button type="submit" id="botao" class="btn btn-success btn-sm">Adicionar</button>
                </div>
            </form>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
        </script>
    </section>
    <script src="script.js"></script>
</body>

</html>