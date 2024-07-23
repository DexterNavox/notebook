<?php
include 'conexao.php';

// Recupera a última mensagem do banco de dados
$sql = "SELECT message_text FROM messages ORDER BY id DESC LIMIT 1";
$result = mysqli_query($conexao, $sql);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $message = str_replace(["\n", "\r"], '', htmlspecialchars($row['message_text']));
    $message = preg_replace('/\s+/', ' ', $message); // Remove múltiplos espaços em branco
} else {
    $message = "";
}

// Retorna a última mensagem para o cliente
echo "<div>" . $message . "</div>";

// Fecha a conexão com o banco de dados
mysqli_close($conexao);
?>
