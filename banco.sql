CREATE DATABASE gerenciador_tarefas;

USE gerenciador_tarefas;

CREATE TABLE tarefas (
    id_tarefa INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    titulo VARCHAR(100) NOT NULL,
    descricao TEXT,
    data_criacao DATE,
    data_conclusao DATE,
    status VARCHAR(20),
    prioridade VARCHAR(20),
    id_responsavel INT,
    FOREIGN KEY (id_responsavel) REFERENCES funcionarios(id_funcionario) ON DELETE CASCADE
);

CREATE TABLE funcionarios (
    id_funcionario INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE,
    telefone VARCHAR(20),
    cargo VARCHAR(50),
    salario DECIMAL(10,2),
    data_contratacao DATE
);