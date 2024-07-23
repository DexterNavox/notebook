<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

:root {
    --color-default: #141414;
    --color-second: #141414d8;
    --color-white: #fff;
    --color-body: #e4e9f7;
    --color-light: #e0e0e0;
}

* {
    padding: 0%;
    margin: 0%;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

body {
    min-height: 100vh;

}

.sidebar {
    min-height: 100vh;
    width: 78px;
    padding: 6px 7px;
    z-index: 99;
    background-color: #000;
    transition: all .5s ease;
    position: fixed;
    top: 0;
    left: 0;
}

.sidebar.open {
    width: 250px;
}

.sidebar .logo_details {
    height: 16px;
    display: flex;
    align-items: center;
    position: relative;
}

.sidebar .logo_details .icon {
    opacity: 0;
    transition: all 0.5s ease;
}

.sidebar .logo_details .logo_name {
    color: var(--color-white);
    font-size: 22px;
    font-weight: 600;
    opacity: 0;
    transition: all .5s ease;
}

.sidebar.open .logo_details .icon,
.sidebar.open .logo_details .logo_name {
    opacity: 1;
}

.sidebar .logo_details #btn {
    position: absolute;
    top: 50%;
    right: 13px;
    transform: translateY(-50%);
    font-size: 23px;
    text-align: center;
    cursor: pointer;
    transition: all .5s ease;
}

.sidebar.open .logo_details #btn {
    text-align: right;
}

.sidebar i {
    color: var(--color-white);
    height: 60px;
    line-height: 60px;
    min-width: 50px;
    font-size: 25px;
    text-align: center;
}

.sidebar .nav-list {
    margin-top: -8px;
    height: 100%;
    padding-left: 0rem;
}

.sidebar li {
    position: relative;
    margin: 5px 0;
    list-style: none;
}

.sidebar li .tooltip {
    position: absolute;
    top: -20px;
    left: calc(100% + 15px);
    z-index: 3;
    background-color: var(--color-white);
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3);
    padding: 6px 15px;
    font-size: 15px;
    font-weight: 400;
    border-radius: 5px;
    white-space: nowrap;
    opacity: 0;
    pointer-events: none;
}

.sidebar li:hover .tooltip {
    opacity: 1;
    pointer-events: auto;
    transition: all 0.4s ease;
    top: 50%;
    transform: translateY(-50%);
}

.sidebar.open li .tooltip {
    display: none;
}

.sidebar input {
    font-size: 15px;
    color: var(--color-white);
    font-weight: 400;
    outline: none;
    height: 35px;
    width: 35px;
    border: none;
    border-radius: 5px;
    background-color: var(--color-second);
    transition: all .5s ease;
}

.sidebar input::placeholder {
    color: var(--color-light)
}

.sidebar.open input {
    width: 100%;
    padding: 0 20px 0 50px;
}

.sidebar li a {
    display: flex;
    height: 100%;
    width: 100%;
    align-items: center;
    text-decoration: none;
    background-color: #000;
    position: relative;
    transition: all .5s ease;
    z-index: 12;
}

.sidebar li a::after {
    content: "";
    position: absolute;
    width: 100%;
    height: 100%;
    transform: scaleX(0);
    background-color: var(--color-white);
    border-radius: 5px;
    transition: transform 0.3s ease-in-out;
    transform-origin: left;
    z-index: -2;
}

.sidebar li a:hover::after {
    transform: scaleX(1);
    color: var(--color-default)
}

.sidebar li a .link_name {
    color: var(--color-white);
    font-size: 15px;
    font-weight: 400;
    white-space: nowrap;
    pointer-events: auto;
    transition: all 0.4s ease;
    pointer-events: none;
    opacity: 0;
}

.sidebar li a:hover .link_name,
.sidebar li a:hover i {
    transition: all 0.5s ease;
    color: var(--color-default)
}

.sidebar.open li a .link_name {
    opacity: 1;
    pointer-events: auto;
}

.sidebar li i {
    height: 33px;
    line-height: 33px;
    font-size: 18px;
    border-radius: 5px;
}


.sidebar .profile .profile_details {
    display: flex;
    align-items: center;
    flex-wrap: nowrap;
}

.sidebar li img {
    height: 45px;
    width: 45px;
    object-fit: cover;
    border-radius: 50%;
    margin-right: 10px;
}

.home-section {
    position: relative;
    background-color: #0a0a0a;
    min-height: 120vh;
    top: 0;
    left: 78px;
    width: calc(100% - 78px);
    transition: all .5s ease;
    z-index: 2;
}

.home-section .text {
    display: inline-block;
    color: var(--color-default);
    font-size: 25px;
    font-weight: 500;
    margin: 18px;
}

.sidebar.open~.home-section {
    left: 250px;
    width: calc(100% - 250px);
}

.navbar {
    background-color: #000;
    height: 50px;
    display: flex;
    align-items: center;
    padding: 0 20px;
}

.navbar-icon {
    display: flex;
    align-items: center;
    margin-right: 10px;
    font-size: 20px;
    color: white;
    margin-left: auto;
}

