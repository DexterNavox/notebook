<?php 
$servername = "localhost";
$database = "trabalho_php";
$username = "root";
$password = "";

$conexao = mysqli_connect($servername, $username, $password, $database );
if (!$conexao) {
	die("Conexão falhou: " . mysqli_connect_error());
}
?>