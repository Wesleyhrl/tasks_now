<?php
require("../directory/conexao.php");
require("../directory/login_service.php");
require("../directory/user_model.php");
session_start();
if (isset($_GET) && $_GET["login"] == "criar") {
    $user = new User();
    $user->__set("nome", $_POST["nome"]);
    $user->__set("email", $_POST["email"]);
    $user->__set("senha", $_POST["senha"]);
    $conexao = new Conexao();
    $login = new LoginService($conexao, $user);
    if($login->criarLogin()){
        header("Location: index.php?login=criado");
    }else{
        header("Location: index.php?login=erro3");
    }
} else {
    $user = new User();
    $user->__set("email", $_POST["email"]);
    $user->__set("senha", $_POST["senha"]);

    $conexao = new Conexao();

    $login = new LoginService($conexao, $user);
    $user = $login->validarLogin();

    if ($user->__get("valido")) {
        $_SESSION["autenticado"] = "SIM";
        $_SESSION["id"] = $user->__get("id");
        $_SESSION["user_nome"] = $user->__get("nome");
        header("Location: home.php");
    } else {
        $_SESSION["autenticado"] = "NAO";
        header("Location: index.php?login=erro");
    }
}
