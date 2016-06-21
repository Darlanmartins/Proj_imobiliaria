<?php
require 'Conexao.class.php';

class ImovelDAO {
    private $pdo;
    
    public function __construct(){
        $conexao = new Conexao();
        $this->pdo = $conexao->getPDO();
    }
    
    public function inserir($obj){
        $parametros = array(
            ':matricula' => $obj->matricula,
            ':caractaristicas' => $obj->caracteristicas,
            ':endereco' => $obj->endereco
        );
     
        $sql = "INSERT INTO imovel (matricula, caracteristicas, endereco)"
                . "VALUES (:matricula, :caracteristicas, :endereco)";
        $retorno = $this->pdo->prepare($sql);
        $retorno->execute($parametros);
        
        return $retorno->rowCount();
    }
    
    public function excluir($chavePrimaria){
        $sql = "DELETE FROM imovel WHERE matricula = :matricula";
        $retorno = $this->pdo->prepare($sql);
        $retorno->bindParam(":matricula", $chavePrimaria);
        $retorno->execute();
        
        return $retorno->rowCount();
    }
    
    public function alterar($obj){
        $parametros = array(
            ':matricula'=> $obj->matricula,
            ':caracteristicas'=> $obj->caracteristicas,
            ':endereco'=> $obj->endereco
        );
        
        $sql = "UPDATE imovel SET "
                . "caracteristicas = :caracteristicas, "
                . "endereco = :endereco "
                . " WHERE matricula = :matricula";
        $retorno = $this->pdo->prepare($sql);
        $retorno->execute($parametros);
        
        return $retorno->rowCount();
    }
    
    public function buscarPorChavePrimaria($chavePrimaria){
        $sql=("SELECT * FROM imovel WHERE matricula = :matricula");
        $retorno = $this->pdo->prepare($sql);
        $retorno->bindParam(":matricula", $chavePrimaria);
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
        $sql = "SELECT * FROM imovel";
        if(isset($filtro)){
            $sql .= "WHERE endereco ilike :filtro OR matricula ilike :filtro";
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