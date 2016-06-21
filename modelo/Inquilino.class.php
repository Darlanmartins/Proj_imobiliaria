<?php

class Inquilino{
    
    private $cpf;
    private $nome;
    private $email;
    private $sexo;
    private $telefone;
    private $endereco;
    private $cidade;
    private $bairro;
    private $estado;
       
    public function __get($key){
        return $this->$key;
    }
     
    public function __set($key, $value){
        $this->$key = $value;
    }
}
