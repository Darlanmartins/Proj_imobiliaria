<?php

class Proprietario{
    
    private $cpf;
    private $nome;
    private $telefone;
    private $endereco;

    public function __get($key){
        return $this->$key;
    }
     
    public function __set($key, $value){
        $this->$key = $value;
    }

}
