<?php

class Corretor{
    
    private $creci;
    private $nome;
    private $telefone;
 
    public function __get($key){
        return $this->$key;
    }
     
    public function __set($key, $value){
        $this->$key = $value;
    }
}
