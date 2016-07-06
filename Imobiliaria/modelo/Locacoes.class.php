<?php

require_once __DIR__.'/Imovel.class.php';
require_once __DIR__.'/Inquilino.class.php';

class Locacoes{
    
    private $contrato;
    private $data;
    private $vigencia;
    private $valor;
    private $imovel;
    private $inquilino;
    
    public function __construct(){
    $this->imovel = new Imovel();
    $this->inquilino = new Inquilino();
    }   
     
    public function __get($key){
        return $this->$key;
    }
     
    public function __set($key, $value){
        $this->$key = $value;
    }
}
