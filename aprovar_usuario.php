<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GN | Aprovar usuarios</title>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,300;0,400;0,600;0,700;0,800;0,900;1,300;1,400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300;1,400&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="images/cropped-favicon.ico" type="image/x-icon">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" rel="stylesheet" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer">

    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/estilo_aprova.css">
    <link rel="stylesheet" href="fonts/css/all.min.css">
    <style>
        body {
            background-color: #1b1f27;
        }

        .dataTables_wrapper .dataTables_length,
        .dataTables_wrapper .dataTables_filter,
        .dataTables_wrapper .dataTables_info,
        .dataTables_wrapper .dataTables_processing,
        .dataTables_wrapper .dataTables_paginate {
            color: white;
        }

        table.dataTable thead th,
        table.dataTable thead td {
            padding: 10px 18px;
            border-bottom: 1px solid white;
            color: white;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.disabled,
        .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:hover,
        .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:active {
            cursor: default;
            color: #fff !important;
            border: 1px solid transparent;
            background: transparent;
            box-shadow: none;
        }

        .h3,
        h3 {
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

    if (($nivel == 3) || ($nivel == 2)) {
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
        <div class="container">
            <center>
                <h3>Aprovar usuários</h3>
            </center>
            <br>
            <br>
            <center>
                <table id="table_id" class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope=" col">Nome</th>
                            <th scope=" col">E-mail</th>
                            <th scope="col">
                                <center>Aprovar como</center>
                            </th>
                        </tr>
                    </thead>
                    <?php
                    include 'conexao.php';
                    $sql = "SELECT * FROM `usuarios` WHERE status = 'Inativo'";
                    $busca = mysqli_query($conexao, $sql);
                    while ($array = mysqli_fetch_array($busca)) {
                        $id_usuario = $array['id_usuario'];
                        $nome = $array['nome_usuario'];
                        $mail = $array['mail_usuario'];
                        $nome = $array['nome_usuario'];
                    ?>
                        <tr>
                            <td> <?php echo $nome ?> </td>
                            <td> <?php echo $mail ?> </td>
                            <td>
                                <center>
                                    <a href="_aprovar_usuario.php?id=<?php echo $id_usuario ?>&nivel=1" role="button" class="btn btn-success btn-sm"><i class="fas fa-user-shield"></i>&nbsp;
                                        Administrador</a>
                                    <a href="_aprovar_usuario.php?id=<?php echo $id_usuario ?>&nivel=2" role="button" class="btn btn-warning btn-sm"><i class="fas fa-user-alt"></i>&nbsp;
                                        Gestão Notebook</a>
                                    <a href="_aprovar_usuario.php?id=<?php echo $id_usuario ?>&nivel=3" role="button" class="btn btn-primary btn-sm"><i class="fas fa-user-tag"></i>&nbsp;
                                        Visitante</a>
                                    <a href="_deletar_usuario.php?id=<?php echo $id_usuario ?>" role="button" class="btn btn-danger btn-sm"><i class="fas fa-ban"></i>&nbsp;
                                        Inadimitir</a>
                                </center>
                            </td>
                        <?php } ?>
                        </tr>
                </table>
            </center>
            <div style="text-align: right; margin-top:20px;">
                <a href="cadastro_usuario.php" role="button" class="btn btn-success btn-sm">Cadastrar novo usuário</a>
            </div>
        </div>
        <script src="https://kit.fontawesome.com/cae6919cdb.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
        </script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js">
        </script>
        <script>
            $(document).ready(function() {
                $('#table_id').DataTable({
                    "language": {
                        "lengthMenu": "Mostrando _MENU_ registros por página",
                        "zeroRecords": "Nada encontrado",
                        "info": "Mostrando _PAGE_ de _PAGES_",
                        "infoEmpty": "Nenhum registro encontrado",
                        "infoFiltered": "(Filtrado de _MAX_ registros totais)",
                        "search": "Pesquisar:",
                        "paginate": {
                            "first": "Primeiro",
                            "last": "Último",
                            "next": "Proximo",
                            "previous": "Anterior"
                        },
                    }
                });
            });
        </script>
    </section>

    <script src="script.js"></script>
</body>

</html