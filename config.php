<?php

$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "gerenciador_tarefas";

$connection = mysqli_connect($servidor, $usuario, $senha, $banco);

if (!$connection) {
    die("Houve um erro na conexão: " . mysqli_connect_error());
}
