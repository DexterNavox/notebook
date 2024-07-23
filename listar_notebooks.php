<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="images/cropped-favicon.ico" type="image/x-icon">
    <title>GN | Lista de Notebooks</title>


    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,300;0,400;0,600;0,700;0,800;0,900;1,300;1,400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300;1,400&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" rel="stylesheet" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="bootstrap-icons.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">

    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/estilo_listar_notebooks.css">
    <link rel="stylesheet" href="fonts/css/all.min.css">
    <style>
        body {
            background-color: #000000d5;
        }

        .h4,
        h4 {
            color: #fff;
        }

        .table thead th {
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

    $status = $array['status'];
    include 'date.php';

    if ($status == 'Inativo') {
        header('Location: acesso-negado.php');
        exit();
    }
    ?>
    <?php include 'includes/menu_lateral.php'; ?>

    <section class="home-section">
        <?php include 'includes/header.php'; ?>
        <div class="container">
            <div class="row mt-4">
                <div class="col-sm-6 col-md-6 offset-sm-3 offset-md-3 text-center">
                    <div>
                        <h4>Lista de Notebooks</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex">
            <?php if (($nivel == 1) || ($nivel == 2)) { ?>
                <div class="col me-auto">
                    <a class="btn btn-success" href="exportar.php" role="button" style="margin-left: 290px;">Exportar Todos</a>
                </div>
            <?php } ?>

            <div class="col-4 ms-auto">
                <form action="exportar.php" method="get" id="form-pesquisa">
                    <div class="input-group">
                        <label for="pesquisa" class="input-group-text">Pesquisar:</label>
                        <input type="text" name="pesquisa" id="pesquisa" class="form-control">
                        <?php if (($nivel == 1) || ($nivel == 2)) { ?>
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary">Exportar Pesquisa</button>
                            </div>
                        <?php } ?>
                    </div>
                </form>
            </div>
        </div>
        <br>
        <div class="row justify-content-center text-center">
            <div class="col-lg-12">
                <span class="listar-notebooks"></span>
            </div>
        </div>

        <script src="js/custom.js"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    </section>
    <script src="script.js"></script>
</body>

</html>