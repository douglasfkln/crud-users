<?php

include_once 'conexao.php';
$banco = new Conexao();

$id = $_GET['id'];

$sql = "DELETE FROM usuarios WHERE ID = $id";

$banco->execute($sql);

echo "<script>window.location.href = 'Usuarios.php'; </script>";
