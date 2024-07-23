<?php
// Conexão com o banco de dados
include 'conexao.php';

// Verificar se o arquivo Excel foi enviado
if (isset($_FILES['excelFile'])) {
    $excelFile = $_FILES['excelFile'];

    // Ler o arquivo Excel usando alguma biblioteca, como PHPExcel ou PhpSpreadsheet
    // Implementar a leitura e o processamento dos dados aqui
    // ...

    // Exemplo de processamento para cada linha
    foreach ($rows as $row) {
        $ativo = $row['ativo'];
        $query = "SELECT * FROM notebook WHERE ativo = '$ativo'";
        $result = $conexao->query($query);

        if ($result->num_rows > 0) {
            // Realizar as alterações necessárias no registro
            // ...
            // $conn->query("UPDATE notebook SET ...");
        } else {
            echo "Ativo não encontrado: $ativo<br>";
        }
    }

    echo "Registros atualizados com sucesso!";
} else {
    echo "Nenhum arquivo Excel enviado.";
}

$conexao->close();
