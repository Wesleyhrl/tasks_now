<?php 
    
    class LoginService{
        private $conexao;
        private $user;

        function __construct(Conexao $conexao ,User $user ){
            $this->conexao = $conexao->conectar();
            $this->user = $user;
        }
        function validarLogin(){
            $query = "SELECT * FROM tb_usuarios WHERE email = :email AND senha = :senha";
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(":email",$this->user->__get("email"));
            $stmt->bindValue(":senha",$this->user->__get("senha"));  
            $stmt->execute();
            $retorno = $stmt->fetch(PDO::FETCH_OBJ);
            if($retorno == ""){
                $this->user->__set("valido", false);
            }else{
                $this->user->__set("id", $retorno->id);
                $this->user->__set("nome", $retorno->nome);
                $this->user->__set("email", $retorno->email);
                $this->user->__set("senha", $retorno->senha);
                $this->user->__set("valido", true);
            }
            return $this->user;
        }
        function criarLogin(){
            $query = "insert into tb_usuarios(nome,email,senha)values(:nome,:email,:senha)";
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(":nome",$this->user->__get("nome"));
            $stmt->bindValue(":email",$this->user->__get("email"));
            $stmt->bindValue(":senha",$this->user->__get("senha"));
            return $stmt->execute();
        }
    }
