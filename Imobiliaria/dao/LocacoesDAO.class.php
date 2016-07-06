<?php
require_once 'Conexao.class.php';
require_once __DIR__.'/../modelo/Locacoes.class.php';

class LocacoesDAO {
    private $pdo;
    
    public function __construct(){
        $conexao = new Conexao();
        $this->pdo = $conexao->getPDO();
    }
    
    public function inserir($obj){ 
            $parametros = array(
            ':contrato'=> $obj->contrato,
            ':data'=> $obj->data,
            ':vigencia'=> $obj->vigencia,
            ':valor'=> $obj->valor,
            ':imovel'=> $obj->imovel->matricula,
            ':inquilino'=> $obj->inquilino->cpf
        );
 
        $sql = "INSERT INTO locacoes (contrato, data, vigencia, valor, imovel, inquilino)"
                . "VALUES (:contrato, :data, :vigencia, :valor, :imovel, :inquilino)";
        $retorno = $this->pdo->prepare($sql);
        $retorno->execute($parametros);
        
        return $retorno->rowCount();
    }
    
    public function excluir($chavePrimaria){
        $sql = "DELETE FROM locacoes WHERE contrato = :contrato";
        $retorno = $this->pdo->prepare($sql);
        $retorno->bindParam(":contrato", $chavePrimaria);
        $retorno->execute();
        
        return $retorno->rowCount();
    }
    
    public function alterar($obj){
        $parametros = array(
            ':contrato'=> $obj->contrato,
            ':data'=> $obj->data,
            ':vigencia'=> $obj->vigencia,
            ':valor'=> $obj->valor,
            ':imovel'=> $obj->imovel->matricula,
            ':inquilino'=> $obj->inquilino->cpf
        );
        
        $sql = "UPDATE locacoes SET "
                . "data = :data, "
                . "vigencia = :vigencia, "
                . "valor = :valor, " 
                . "imovel = :imovel, "
                . "inquilino = :inquilino " 
                . "WHERE contrato = :contrato ";
        $retorno = $this->pdo->prepare($sql);
        $retorno->execute($parametros);
        
        return $retorno->rowCount();
    }
    
    public function buscarPorChavePrimaria($chavePrimaria){
        $sql="SELECT  locacoes.contrato, 
	locacoes.data, 
	locacoes.vigencia,
	locacoes.valor,
	locacoes.imovel,
        locacoes.inquilino,
	imovel.endereco AS enderecoimovel, 
	inquilino.nome AS nomeinquilino
    FROM locacoes, imovel, inquilino
    WHERE locacoes.imovel = imovel.matricula
    AND locacoes.inquilino = inquilino.cpf
    AND locacoes.contrato = :contrato;
    ";
        
        $retorno = $this->pdo->prepare($sql);
        $retorno->bindParam(":contrato", $chavePrimaria);
        $retorno->execute();
    
        if($obj=$retorno->fetchObject())
        {
            $objCompleto = new Locacoes();
            $objCompleto->contrato = $obj->contrato;
            $objCompleto->data = $obj->data;
            $objCompleto->vigencia = $obj->vigencia;
            $objCompleto->valor = $obj->valor;
            $objCompleto->imovel->matricula = $obj->imovel;
            $objCompleto->imovel->endereco = $obj->enderecoimovel;
            $objCompleto->inquilino->cpf = $obj->inquilino;
            $objCompleto->inquilino->nome = $obj->nomeinquilino;
            
            return $objCompleto;
        }
        else
        {
            return null;
        }
    }
     
    public function listar($filtro=null,$ordenarPor=null){
        $parametros = array();
        $sql = "SELECT * FROM locacoes";
        if(isset($filtro)){
            $sql .= " WHERE data ilike :filtro OR contrato ilike :filtro";
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

