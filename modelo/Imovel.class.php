<?php

class Imovel{
    
    private $matricula;
    private $caracteristicas;
    private $endereco;
    
    public function __get($key){
        return $this->$key;
    }
     
    public function __set($key, $value){
        $this->$key = $value;
    }
}
