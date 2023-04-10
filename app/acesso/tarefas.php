<!DOCTYPE html>
<html lang="pt-br">

<?php include_once '../layout/head.php' ?>
<?php include_once '../../config.php' ?>

<body>

    <?php include_once '../layout/menu.php' ?>
    <?php include_once '../../extensoes/scripts/tarefas.js' ?>

    <div class="container">
        <div class="table-responsive">
            <table class="table table-hover text-center border">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Título</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Data de Criação</th>
                        <th scope="col">Data de Conclusão</th>
                        <th scope="col">Status</th>
                        <th scope="col">Prioridade</th>
                        <th scope="col">Funcionário Responsável</th>
                        <th scope="col" colspan="2">Acão</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>

    <div class="text-center">
        <a href="painel.php"><button class="btn btn-secondary">Retornar ao painel principal</button></a>
        <a><button class="btn btn-success" onclick="cadastrarTarefa()">Cadastrar</button></a>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="cadastrarTarefa" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTarefaHeaderTitulo">Cadastrar tarefa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="modalTarefaDiv">
                        <label for="modalIdTarefa">ID</label>
                        <input class="form-control" type="text" id="modalIdTarefa" aria-label="" disabled>
                    </div>
                    <label for="modalTituloTarefa">Titulo</label>
                    <input class="form-control" type="text" id="modalTituloTarefa" aria-label="">
                    <label for="modalDescricaoTarefa">Descrição</label>
                    <input class="form-control" type="text" id="modalDescricaoTarefa" aria-label="">
                    <label for="modalDataCriacaoTarefa">Data da Criação</label>
                    <input class="form-control" type="date" id="modalDataCriacaoTarefa" aria-label="">
                    <label for="modalDataConclusaoTarefa">Data de Conclusão</label>
                    <input class="form-control" type="date" id="modalDataConclusaoTarefa" aria-label="">
                    <label for="modalStatusTarefa">Status</label>
                    <input class="form-control" type="text" id="modalStatusTarefa" aria-label="">
                    <label for="modalPrioridadeTarefa">Prioridade</label>
                    <input class="form-control" type="text" id="modalPrioridadeTarefa" aria-label="">
                    <label for="modalIdResponsavelTarefa">Responsável pela tarefa</label>
                    <input class="form-control" type="text" id="modalIdResponsavelTarefa" aria-label="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-success" id="modalCadastrarTarefa" onclick="salvarTarefa()">Cadastrar</button>
                    <button type="button" class="btn btn-success" id="modalAtualizarTarefa" onclick="">Atualizar</button>
                </div>
            </div>
        </div>
    </div>

</body>

</html>