<?php

include_once 'conexao.php';
$banco = new Conexao();

$dados = $_POST;

$sql_valida = "SELECT * FROM usuarios WHERE EMAIL = '" . $dados['email'] . "'";

$usuario = $banco->execute($sql_valida);

if ($usuario->num_rows > 0) {
    echo "<script> alert('E-mail já cadastrado'); </script>";
    echo "<script>window.location.href = 'Usuarios.php'; </script>";
    exit;
}

$sql = "INSERT INTO usuarios (NOME, TIPO_USUARIO, TELEFONE, EMAIL, SENHA)
        VALUES ('" . $dados['name'] . "', " . $dados['tipo'] . ", '" . $dados['telefone'] . "', '" . $dados['email'] . "', '" . md5($dados['senha']) . "');";

$banco->execute($sql);

echo "<script>window.location.href = 'Usuarios.php'; </script>";