$(document).ready(function () {

});

var modal = new bootstrap.Modal(document.getElementById('cadastrarTarefa'));

function salvarTarefa() {
    modal.show();

    var dadosForm = {
        acao: "salvarTarefa",
        titulo: $("#modalTituloTarefa").val(),
        descricao: $("#modalDescricaoTarefa").val(),
        dataCriacao: $("#modalDataCriacaoTarefa").val(),
        dataConclusao: $("#modalDataConclusaoTarefa").val(),
        status: $("#modalStatusTarefa").val(),
        prioridade: $("#modalPrioridadeTarefa").val(),
        responsavel: $("#modalIdResponsavelTarefa").val(),
    };

    $.ajax({
        method: "POST",
        url: "../ajax/tarefas.php",
        dataType: 'json',
        data: dadosForm,
        success: function (data) {
            console.log(data);
            if (data.error == true) {
                alert(data.msg);
            } else {
                modal.hide();
            }
        },
        error: function (data) {
            console.log("Deu tudo errado");
        }
    });
}