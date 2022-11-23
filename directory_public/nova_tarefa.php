<?php require_once "valida_acesso.php"; ?>
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
                            <a class="nav-link active" href="./nova_tarefa.php"><i class="bi bi-file-earmark-plus"></i>Nova Tarefa</a>
                            <a class="nav-link" href="./todas_tarefa.php"><i class="bi bi-card-checklist"></i>Todas Tarefas</a>
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

                <a class="nav-link " aria-current="page" href="./home.php"><i class="bi bi-hourglass-split"></i>Tarefas
                    Pendentes</a>
                <a class="nav-link active" href="./nova_tarefa.php"><i class="bi bi-file-earmark-plus"></i>Nova Tarefa</a>
                <a class="nav-link" href="./todas_tarefa.php"><i class="bi bi-card-checklist"></i>Todas Tarefas</a>
                <a class="nav-link mt-auto" href="./logoff.php"><i class="bi bi-x-square"></i>Sair</a>
            </nav>
        </header>
        <!--Main-->
        <main class="col-12 col-lg-10">
            <div id="espaço-menu-mobile" class="d-lg-none"></div>
            <div class="conteudo">
                <h4>Nova tarefa</h4>
                <hr />

                <form method="POST" action="tarefa_controller.php?acao=inserir" autocomplete="off">
                    <div class="form-group">
                        <label>Descrição da tarefa:</label>
                        <input type="text" name="tarefa" class="form-control" placeholder="Exemplo: Lavar o carro" required>
                    </div>

                    <button class="btn btn-primary">Cadastrar</button>
                </form>
            </div>
            <?php if (isset($_GET["inclusao"]) && $_GET["inclusao"] == 1) { ?>
                <div id="alert-nova-tarefa" class="alert alert-success d-flex align-items-center mx-auto" role="alert">
                    <i class="bi bi-check-circle me-2"> </i>
                    <div> Tarefa Salva com sucesso.
                    </div>
                </div>
            <?php } ?>
        </main>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>