<?php
require_once 'Conexao.class.php';
class UsuarioDAO {
    
    private $pdo;

    public function __construct() {
        $conexao = new Conexao();
        $this->pdo = $conexao->getPDO();
    }
    
    public function buscarPorUsuario($usuario){
        $sql=("SELECT * FROM login WHERE usuario = :usuario");
        $retorno = $this->pdo->prepare($sql);
        $retorno->bindParam(":usuario", $usuario);
        $retorno->execute();
       
        if($obj=$retorno->fetchObject()){
            return $obj;
        }
        else{
            return null;
        }
    }
}