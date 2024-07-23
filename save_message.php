<?php
include 'conexao.php';
// Pega a mensagem do corpo da requisição POST
$message = $_POST['message'];
// Insere a mensagem na tabela "messages"
$sql = "INSERT INTO messages (message_text) VALUES ('$message')";
if (mysqli_query($conexao, $sql)) {
	// Envia a mensagem de volta para o cliente
	echo $message;
} else {
	echo "Erro: " . $sql . "<br>" . mysqli_error($conexao);
}
// Fecha a conexão com o banco de dados
mysqli_close($conexao);
