<nav class="navbar navbar-expand-lg navbar-dark bg-atento ">
    <div class="container-fluid">
        <a href="menu" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
            <img src="images/logo-light.png" height="25"></img>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07XL"
            aria-controls="navbarsExample07XL" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarsExample07XL">
            <ul class="navbar-nav mr-auto space-menu">
                <li class="nav-item">
                    <a href="menu" class="nav-link px-2 menu-atento ">Início </a>
                </li>

                <?php
                include 'conexao.php';
                $sql = "SELECT `nivel_usuario`, `status` FROM `usuarios` WHERE `mail_usuario` = '$usuario'";
                $buscar = mysqli_query($conexao, $sql);
                $array = mysqli_fetch_array($buscar);
                $nivel = $array['nivel_usuario'];
                if ($nivel == 1) {
                ?>

                <li class="nav-item">
                    <a href="atualiza" class="nav-link px-2 menu-atento ">Atualização em Lotes</a>
                </li>

                <?php } ?>
                <li class="nav-item">
                    <a href="" class="nav-link px-2 menu-atento " target="_blank">ABA 1</a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link px-2 menu-atento ">ABA 2</a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link px-2 menu-atento ">ABA 3</a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link px-2 menu-atento ">ABA 4</a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link px-2 menu-atento ">ABA 5</a>
                </li>
                <?php
                include 'conexao.php';
                $sql = "SELECT `nivel_usuario`, `status` FROM `usuarios` WHERE `mail_usuario` = '$usuario'";
                $buscar = mysqli_query($conexao, $sql);
                $array = mysqli_fetch_array($buscar);
                $nivel = $array['nivel_usuario'];
                if ($nivel == 1) {
                ?>

                <?php } ?>

        </div>
        <style>
        .dropdown-menu {
            margin-left: -65px;
        }

        @media screen and (max-width: 993px) {
            .ddsearch {
                display: none !important;
            }
        }
        </style>

        <div class="dropdown ddsearch">
            <button id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                class="btn btn-sm btn-user">
                <i class="bi bi-gear-fill fa-lg"></i>
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="reset"><i class="bi bi-key"></i>Troca de Senha</a>
                <a class="dropdown-item" href="sair"><i class="bi-power"></i> Deslogar</a>
            </div>
        </div>
    </div>
    </div>
</nav>