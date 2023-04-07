$(document).ready(function () {
    listarFuncionarios();
});

function exibirModal() {
    modal.show();
}

var modal = new bootstrap.Modal(document.getElementById('cadastrarFuncionario'));

function cadastrarFuncionario() {

    // Apresenta o modal ao usuario
    modal.show();

    // Define a acao para o back e coleta os dados preenchidos nos campos do form
    var dadosForm = {
        acao: "cadastrarFuncionario",
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
                listarFuncionarios();
                modal.hide();
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
                                    "<td>" + elem.salario + "</td> " +
                                    "<td>" + elem.data_contratacao + "</td> " +
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