.navbar-icon i:not(:last-child) {
    margin-right: 10px;
}

.container {
    margin: 0px auto;
    max-width: 1200px;
    display: flow-root;
    grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
    grid-column-gap: 22px;
    grid-row-gap: 22px;
    justify-content: center;
    padding: 20px 20px;

}

.container3 {
    margin: 0px auto;
    max-width: 1200px;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
    grid-column-gap: 22px;
    grid-row-gap: 22px;
    justify-content: center;
    padding: 0 20px;
}



.polaroid {
    background: white;
    padding: 13px 0px 0px;
}

.photo {
    width: 100%;
    height: 100px;
    object-fit: cover;
}

.link-separator {
    margin: 0 10px;
}
</style>
<div class="sidebar">
    <div class="logo_details">
        <i class="bx bx-menu" id="btn"></i>
    </div>
    <ul class="nav-list">
        <?php
    include 'conexao.php';

    $sql = "SELECT `nivel_usuario`, `status` FROM `usuarios` WHERE `mail_usuario` = '$usuario'";
    $buscar = mysqli_query($conexao, $sql);
    $array = mysqli_fetch_array($buscar);

    $nivel = $array['nivel_usuario'];
    if (($nivel == 1) || ($nivel == 2)) {
    ?>
        <li>
            <a href="adicionar_notebooks">
                <i class="bi bi-laptop"></i>
                <span class="link_name">Adicionar notebook</span>
            </a>
            <span class="tooltip">Adicionar notebook</span>
        </li>
        <li>
            <a href="adicionar_sites">
                <i class="bi bi-building-add"></i>
                <span class="link_name">Adicionar sites</span>
            </a>
            <span class="tooltip">Adicionar sites
            </span>
        </li>
        <li>
            <a href="adicionar_status">
                <i class="bi bi-file-earmark-plus-fill"></i>
                <span class="link_name">Adicionar status</span>
            </a>
            <span class="tooltip">Adicionar status
            </span>
        </li>
        <?php } ?>
        <?php
    if (($nivel == 1)) {
    ?>
        <li>
            <a href="aprovar_usuario">
                <i class="bi bi-person-fill-check"></i>
                <span class="link_name">Aprovar usuários</span>
            </a>
            <span class="tooltip">Aprovar usuários</span>
        </li>
        <li>
            <a href="cadastro_usuario">
                <i class="bi bi-person-fill-add"></i>
                <span class="link_name">Cadastrar usuários</span>
            </a>
            <span class="tooltip">Cadastrar usuários</span>
        </li>
        <?php } ?>
        <?php
    if (($nivel == 1) || ($nivel == 2)) {
    ?>
        <li>
            <a href="disponibilidade">
                <i class="bi bi-ui-checks-grid"></i>
                <span class="link_name">Disponibilidade</span>
            </a>
            <span class="tooltip">Disponibilidade</span>
        </li>
        <?php } ?>
        <li>
            <a href="laps">
                <i class="bi bi-pencil-fill"></i>
                <span class="link_name">Laps</span>
            </a>
            <span class="tooltip">Laps</span>
        </li>
        <li>
            <a href="listar_notebooks">
                <i class="bi bi-laptop-fill"></i>
                <span class="link_name">Listar notebook</span>
            </a>
            <span class="tooltip">Listar notebook</span>
        </li>
        <?php
    if (($nivel == 1) || ($nivel == 2)) {
    ?>
        <li>
            <a href="listar_sites">
                <i class="bi bi-building"></i>
                <span class="link_name">Listar sites</span>
            </a>
            <span class="tooltip">Listar sites</span>
        </li>
        <li>
            <a href="listar_status">
                <i class="bi bi-list-check"></i>
                <span class="link_name">Listar status</span>
            </a>
            <span class="tooltip">Listar status</span>
        </li>
        <?php } ?>
        <?php
    if (($nivel == 1)) {
    ?>
        <li>
            <a href="listar_usuario">
                <i class="bi bi-people-fill"></i>
                <span class="link_name">Listar usuários</span>
            </a>
            <span class="tooltip">Listar usuários</span>
        </li>
        <?php } ?>
        <?php
    if (($nivel == 1) || ($nivel == 2)) {
    ?>
        <li>
            <a href="manutenção">
                <i class="bi bi-screwdriver"></i>
                <span class="link_name">Manutenção</span>
            </a>
            <span class="tooltip">Manutenção</span>
        </li>
        <?php } ?>
        <li>
            <a href="menu">
                <i class="bi bi-menu-button-wide"></i>
                <span class="link_name">Menu</span>
            </a>
            <span class="tooltip">Menu
            </span>
        </li>
        <?php
    if (($nivel == 1) || ($nivel == 2)) {
    ?>
        <li>
            <a href="regularizacao.php"
                target="_blank">
                <i class="bi bi-check2-circle"></i>
                <span class="link_name">Regularização de ativos</span>
            </a>
            <span class="tooltip">Regularização de ativos</span>
        </li>
        <?php } ?>
    </ul>
</div>