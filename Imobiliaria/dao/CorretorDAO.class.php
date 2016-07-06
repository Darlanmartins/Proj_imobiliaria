<?php
require_once 'Conexao.class.php';

class CorretorDAO {
    private $pdo;
    
    public function __construct(){
        $conexao = new Conexao();
        $this->pdo = $conexao->getPDO();
    }
    
    public function inserir($obj){ 
            $parametros = array(
            ':creci'=> $obj->creci,
            ':nome'=> $obj->nome,
            ':telefone'=> $obj->telefone
        );
 
        $sql = "INSERT INTO corretor (creci, nome, telefone)"
                . "VALUES (:creci, :nome, :telefone)";
        $retorno = $this->pdo->prepare($sql);
        $retorno->execute($parametros);
        
        return $retorno->rowCount();
    }
    
    public function excluir($chavePrimaria){
        $sql = "DELETE FROM corretor WHERE creci = :creci";
        $retorno = $this->pdo->prepare($sql);
        $retorno->bindParam(":creci", $chavePrimaria);
        $retorno->execute();
        
        return $retorno->rowCount();
    }
    
    public function alterar($obj){
        $parametros = array(
            ':creci'=> $obj->creci,
            ':nome'=> $obj->nome,
            ':telefone'=> $obj->telefone
        );
        
        $sql = "UPDATE corretor SET "
                . "nome = :nome, "
                . "telefone = :telefone " 
                . " WHERE creci = :creci";
        $retorno = $this->pdo->prepare($sql);
        $retorno->execute($parametros);
        
        return $retorno->rowCount();
    }
    
    public function buscarPorChavePrimaria($chavePrimaria){
        $sql=("SELECT * FROM corretor WHERE creci = :creci");
        $retorno = $this->pdo->prepare($sql);
        $retorno->bindParam(":creci", $chavePrimaria);
        $retorno->execute();
       
        if($obj=$retorno->fetchObject()){
            return $obj;
        }
        else{
            return null;
        }
    }
    
    public function listar($filtro=null,$ordenarPor=null){
        $parametros = array();
        $sql = "SELECT * FROM corretor";
        if(isset($filtro)){
            $sql .= " WHERE nome ilike :filtro OR creci ilike :filtro";
            $parametros[":filtro"] = "%".$filtro."%";
        }
        $lista = array();
        $query = $this->pdo->prepare($sql);
        
        $query->execute($parametros);
        
        while ($obj = $query->fetchObject()){
            $lista[] = $obj;
        }
        
        return $lista;
    }
}

