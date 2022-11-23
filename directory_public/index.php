<?php
session_start();
if (isset($_SESSION["autenticado"]) && $_SESSION["autenticado"] == "SIM") {
  header("Location: home.php");
}
?>
<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tasks Now</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
  <link rel="stylesheet" href="./css/index.css">
  <link rel="icon" href="./img/logo.png">
</head>

<body class="container-fluid">
  <main class="row ">
    <div class="col-12 col-lg-6 intro d-flex flex-column  align-items-center">
      <h1 class="display-3 "><img id="logo" src="./img/logo-roxa.png" alt="logo">Tasks Now </h1>
      <img id="img-logo" src="./img/login-fundo2.jpg" alt="" class="img-fluid">
    </div>
    <div class="col-12 col-lg-6 login d-flex justify-content-center align-items-center">
      <form method="POST" action="validar_login.php">
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email</label>
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" onkeyup="limparAlerta()" required>
          <div id="emailHelp" class="form-text">Nunca compartilharemos seu e-mail com ninguém.</div>
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Senha</label>
          <input type="password" class="form-control" id="exampleInputPassword1" name="senha" onkeyup="limparAlerta()" required>
        </div>
        <div class="mb-2 form-check">
          <div>
            <a class="btn btn-link cadastrar" onclick="cadastrar()">Cadastra-se</a>
          </div>
          <?php
          if (isset($_GET["login"]) && $_GET["login"] == "erro") {

          ?>
            <div class="text-danger text-center">Usuário ou senha inválido(s)</div>
          <?php
          }
          ?>
          <?php
          if (isset($_GET["login"]) && $_GET["login"] == "erro2") {

          ?>
            <div class="text-danger text-center">Faça login para acessar o sistema</div>
          <?php
          }
          ?>
          <?php
          if (isset($_GET["login"]) && $_GET["login"] == "erro3") {

          ?>
            <div class="text-danger text-center">Erro ao criar a conta</div>
          <?php
          }
          ?>
          <?php
          if (isset($_GET["login"]) && $_GET["login"] == "criado") {

          ?>
            <div class="text-success text-center">Conta criada com sucesso, Por favor logar para usar...</div>
          <?php
          }
          ?>
        </div>
        <div class="area-btn d-flex justify-content-center">
          <button type="submit" class="btn btn-larger rounded-pill">Entrar</button>
        </div>
      </form>
    </div>

  </main>
  <!-- Modal -->
  <div id="modal-cadastrar" class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Cadastra-se</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
        </div>
        <div class="modal-body">

          <form class="row g-3" method="POST" action="validar_login.php?login=criar">
            <div class="col-md-4">
              <label for="validationDefault01" class="form-label">Nome</label>
              <input name="nome" type="text" class="form-control" id="validationDefault01" placeholder="Arthur Morgan" required>
            </div>
            <div class="col-md-8">
              <label for="validationDefaultUsername" class="form-label">Email</label>
              <div class="input-group">
                <input name="email" type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" required>
              </div>
            </div>
            <div class="col-md-6">
              <label for="validationDefault03" class="form-label">Senha</label>
              <input name="senha" type="password" class="form-control" id="inputPassword2" placeholder="Password" required>
            </div>
            <div class="col-12">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
                <label class="form-check-label" for="invalidCheck2">
                 A conta pode ser criada com informações aleatórias, nenhum dado será validado. A Criação é para fins de testes.
                </label>
              </div>
            </div>
            <div class="col-12 text-center">
              <button class="btn btn-primary rounded-pill" type="submit">Criar conta</button>
            </div>
          </form>

        </div>
        
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
  <script src="index.js"></script>
</body>

</html>