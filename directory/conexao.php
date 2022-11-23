<?php
 class Conexao{
    private $host = "localhost";
    private $dbname = "app_tasks_now";
    private $user = "root";
    private $pass = "";
    public function conectar(){
        try{
            $db = new PDO("mysql:host=$this->host;dbname=$this->dbname",$this->user,$this->pass);
            return $db;
        }catch(PDOException $e){
            echo $e;
        }
    }
 }
?>