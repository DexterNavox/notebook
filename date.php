<?php

$updateSql = "UPDATE usuarios SET date = NOW() WHERE mail_usuario = ?";
$updateStmt = mysqli_prepare($conexao, $updateSql);
mysqli_stmt_bind_param($updateStmt, 's', $usuario);
mysqli_stmt_execute($updateStmt);
?>