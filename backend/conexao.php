<?php

$servidor = "localhost";
$usuario = "root";
$senha = "root";
$banco = "db_primeiros_socorros";
$port = 3306;

$conexao = new mysqli($servidor, $usuario, $senha, $banco, $port);

if ($conexao->connect_error) {
    die("Erro na conexão: " . $conexao->connect_error);
}
$conexao->set_charset("utf8");
?>

