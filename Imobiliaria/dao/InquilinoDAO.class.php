<?php
require_once 'Conexao.class.php';

class InquilinoDAO {
    private $pdo;
    
    public function __construct(){
        $conexao = new Conexao();
        $this->pdo = $conexao->getPDO();
    }
    
    public function inserir($obj){ 
            $parametros = array(
            ':cpf'=> $obj->cpf,
            ':nome'=> $obj->nome,
            ':email'=> $obj->email,
            ':sexo'=> $obj->sexo,
            ':telefone'=> $obj->telefone,
            ':endereco'=> $obj->endereco,
            ':cidade'=> $obj->cidade,
            ':bairro'=> $obj->bairro,
            ':estado'=> $obj->estado
        );
 
        $sql = "INSERT INTO inquilino (cpf, nome, email, sexo, telefone, endereco, cidade, bairro, estado)"
                . "VALUES (:cpf, :nome, :email, :sexo, :telefone, :endereco, :cidade, :bairro, :estado)";
        $retorno = $this->pdo->prepare($sql);
        $retorno->execute($parametros);
        
        return $retorno->rowCount();
    }
    
    public function excluir($chavePrimaria){
        $sql = "DELETE FROM inquilino WHERE cpf = :cpf";
        $retorno = $this->pdo->prepare($sql);
        $retorno->bindParam(":cpf", $chavePrimaria);
        $retorno->execute();
        
        return $retorno->rowCount();
    }
    
    public function alterar($obj){
        $parametros = array(
            ':cpf'=> $obj->cpf,
            ':nome'=> $obj->nome,
            ':email'=> $obj->email,
            ':sexo'=> $obj->sexo,
            ':telefone'=> $obj->telefone,
            ':endereco'=> $obj->endereco,
            ':cidade'=> $obj->cidade,
            ':bairro'=> $obj->bairro,
            ':estado'=> $obj->estado
        );
        
        $sql = "UPDATE inquilino SET "
                . "nome = :nome, "
                . "email = :email, "
                . "sexo = :sexo, "
                . "telefone = :telefone, " 
                . "endereco = :endereco, "
                . "cidade = :cidade, " 
                . "bairro = :bairro, "
                . "estado = :estado " 
                . " WHERE cpf = :cpf";
        $retorno = $this->pdo->prepare($sql);
        $retorno->execute($parametros);
        
        return $retorno->rowCount();
    }
    
    public function buscarPorChavePrimaria($chavePrimaria){
        $sql=("SELECT * FROM inquilino WHERE cpf = :cpf");
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
        $sql = "SELECT * FROM inquilino";
        if(isset($filtro)){
            $sql .= " WHERE nome ilike :filtro OR cpf ilike :filtro";
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