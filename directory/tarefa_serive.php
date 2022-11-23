<?php
class TarefaService{
    private $tarefa;
    private $conexao;

    public function __construct(Tarefa $tarefa, Conexao $conexao)
    {
        $this->tarefa = $tarefa;
        $this->conexao = $conexao->conectar();
    }

    public function inserir(){
        $query = "insert into tb_tarefas(tarefa,id_user)values(:tarefa,:id_user)";
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(":tarefa",$this->tarefa->__get("tarefa")); 
        $stmt->bindValue(":id_user",$this->tarefa->__get("id_user")); 
        $stmt->execute();
    }
    public function recuperar($id_user){
        $query = "select 
        t.id, s.status, t.tarefa, t.data_cadastrado , t.id_user
        from  
        tb_tarefas as t 
        left join tb_status as s on (t.id_status = s.id) where id_user = :id_user";
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(":id_user",$id_user); 
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    public function atualizar(){
        $query = "update tb_tarefas set tarefa = :tarefa where id = :id";
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(":tarefa", $this->tarefa->__get("tarefa"));
        $stmt->bindValue(":id", $this->tarefa->__get("id"));
        return $stmt->execute();
    }
    public function remover(){
        $query = "delete from tb_tarefas where id = :id";
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(":id", $this->tarefa->__get("id"));
        $stmt->execute();
    }
    public function marcarRealizada(){
        $query = "update tb_tarefas set id_status = :status where id = :id";
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(":status", $this->tarefa->__get("id_status"));
        $stmt->bindValue(":id", $this->tarefa->__get("id"));
        $stmt->execute();
    }
}
?>