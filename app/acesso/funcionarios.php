<!DOCTYPE html>
<html lang="pt-br">

<?php include_once '../layout/head.php' ?>
<?php include_once '../../config.php' ?>

<body>

    <?php include_once '../layout/menu.php' ?>
    <script defer src="../../extensoes/scripts/funcionarios.js"></script>

    <div class="container">
        <div class="table-responsive">
            <table class="table table-hover text-center border">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Email</th>
                        <th scope="col">Telefone</th>
                        <th scope="col">Cargo</th>
                        <th scope="col">Salário</th>
                        <th scope="col">Data da Contratação</th>
                        <th scope="col" colspan="2">Acão</th>
                    </tr>
                </thead>
                <tbody id="listarDadosFuncionarios">
                </tbody>
            </table>
        </div>
    </div>

    <div class="text-center">
        <a><button class="btn btn-success" onclick="exibirModal()">Cadastrar</button></a>
        <a href="painel.php"><button class="btn btn-secondary">Retornar ao painel principal</button></a>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="cadastrarFuncionario" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalFuncionarioHeaderTitulo">Cadastrar funcionário</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label for="modalNomeFuncionario">Nome</label>
                    <input class="form-control" type="text" id="modalNomeFuncionario" aria-label="">
                    <label for="modalEmailFuncionario">Email</label>
                    <input class="form-control" type="text" id="modalEmailFuncionario" aria-label="">
                    <label for="ModalTelefoneFuncionario">Telefone</label>
                    <input class="form-control" type="text" id="ModalTelefoneFuncionario" aria-label="">
                    <label for="modalCargoFuncionario">Cargo</label>
                    <input class="form-control" type="text" id="modalCargoFuncionario" aria-label="">
                    <label for="modalSalarioFuncionario">Salário</label>
                    <input class="form-control" type="text" id="modalSalarioFuncionario" aria-label="">
                    <label for="modalDataContratacaoFuncionario">Data da Contratação</label>
                    <input class="form-control" type="date" id="modalDataContratacaoFuncionario" aria-label="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-success" id="modalCadastrarFuncionario" onclick="cadastrarFuncionario()">Cadastrar</button>
                </div>
            </div>
        </div>
    </div>

</body>

</html>