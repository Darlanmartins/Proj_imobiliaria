<?php
require_once  __DIR__.'/Proprietario.class.php';

class Imovel{
    
    private $matricula;
    private $categoria;
    private $tipo;
    private $endereco;
    private $bairro;
    private $cidade;
    private $caracteristicas;
    private $proprietario;
    
    public function __construct(){
    $this->proprietario = new Proprietario();
    }   
     
    public function __get($key){
        return $this->$key;
    }
     
    public function __set($key, $value){
        $this->$key = $value;
    }
}

