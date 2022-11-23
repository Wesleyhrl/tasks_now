<?php 
class Tarefa{
    private $id;
    private $status;
    private $tarefa;
    private $data_cadastro;
    private $id_user;
    
    public function __set($name, $value)
    {
        $this->$name = $value;
    }
    public function __get($name)
    {
        return $this->$name;
    }

}
