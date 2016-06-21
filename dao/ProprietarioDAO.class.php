<?php
require 'Conexao.class.php';

class ProprietarioDAO {
    private $pdo;
    
    public function __construct(){
        
        $conexao = new Conexao();
        $this->pdo = $conexao->getPDO();
    }
    
    public function inserir($obj){
        $parametros = array(
            ':cpf'=> $obj->cpf,
            ':nome'=> $obj->nome,
            ':endereco'=> $obj->endereco,
            ':telefone'=> $obj->telefone
        );
        
        $sql = "INSERT INTO proprietario (cpf, nome, endereco, telefone)"
                . "VALUES (:cpf, :nome, :endereco, :telefone)";
        $retorno = $this->pdo->prepare($sql);
        $retorno->execute($parametros);
        
        return $retorno->rowCount();
    }
    
    public function excluir($chavePrimaria){
        $sql = "DELETE FROM proprietario WHERE cpf = :cpf";
        $retorno = $this->pdo->prepare($sql);
        $retorno->bindParam(":cpf", $chavePrimaria);
        $retorno->execute();
        
        return $retorno->rowCount();
    }
    
    public function alterar($obj){
        $parametros = array(
            ':cpf'=> $obj->cpf,
            ':nome'=> $obj->nome,
            ':endereco'=> $obj->endereco,
            ':telefone'=> $obj->telefone
        );
        
        $sql = "UPDATE proprietario SET "
                . "nome = :nome, "
                . "endereco = :endereco, "
                . "telefone = :telefone "
                . " WHERE cpf = :cpf";
        $retorno = $this->pdo->prepare($sql);
        $retorno->execute($parametros);
        
        return $retorno->rowCount();
    }
    
    public function buscarPorChavePrimaria($chavePrimaria){
        $sql=("SELECT * FROM proprietario WHERE cpf = :cpf");
        $retorno = $this->pdo->prepare($sql);
        $retorno->bindParam(":cpf", $chavePrimaria);
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
        $sql = "SELECT * FROM proprietario";
        if(isset($filtro)){
            $sql .= "WHERE nome ilike :filtro OR cpf ilike :filtro";
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