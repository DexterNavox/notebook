<?php
// Inclua seu código de conexão com o banco de dados, se necessário
include 'conexao.php';

// Verifique se a solicitação POST para exportar foi enviada
if (isset($_POST['exportExcel'])) {
    // Defina o nome do arquivo CSV que será baixado
    $csvFileName = 'exported_data.csv';

    // Defina os cabeçalhos apropriados para um arquivo CSV
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename=' . $csvFileName);

    // Crie um ponteiro de arquivo para a saída
    $output = fopen('php://output', 'w');

    // Escreva o cabeçalho das colunas no arquivo CSV com ponto e vírgula como delimitador
    fputcsv($output, array('ID', 'Ativo', 'RE', 'CH.Regularizacao', 'Sites'), ';');

    try {
        $conexao = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conexao->query("SELECT * FROM dados");

        while ($row = $stmt->fetch()) {
            // Construa manualmente a linha de dados com ponto e vírgula como delimitador
            $data = array($row['id'], $row['ativo'], $row['re'], $row['ch_regularizacao'], $row['sites']);
            fputcsv($output, $data, ';');
        }

    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }

    // Feche o ponteiro de arquivo
    fclose($output);
    exit;
}
?>
