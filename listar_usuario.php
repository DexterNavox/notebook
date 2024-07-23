<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GN | Lista de usuarios</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="images/cropped-favicon.ico" type="image/x-icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" rel="stylesheet" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/estilo_listas.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">

    <style>
        body {
            background-color: #0a0a0a;
            line-height: 1.0;
        }

        .h3,
        h3 {
            color: #fff;
        }

        label {
            color: #fff;
        }

        .container {
            padding-right: 2px;
            padding-left: 50px;
            margin-right: auto;
            margin-left: auto;
        }

        .table thead th {
            color: #fff;
        }

        .table {
            background-color: #000;
            color: #fff;
            border-radius: 15px 15px 0 0;
            width: 100%;
            overflow: auto;
        }

        table.dataTable tbody th,
        table.dataTable tbody td {
            background-color: #000;
            color: #fff;
            padding: 1px 10px;
        }

        .status-bola {
            display: inline-block;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            margin-right: 5px;
        }

        .status-online {
            background-color: green;
        }

        .status-offline {
            background-color: red;
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
                <h3>Lista de Usuarios</h3>
            </center>
            <br>
            <center>
                <table id="table_id" class="table">
                    <thead>
                        <tr>
                            <th width="30%">Nome do Usuario</th>
                            <th>Nivel</th>
                            <th>Status</th>
                            <th>Data</th>
                            <th>Categoria</th>
                            <th>Online?</th>
                            <th style="text-align: center;">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM `usuarios`";
                        $busca = mysqli_query($conexao, $sql);
                        while ($array = mysqli_fetch_array($busca)) {
                            $id_usuario = $array['id_usuario'];
                            $nome = $array['nome_usuario'];
                            $status = $array['status'];
                            $nivel_usuario = $array['nivel_usuario'];
                            $date = $array['date'];
                            $categoria = $array['cat'];
                        ?>
                            <tr>
                                <td style="vertical-align: inherit;"> <?php echo $nome ?> </td>
                                <td style="vertical-align: inherit;"> <?php echo $nivel_usuario ?> </td>
                                <td style="vertical-align: inherit;"> <?php echo $status ?> </td>
                                <td style="vertical-align: inherit;">
                                    <?php
                                    $timestamp = strtotime($date);
                                    $formattedDate = date("d/m/Y H:i:s", $timestamp);
                                    echo $formattedDate;
                                    ?>
                                </td>
                                <td style="vertical-align: inherit;"> <?php echo $categoria ?> </td>
                                <td style="vertical-align: inherit;"></td>
                                <td style="vertical-align: inherit;">
                                    <center>
                                        <?php if ($nivel == 1) { ?>
                                            <a href="editar_nivel-<?php echo $id_usuario ?>" role="button" class="btn btn-warning btn-sm"><i class="far fa-edit"></i>&nbsp; Editar</a>
                                        <?php } ?>
                                        <?php if ($nivel == 1) { ?>
                                            <a href="deletar_usuario.php?id=<?php echo $id_usuario ?>" role="button" onclick="return confirm('Deseja mesmo excluir esse usuario?');" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i>&nbsp; Excluir</a>
                                        <?php } ?>
                                    </center>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </center>
            <div style="text-align: right; margin-top:20px;"></div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
        <script src="https://kit.fontawesome.com/cae6919cdb.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
        <script>
            $(document).ready(function() {
                var table = $('#table_id').DataTable({
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
                    },
                    "drawCallback": function(settings) {
                        atualizarStatus();
                    }
                });
            });

            function atualizarStatus() {
                var table = document.getElementById("table_id");
                var rows = table.getElementsByTagName("tr");

                for (var i = 1; i < rows.length; i++) {
                    var row = rows[i];
                    var cells = row.getElementsByTagName("td");

                    var dateCell = cells[3]; // Coluna que contém a data (4ª coluna)
                    var statusCell = cells[5]; // Coluna que contém o status (6ª coluna)

                    var dateText = dateCell.textContent;

                    var recordTime = moment(dateText, "DD/MM/YYYY HH:mm:ss");
                    var currentTime = moment();

                    var diffMinutes = currentTime.diff(recordTime, 'minutes');

                    var statusText = "";
                    if (diffMinutes > 5) {
                        statusText = '<span class="status-bola status-offline"></span> Offline';
                    } else {
                        statusText = '<span class="status-bola status-online"></span> Online';
                    }

                    statusCell.innerHTML = statusText;
                }
            }

            window.addEventListener("load", atualizarStatus);
        </script>

    </section>
    <script src="script.js"></script>
</body>

</html>