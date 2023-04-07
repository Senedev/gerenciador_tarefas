<!DOCTYPE html>
<html lang="pt-br">

<?php include_once '../layout/head.php' ?>
<?php include_once '../../config.php' ?>

<body>

    <?php include_once '../layout/menu.php' ?>
    <?php include_once '../../extensoes/scripts/funcionarios.js' ?>

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
                <tbody>

                </tbody>
            </table>
        </div>
    </div>

</body>

</html>