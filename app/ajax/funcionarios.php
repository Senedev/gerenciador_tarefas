<?php

# Inclui a conexão com o banco de dados
include_once '../../config.php';

# Recebe os dados que estão vindos através do método POST
$dados = $_POST;

# Armazena a ação que está sendo enviada pelo método POST
$acao = $dados['acao'];

# Verifica se a ação é cadastrar funcionário, se for faz a operação no banco..
if ($acao == "salvarFuncionario") {

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
        $info[] = $row;
    }

    # Retorna para o front o resultado da consulta
    if ($resultado) {
        $response['error'] = false;
        $response['msg'] = "";
        $response['dados'] = $info;
    } else {
        $response['error'] = true;
        $response['msg'] = "Não foi possível buscar os funcionários!";
        echo mysqli_error($connection);
    }

    # Retorna o JSON pois o AJAX espera como retorno um JSON
    echo json_encode($response);
}

# Verifica se a ação é editar funcionário, se for faz a operação no banco..
if ($acao == "editarFuncionario") {

    # Recebe os dados vindos do método POST
    $dados = $_POST;

    # Cria uma variavel para armazenar o ID do usuário
    $id = $_POST['id'];

    # Realiza a consulta no banco
    $sql = "SELECT * from funcionarios WHERE id_funcionario='$id'";
    $resultado = mysqli_query($connection, $sql);
    $funcionario = mysqli_fetch_assoc($resultado);

    # Retorna para o front o resultado da consulta
    if ($resultado) {
        $response['funcionario'] = $funcionario;
        $response['error'] = false;
        $response['msg'] = "";
    } else {
        $response['error'] = true;
        $response['msg'] = "Não foi possível buscar o funcionário!";
        echo mysqli_error($connection);
    }

    # Retorna o JSON pois o AJAX espera como retorno um JSON
    echo json_encode($response);
}

# Verifica se a ação é atualizar funcionário, se for faz a operação no banco..
if ($acao == "atualizarFuncionario") {

    # Recebe os dados vindos do método POST
    $dados = $_POST;

    # Recebe os dados vindos do método POST
    $id = $dados['id'];
    $nome = $dados['nome'];
    $email = $dados['email'];
    $telefone = $dados['telefone'];
    $cargo = $dados['cargo'];
    $salario = $dados['salario'];
    $dataContratacao = $dados['dataContratacao'];

    # Atualiza os dados no banco
    $sql = "UPDATE funcionarios SET id_funcionario = '$id', nome = '$nome', email = '$email', telefone = '$telefone', cargo = '$cargo', salario = '$salario', data_contratacao = '$dataContratacao' WHERE id_funcionario='$id'";
    $resultado = mysqli_query($connection, $sql);

    # Retorna para o front o resultado da consulta
    if ($resultado) {
        $response['error'] = false;
        $response['msg'] = "Funcionário atualizado com sucesso!";
    } else {
        $response['error'] = true;
        $response['msg'] = "Não foi possível atualizar o funcionário!";
        echo mysqli_error($connection);
    }

    # Retorna o JSON pois o AJAX espera como retorno um JSON
    echo json_encode($response);
}
