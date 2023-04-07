<?php

# Inclui a conexão com o banco de dados
include_once '../../config.php';

# Recebe os dados que estão vindos através do método POST
$dados = $_POST;

# Armazena a ação que está sendo enviada do arquivo JSON
$acao = $dados['acao'];

# Verifica se a ação é cadastrar funcionário, se for faz a operação no banco..
if ($acao == "cadastrarFuncionario") {

    # Armazena os dados enviados pelo método POST através do form
    $nome = $dados['nome'];
    $email = $dados['email'];
    $telefone = $dados['telefone'];
    $cargo = $dados['cargo'];
    $salario = $dados['salario'];
    $dataContratacao = $dados['dataContratacao'];

    # Realiza a inserção no banco
    $sql = "INSERT INTO funcionarios (nome, email, telefone, cargo, salario, data_contratacao) VALUES ('$nome', '$email', '$telefone', '$cargo', '$salario', '$dataContratacao')";
    $resultado = mysqli_query($connection, $sql);

    # Retorna para o front o resultado da consulta
    if ($resultado) {
        $response['error'] = false;
        $response['msg'] = "Cadastrado com sucesso!";
    } else {
        $response['error'] = true;
        $response['msg'] = "Não foi possível cadastrar o funcionário!";
        echo mysqli_error($connection);
    }

    # Retorna o JSON pois o AJAX espera como retorno um JSON
    echo json_encode($response);
}

# Verifica se a ação é listar funcionário, se for faz a operação no banco..
if ($acao == "listarFuncionarios") {

    # Realiza a consulta no banco
    $sql = "SELECT * FROM funcionarios";
    $resultado = mysqli_query($connection, $sql);
    while ($row = mysqli_fetch_assoc($resultado)) {
        $dados[] = $row;
    }

    # Retorna para o front o resultado da consulta
    if ($resultado) {
        $response['error'] = false;
        $response['msg'] = "";
        $response['dados'] = $dados;
    } else {
        $response['error'] = true;
        $response['msg'] = "Não foi possível buscar os funcionários!";
        echo mysqli_error($connection);
    }

    # Retorna o JSON pois o AJAX espera como retorno um JSON
    echo json_encode($response);
}
