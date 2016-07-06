<?php
class Usuario {
    private $usuario;
    private $senha;
       
    public function __construct() {   
    }

    public function __get($key) {
        return $this->$key;
    }
    
    public function __set($key, $value) {
        $this->$key = $value;
    }
}
