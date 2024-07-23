<?php
include 'conexao.php';

$termo_pesquisa = isset($_GET['pesquisa']) ? $_GET['pesquisa'] : '';

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


$query_export = "SELECT id_notebook, ativo, serie, marca, modelo, statuss, config, descri, nome, re, sites, area, cargo, lider, obs, grupo, Atualizado $query_base ORDER BY id_notebook DESC";
$result_export = mysqli_query($conexao, $query_export);

if ($result_export) {

    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=Gestão Notebook| GN.csv');
    $output = fopen('php://output', 'w');
    fprintf($output, chr(0xEF) . chr(0xBB) . chr(0xBF));
    $headers = array('ID', 'Ativo', 'Serie', 'Marca', 'Modelo', 'Status', 'CH.Regularização', 'Descrição', 'Nome', 'RE', 'Sites', 'Área', 'Cargo', 'Lider Imediato', 'Observação', 'Grupo', 'Atualizado');
    fputcsv($output, $headers, ';');
    while ($row = mysqli_fetch_assoc($result_export)) {
        $row = array_map(function ($value) {
            return mb_convert_encoding($value, 'UTF-8', 'auto');
        }, $row);
        fputcsv($output, $row, ';');
    }
    fclose($output);
}
exit();
