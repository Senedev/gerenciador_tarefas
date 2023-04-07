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
        <a><button class="btn btn-success" onclick="">Cadastrar</button></a>
        <a href="painel.php"><button class="btn btn-secondary">Retornar ao painel principal</button></a>
    </div>

</body>

</html>