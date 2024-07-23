<?php

include 'conexao.php';
if (!$conexao) {
    die("Conexão falhou: " . mysqli_connect_error());
}
session_start();
$usuario = $_SESSION['usuario'];
if (!isset($_SESSION['usuario'])) {
    header('Location: index.php');
}

$sql = "SELECT `nivel_usuario`,`cat` FROM `usuarios` WHERE `mail_usuario` = '$usuario' and `status` = 'Ativo'";
$buscar = mysqli_query($conexao, $sql);
$array = mysqli_fetch_array($buscar);
$nivel = $array['nivel_usuario'];
$cat = $array['cat'];

$pagina = isset($_GET['pagina']) ? intval($_GET['pagina']) : 1;
$termo_pesquisa = isset($_GET['pesquisa']) ? $_GET['pesquisa'] : '';

// Verifica se o número da página é menor que 1
if ($pagina < 1) {
    $pagina = 1;
}

$qnt_result_pg = 5; // Quantidade de registros por página
$inicio = ($pagina * $qnt_result_pg) - $qnt_result_pg;

// Construir a consulta SQL para busca
$query_base = "FROM notebook WHERE 1=1";
if (!empty($termo_pesquisa)) {
    $query_base .= " AND (
        ativo LIKE '%$termo_pesquisa%' OR
        serie LIKE '%$termo_pesquisa%' OR
        marca LIKE '%$termo_pesquisa%' OR
        modelo LIKE '%$termo_pesquisa%' OR
        statuss LIKE '%$termo_pesquisa%' OR
        config LIKE '%$termo_pesquisa%' OR
        descri LIKE '%$termo_pesquisa%' OR
        nome LIKE '%$termo_pesquisa%' OR
        re LIKE '%$termo_pesquisa%' OR
        sites LIKE '%$termo_pesquisa%' OR
        area LIKE '%$termo_pesquisa%' OR
        cargo LIKE '%$termo_pesquisa%' OR
        lider LIKE '%$termo_pesquisa%' OR
        obs LIKE '%$termo_pesquisa%' OR
        grupo LIKE '%$termo_pesquisa%' OR
        Atualizado LIKE '%$termo_pesquisa%'
    )";
}

// Consulta para pegar os dados paginados
$query_notebook = "SELECT id_notebook, ativo, serie, marca, modelo, statuss, config, descri, nome, re, sites, area, cargo, lider, obs, grupo, Atualizado $query_base ORDER BY id_notebook DESC LIMIT $inicio, $qnt_result_pg";
$result_notebook = mysqli_query($conexao, $query_notebook);

// Construir a tabela de dados
$dados = "<div class='table'>
            <table class='table table-hover table-dark'>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Ativo</th>
                        <th scope='col' style='min-width: 180px;'>Serie</th>
                        <th scope='col' style='min-width: 120px;'>Marca</th>
                        <th scope='col' style='min-width: 180px;'>Modelo</th>
                        <th scope='col' style='min-width: 180px;'>Status</th>
                        <th scope='col' style='min-width: 230px;'>CH.Regularização</th>
                        <th scope='col' style='min-width: 280px;'>Descrição</th>
                        <th scope='col' style='min-width: 460px;'>Nome</th>
                        <th>RE</th>
                        <th scope='col' style='min-width: 230px;'>Sites</th>
                        <th scope='col' style='min-width: 300px;'>Área</th>
                        <th scope='col' style='min-width: 380px;'>Cargo</th>
                        <th scope='col' style='min-width: 450px;'>Lider Imediato</th>
                        <th scope='col' style='min-width: 200px;'>Observação</th>
                        <th>Grupo</th>
                        <th scope='col' style='min-width: 540px;'>Atualizado</th>
                        <th scope='col' style='min-width: 290px; text-align: center;'>Ações</th>
                    </tr>
                </thead>
                <tbody>";

