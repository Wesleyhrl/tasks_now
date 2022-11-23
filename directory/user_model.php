<?php
class User{
    private $id;
    private $nome;
    private $email;
    private $senha;
    private $valido;
    
    public function __set($name, $value)
    {
        $this->$name = $value;
    }
    public function __get($name)
    {
        return $this->$name;
    }

}
?>