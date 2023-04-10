<?php

# Inclui a conexão com o banco de dados
include_once '../../config.php';

# Recebe os dados que estão vindos através do método POST
$dados = $_POST;

# Armazena a ação que está sendo enviada pelo método POST
$acao = $dados['acao'];

# Verifica se a ação é salvar tarefa, se for faz a operação no banco..
if ($acao == "salvarTarefa") {

    # Armazena os dados enviados pelo método POST através do form
    $nome = $dados['titulo'];
    $descricao = $dados['descricao'];
    $dataCriacao = $dados['dataCriacao'];
    $dataConclusao = $dados['dataConclusao'];
    $status = $dados['status'];
    $prioridade = $dados['prioridade'];
    $responsavel = $dados['responsavel'];

    # Executa a consulta no banco
    $sql = "INSERT INTO tarefas (titulo, descricao, data_criacao, data_conclusao, status_tarefa, prioridade, id_responsavel) VALUES ('$titulo', '$descricao', '$dataCriacao', '$dataConclusao', '$status', '$prioridade', '$responsavel')";
    $resultado = mysqli_query($connection, $sql);

    # Retorna para o front o resultado da consulta
    if ($resultado) {
        $response['error'] = false;
        $response['msg'] = "Tarefa cadastrada com sucesso!";
    } else {
        $response['error'] = true;
        $response['msg'] = "Não foi possível cadastrar a tarefa!";
        echo mysqli_error($connection);
    }

    # Retorna o JSON pois o AJAX espera como retorno um JSON
    echo json_encode($response);
}