while ($row = mysqli_fetch_assoc($result_notebook)) {
    $id_notebook = $row['id_notebook'];
    $ativo = $row['ativo'];
    $serie = $row['serie'];
    $marca = $row['marca'];
    $modelo = $row['modelo'];
    $statss = $row['statuss'];
    $config = $row['config'];
    $descri = $row['descri'];
    $nome = $row['nome'];
    $re = $row['re'];
    $sites = $row['sites'];
    $area = $row['area'];
    $cargo = $row['cargo'];
    $lider = $row['lider'];
    $obs = $row['obs'];
    $grupo = $row['grupo'];
    $Atualizado = $row['Atualizado'];
    $acoes1 = '';
    $acoes2 = '';
    $acoes3 = '';

    if (($nivel == 1) || ($nivel == 2)) {
        if ($cat == 'presencial' && $grupo == 'Presencial') {
            $acoes1 = "<a href='editar_notebooks-$id_notebook' class='btn btn-sm btn-warning'><i class='far fa-edit'></i>&nbsp;Editar</a>";
        } elseif ($cat == 'atento') {
            $acoes1 = "<a href='editar_notebooks-$id_notebook' class='btn btn-sm btn-warning'><i class='far fa-edit'></i>&nbsp;Editar</a>";
        }
    }

    if ($nivel == 1) {
        $acoes2 = "<a href='deletar_notebooks-$id_notebook' class='btn btn-sm btn-danger'><i class='far fa-trash-alt'></i>&nbsp;Excluir</a>";
    }
    if ($nivel >= 1) {
        $acoes3 = "<a href='Visualizar-$id_notebook' class='btn btn-sm btn-success'><i class='far fa-eye'></i>&nbsp;Visualizar</a>";
    }

    $dados .= "<tr>
                <td>$id_notebook</td>
                <td>$ativo</td>
                <td>$serie</td>
                <td>$marca</td>
                <td>$modelo</td>
                <td>$statss</td>
                <td>$config</td>
                <td>$descri</td>
                <td>$nome</td>
                <td>$re</td>
                <td>$sites</td>
                <td>$area</td>
                <td>$cargo</td>
                <td>$lider</td>
                <td>$obs</td>
                <td>$grupo</td>
                <td>$Atualizado</td>
                <td style='text-align: center;'>$acoes3 $acoes1 $acoes2</td>
              </tr>";
}
$dados .= "</tbody>
        </table>
    </div>";

// Consulta para contar o número total de resultados (com filtro)
$query_pg = "SELECT COUNT(id_notebook) AS num_result $query_base";
$result_pg = mysqli_query($conexao, $query_pg);
$row_pg = mysqli_fetch_assoc($result_pg);
$quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);

$max_links = 2;
$dados .= '<nav aria-label="Page navigation example"><ul class="pagination pagination-sm justify-content-center">';
$dados .= "<li class='page-item'><a href='#' class='page-link' onclick='listarNotebooks(1)'>Primeira</a></li>";

for ($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++) {
    if ($pag_ant >= 1) {
        $dados .= "<li class='page-item'><a class='page-link' href='#' onclick='listarNotebooks($pag_ant)'>$pag_ant</a></li>";
    }
}

$dados .= "<li class='page-item active'><a class='page-link' href='#'>$pagina</a></li>";

for ($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++) {
    if ($pag_dep <= $quantidade_pg) {
        $dados .= "<li class='page-item'><a class='page-link' href='#' onclick='listarNotebooks($pag_dep)'>$pag_dep</a></li>";
    }
}

$dados .= "<li class='page-item'><a class='page-link' href='#' onclick='listarNotebooks($quantidade_pg)'>Última</a></li>";
$dados .= '</ul></nav>';

if ($row_pg['num_result'] == 0) {
    echo "<div class='alert alert-danger' role='alert'>Erro: Nenhum notebook encontrado!</div>";
} else {
    echo $dados;
}
?>
