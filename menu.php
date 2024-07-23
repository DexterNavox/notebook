<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GN | Menu</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js">
    </script>
    <script src="script.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,300;0,400;0,600;0,700;0,800;0,900;1,300;1,400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300;1,400&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="images/cropped-favicon.ico" type="image/x-icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="fonts/css/all.min.css">
    <link rel="stylesheet" href="css/modal.css">




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
        header('Location: inativo.php');
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
        <br>




        <div class="col-md-9 order-first order-md-last mt-3">
            <div class="padding-home row row-cols-1 row-cols-md-6 mb-6 text-center icons-container">

                <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                    <a target="_blank" href="">
                        <div class="icons-atento">
                            <div class="icons-img-atento">
                                <img src="images/icons/1.png" alt="">
                            </div>

                        </div>
                    </a>
                </div>

                <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                    <a target="_blank" href="">
                        <div class="icons-atento">
                            <div class="icons-img-atento">
                                <img src="images/icons/2.png" alt="">
                            </div>

                        </div>
                    </a>


                </div>


                <div class="col-6 col-sm-4 col-md-4 col-lg-4">
                    <a target="_blank" href="">
                        <div class="icons-atento">
                            <div class="icons-img-atento">
                                <img src="images/icons/3.png" alt="">
                            </div>

                        </div>
                    </a>
                </div>

                <div class="col-6 col-sm-4 col-md-4 col-lg-3">
                    <a target="_blank" href="">
                        <div class="icons-atento">
                            <div class="icons-img-atento">
                                <img src="images/icons/4.png" alt="">
                            </div>

                        </div>
                    </a>
                </div>
                <div class="col-6 col-sm-4 col-md-4 col-lg-3">
                    <a target="_blank" href="">
                        <div class="icons-atento">
                            <div class="icons-img-atento">
                                <img src="images/icons/5.png" alt="">
                            </div>

                        </div>
                    </a>
                </div>
                <div class="col-6 col-sm-4 col-md-4 col-lg-3">
                    <a target="_blank" href="">
                        <div class="icons-atento">
                            <div class="icons-img-atento">
                                <img src="images/icons/6.png" alt="">
                            </div>

                        </div>
                    </a>
                </div>
                <div class="col-6 col-sm-4 col-md-4 col-lg-3">
                    <a target="_blank" href="">
                        <div class="icons-atento">
                            <div class="icons-img-atento">
                                <img src="images/icons/7.png" alt="">
                            </div>

                        </div>
                    </a>
                </div>
                <div class="col-6 col-sm-4 col-md-4 col-lg-3">
                    <a target="_blank" href="">
                        <div class="icons-atento">
                            <div class="icons-img-atento">
                                <img src="images/icons/8.png" alt="">
                            </div>

                        </div>
                    </a>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered custom-modal-dialog-lg">
                        <div class="modal-content custom-modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Service Now</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                            </div>
                            <div class="modal-body">
                                Qual opção?
                            </div>
                            <div class="modal-footer d-flex justify-content-between">
                                <!-- Adicionando classe para alinhar os botões -->
                                <a class="btn btn-primary" href="" role="button" target="_blank">Atender Chamado</a>
                                <a class=" btn btn-warning" href="" role="button" target="_blank">Abrir Chamado</a>
                            </div>
                        </div>
                    </div>
                </div>


                <div class=" col-4 col-sm-4 col-md-4 col-lg-3">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#myModal">
                        <div class="icons-atento">
                            <div class="icons-img-atento">
                                <img src="images/icons/9.png" alt="">
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-4 col-sm-4 col-md-4 col-lg-3">
                    <a target="_blank" href="">
                        <div class="icons-atento">
                            <div class="icons-img-atento">
                                <img src="images/icons/10.png" alt="">
                            </div>

                        </div>
                    </a>
                </div>

                <div class="col-4 col-sm-4 col-md-4 col-lg-3">
                    <a target="_blank" href="">
                        <div class="icons-atento">
                            <div class="icons-img-atento">
                                <img src="images/icons/11.png" alt="">
                            </div>

                        </div>
                    </a>
                </div>

                <div class="col-4 col-sm-4 col-md-4 col-lg-3">
                    <a target="_blank" href="">
                        <div class="icons-atento">
                            <div class="icons-img-atento">
                                <img src="images/icons/12.png" alt="">
                            </div>

                        </div>
                    </a>
                </div>

                <div class="col-4 col-sm-4 col-md-4 col-lg-3">
                    <a target="_blank" href="">
                        <div class="icons-atento">
                            <div class="icons-img-atento">
                                <img src="images/icons/13.png" alt="">
                            </div>

                        </div>
                    </a>
                </div>


            </div>

            </script>

            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

            <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js">
            </script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js">
            </script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js">
            </script>


    </section>
    <script src="script.js"></script>

    <?php
    include 'includes/servicenow.php';
    ?>


</body>

</html>