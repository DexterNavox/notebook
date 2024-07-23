<?php

include 'conexao.php';
include 'script/password.php';

$usuario = $_POST['usuario'];
$senhausuario = $_POST['senha'];

// Preparar a consulta SQL usando uma consulta preparada
$sql = "SELECT mail_usuario, senha_usuario, status FROM usuarios WHERE mail_usuario = ?";
$stmt = mysqli_prepare($conexao, $sql);
mysqli_stmt_bind_param($stmt, 's', $usuario);
mysqli_stmt_execute($stmt);

// Obter resultados da consulta
mysqli_stmt_store_result($stmt);

if (mysqli_stmt_num_rows($stmt) > 0) {
    mysqli_stmt_bind_result($stmt, $mail_usuario, $senha_hash, $status);
    mysqli_stmt_fetch($stmt);

    if ($status === 'Ativo') {
        $senhadecode = md5($senhausuario);

        if ($senhadecode == $senha_hash) {
            session_start();
            $_SESSION['usuario'] = $usuario;

            // Inserir a data e hora atual no campo 'date'
            $updateSql = "UPDATE usuarios SET date = NOW() WHERE mail_usuario = ?";
            $updateStmt = mysqli_prepare($conexao, $updateSql);
            mysqli_stmt_bind_param($updateStmt, 's', $usuario);
            mysqli_stmt_execute($updateStmt);

            header('Location: menu');
            die();
        } else {
            header('Location: erro');
            die("Senha incorreta. Tente novamente.");
        }
    } else {
        header('Location: inativo');
        die("Usuário inativo. Entre em contato com o suporte.");
    }
} else {
    header('Location: erro');
    die("Usuário não encontrado. Tente novamente.");
}

// Feche as consultas preparadas e a conexão após o uso
mysqli_stmt_close($stmt);
mysqli_close($conexao);
