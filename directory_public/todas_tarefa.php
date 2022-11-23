<?php require_once "valida_acesso.php"; ?>
<?php
$acao = "recuperar";
require "tarefa_controller.php";
?>

<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tasks Now</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="icon" href="./img/logo.png">
</head>

<body class="container-fluid">
    <div class="row  pagina">
        <!-- MENU MOBILE-->
        <nav class="navbar navbar-dark d-lg-none  fixed-top">
            <div class="container-fluid">
                <a class="text-decoration-none  logo" href="./home.php"><img src="./img/logo.png" alt="logo" width="40px"><span class="display-6 ">Tasks Now </span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
                    <div class="offcanvas-header">
                        <a class="text-decoration-none  logo" href="./home.php"><img src="./img/logo.png" alt="logo" width="40px"><span class="display-6 ">Tasks Now </span>
                        </a>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body d-flex">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                            <a href="#" class="nav-link disabled user-name mb-5"><i class="bi bi-person-square"></i><?= $_SESSION["user_nome"]; ?></a>
                            <a class="nav-link" aria-current="page" href="./home.php"><i class="bi bi-hourglass-split"></i>Tarefas
                                Pendentes</a>
                            <a class="nav-link" href="./nova_tarefa.php"><i class="bi bi-file-earmark-plus"></i>Nova Tarefa</a>
                            <a class="nav-link active" href="./todas_tarefa.php"><i class="bi bi-card-checklist"></i>Todas Tarefas</a>
                            <a class="nav-link mt-auto" href="./logoff.php"><i class="bi bi-x-square"></i>Sair</a>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <!-- MENU SIDEBAR-->
        <header class="d-none d-lg-inline col-lg-2 shadow">
            <nav class="nav flex-column">
                <a id="logo-side-bar" class="text-decoration-none  logo" href="./home.php"><img src="./img/logo.png" alt="logo" width="40px"><span class="display-6 ">Tasks Now </span>
                </a>
                <a href="#" class="nav-link disabled user-name mb-5"><i class="bi bi-person-square"></i><?= $_SESSION["user_nome"]; ?></a>
                <a class="nav-link" aria-current="page" href="./home.php"><i class="bi bi-hourglass-split"></i>Tarefas
                    Pendentes</a>
                <a class="nav-link" href="./nova_tarefa.php"><i class="bi bi-file-earmark-plus"></i>Nova Tarefa</a>
                <a class="nav-link active" href="./todas_tarefa.php"><i class="bi bi-card-checklist"></i>Todas Tarefas</a>
                <a class="nav-link mt-auto" href="./logoff.php"><i class="bi bi-x-square"></i>Sair</a>
            </nav>
        </header>
        <!--Main $data = explode(" ",$tarefa->data_cadastrado); $data[0]-->
        <main class="col-12 col-lg-10">
            <div id="espaço-menu-mobile" class="d-lg-none"></div>
            <div class="conteudo">

                <h4 class=" col-7 col-lg-8">Todas tarefas</h4>


                <hr />

                <?php foreach ($tarefas as $indice => $tarefa) {  ?>
                    <div class="row mb-3 d-flex align-items-center tarefa">
                        <div class="col-sm-5 text-center">
                            <b id="tarefa_<?= $tarefa->id ?>"><?= $tarefa->tarefa ?></b>
                            <span class="badge bg-<?php echo $tarefa->status == "pendente" ? "warning" : "success" ?> ms-1"><?= $tarefa->status ?></span>
                        </div>
                        <div class="col-sm-4 text-center">
                            <span class="text-nowrap"><?php $data = new DateTime($tarefa->data_cadastrado);
                                                        echo $data->format("d/m/Y"); ?></span>
                        </div>
                        <div class="col-sm-3 mt-2 d-flex justify-content-between">

                            <i class="bi bi-trash-fill text-danger" onclick="remover(<?= $tarefa->id ?>)"></i>
                            <?php if ($tarefa->status == "pendente") { ?>
                                <i class="bi bi-pencil-square text-info" onclick="editar(<?= $tarefa->id ?>,'<?= $tarefa->tarefa ?>')"></i>
                                <i class="bi bi-check2-square text-success" onclick="tarefaRealizada(<?= $tarefa->id ?>)"></i>
                            <?php } ?>
                        </div>
                    </div>
                    <hr>
                <?php } ?>

            </div>
        </main>
    </div>
    <!-- Modal -->
    <div id="modal-apagar" class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex flex-column  align-items-center">
                    <i class="bi bi-x-octagon-fill text-danger"></i>
                    <p>Deseja apagar esta tarefa ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-danger" id="btn-apagar">Apagar</button>
                </div>
            </div>
        </div>
    </div>
    <script src="todas_tarefa.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
</body>

</html>