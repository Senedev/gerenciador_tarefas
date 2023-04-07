<?php

$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "gerenciador_tarefas";

$connection = mysqli_connect($servidor, $usuario, $senha, $banco);

if (!empty($connection)) {
    mysqli_error($connection);
}
