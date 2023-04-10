$(document).ready(function () {
    listarFuncionarios();
});

function formatarData(dado) {
    var data = new Date(dado);
    data = data.toLocaleDateString();
    return data;
}

var modal = new bootstrap.Modal(document.getElementById('cadastrarFuncionario'));

function cadastrarFuncionario() {
    modal.show();
    $("#modalFuncionarioHeaderTitulo").html("Cadastrar Funcionário");
    $("#modalFuncionarioDiv").hide();
    $("#modalNomeFuncionario").val("");
    $("#modalEmailFuncionario").val("");
    $("#ModalTelefoneFuncionario").val("");
    $("#modalCargoFuncionario").val("");
    $("#modalSalarioFuncionario").val("");
    $("#modalDataContratacaoFuncionario").val("");
    $("#modalCadastrarFuncionario").show();
    $("#modalAtualizarFuncionario").hide();
}

function salvarFuncionario() {

    // Apresenta o modal ao usuario
    modal.show();

    // DRecebe os dados vindos do form
    var dadosForm = {
        acao: "salvarFuncionario",
        nome: $("#modalNomeFuncionario").val(),
        email: $("#modalEmailFuncionario").val(),
        telefone: $("#ModalTelefoneFuncionario").val(),
        cargo: $("#modalCargoFuncionario").val(),
        salario: $("#modalSalarioFuncionario").val(),
        dataContratacao: $("#modalDataContratacaoFuncionario").val()
    };

    $.ajax({
        method: "POST",
        url: "../ajax/funcionarios.php",
        dataType: 'json',
        data: dadosForm,
        success: function (data) {
            console.log(data);
            if (data.error == true) {
                alert(data.msg);
            } else {
                modal.hide();
                listarFuncionarios();
            }
        },
        error: function (data) {
            console.log("Deu tudo errado");
        }
    });
}

function listarFuncionarios() {

    var dadosForm = {
        acao: "listarFuncionarios"
    };

    $.ajax({
        method: "POST",
        url: "../ajax/funcionarios.php",
        dataType: 'json',
        data: dadosForm,
        success: function (data) {
            if (data.error == true) {
                alert(data.msg);
            } else {
                var html = '';
                var funcionarios = data.dados;
                if (funcionarios.length > 0) {
                    funcionarios.forEach(function (elem) {
                        var html = '';
                        var funcionarios = data.dados;
                        if (funcionarios.length > 0) {
                            funcionarios.forEach(function (elem) {
                                html += "<tr>" +
                                    "<td>" + elem.id_funcionario + "</td>" +
                                    "<td>" + elem.nome + "</td>" +
                                    "<td>" + elem.email + "</td> " +
                                    "<td>" + elem.telefone + "</td > " +
                                    "<td>" + elem.cargo + "</td> " +
                                    "<td>R$ " + elem.salario + "</td> " +
                                    "<td>" + formatarData(elem.data_contratacao) + "</td> " +
                                    "<td><a onclick='editarFuncionario(" + elem.id_funcionario + ")'><img src='../../app/assets/img/editar.png' alt='Editar'></a></td>" +
                                    "<td><a onclick='removerFuncionario(" + elem.id_funcionario + ")'><img src='../../app/assets/img/remover.png' alt='Remover'></a></td>" +
                                    "<td></td>"
                                "</tr>";
                            });
                            $("#listarDadosFuncionarios").html(html);
                        }
                    });
                }
            }
        },
        error: function (data) {
            console.log("Deu tudo errado");
        }
    });

}

function editarFuncionario(id) {
    modal.show();
    $("#modalFuncionarioHeaderTitulo").html("Editar Funcionário");
    $("#modalFuncionarioDiv").show();
    $("#modalIdFuncionario").val("");
    $("#modalNomeFuncionario").val("");
    $("#modalEmailFuncionario").val("");
    $("#ModalTelefoneFuncionario").val("");
    $("#modalCargoFuncionario").val("");
    $("#modalSalarioFuncionario").val("");
    $("#modalDataContratacaoFuncionario").val("");
    $("#modalCadastrarFuncionario").hide();
    $("#modalAtualizarFuncionario").show();

    var dadosForm = {
        acao: "editarFuncionario",
        id: id
    };

    $.ajax({
        method: "POST",
        url: "../ajax/funcionarios.php",
        dataType: 'json',
        data: dadosForm,
        success: function (data) {
            if (data.error == true) {
                alert(data.msg);
            } else {
                var funcionario = data.funcionario;
                $("#modalIdFuncionario").val(funcionario.id_funcionario);
                $("#modalNomeFuncionario").val(funcionario.nome);
                $("#modalEmailFuncionario").val(funcionario.email);
                $("#ModalTelefoneFuncionario").val(funcionario.telefone);
                $("#modalCargoFuncionario").val(funcionario.cargo);
                $("#modalSalarioFuncionario").val(funcionario.salario);
                $("#modalDataContratacaoFuncionario").val(funcionario.data_contratacao);
            }
        },
        error: function (data) {
            console.log("Deu tudo errado");
        }
    });
}

function atualizarFuncionario() {
    var dadosForm = {
        acao: "atualizarFuncionario",
        id: $("#modalIdFuncionario").val(),
        nome: $("#modalNomeFuncionario").val(),
        email: $("#modalEmailFuncionario").val(),
        telefone: $("#ModalTelefoneFuncionario").val(),
        cargo: $("#modalCargoFuncionario").val(),
        salario: $("#modalSalarioFuncionario").val(),
        dataContratacao: $("#modalDataContratacaoFuncionario").val()
    };

    $.ajax({
        method: "POST",
        url: "../ajax/funcionarios.php",
        dataType: 'json',
        data: dadosForm,
        success: function (data) {
            if (data.error == true) {
                alert(data.msg);
            } else {
                modal.hide();
                listarFuncionarios();
            }
        },
        error: function (data) {
            console.log("Deu tudo errado");
        }
    });
}

function removerFuncionario(id) {

    var dadosForm = {
        acao: "removerFuncionario",
        id: id
    }

    $.ajax({
        method: "POST",
        url: "../ajax/funcionarios.php",
        dataType: 'json',
        data: dadosForm,
        success: function (data) {
            if (data.error == true) {
                alert(data.msg);
            } else {
                alert(data.msg);
                listarFuncionarios();
            }
        },
        error: function (data) {
            console.log("Deu tudo errado");
        }
    });

}