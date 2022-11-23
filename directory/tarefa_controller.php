<?php

require("../directory/conexao.php");
require("../directory/tarefa_model.php");
require("../directory/tarefa_serive.php");
if(!isset($_SESSION)){
    session_start();
}

$acao = isset($_GET["acao"]) ? $_GET["acao"] : $acao;
if ($acao == "inserir") {
    $tarefa = new Tarefa();
    $tarefa->__set("tarefa", $_POST["tarefa"]);
    $tarefa->__set("id_user", $_SESSION["id"]);

    $conexao = new Conexao();

    $tarefaService = new TarefaService($tarefa, $conexao);
    $tarefaService->inserir();

    header("Location:  nova_tarefa.php?inclusao=1");
}else if ($acao == "recuperar") {
    $tarefa = new Tarefa();
    $conexao = new Conexao();
    $tarefaService = new TarefaService($tarefa, $conexao);
    $tarefas = $tarefaService->recuperar($_SESSION["id"]);
}else if($acao == "atualizar"){
    $tarefa = new Tarefa();
    $tarefa->__set("tarefa",$_POST["tarefa"]);
    $tarefa->__set("id",$_POST["id"]);
    $conexao = new Conexao();
    $tarefaService = new TarefaService($tarefa, $conexao);
    if($tarefaService->atualizar()){
        if(isset($_GET["pag"]) && $_GET["pag"]== "home" ){
            header("location: home.php");
        }else{
            header("Location: todas_tarefa.php");
        }

        
    }else{
        echo "Erro ao tentar enviar as alterações para banco de dados.";
    }
}elseif ($acao == "remover") {
    $tarefa = new Tarefa();
    $tarefa->__set("id",$_GET["id"]);
    $conexao = new Conexao();
    $tarefaService = new TarefaService($tarefa, $conexao);
    $tarefaService->remover();
    if(isset($_GET["pag"]) && $_GET["pag"]== "home" ){
        header("location: home.php");
    }else{
        header("Location: todas_tarefa.php");
    }

}else if($acao == "marcarRealizada"){
    $tarefa = new Tarefa();
    $tarefa->__set("id",$_GET["id"]);
    $tarefa->__set("id_status",2);
    $conexao = new Conexao();
    $tarefaService = new TarefaService($tarefa, $conexao);
    $tarefaService->marcarRealizada();
    if(isset($_GET["pag"]) && $_GET["pag"]== "home" ){
        header("location: home.php");
    }else{
        header("Location: todas_tarefa.php");
    }


}
?>