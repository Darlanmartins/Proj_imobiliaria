<?php
require_once 'Conexao.class.php';
require_once __DIR__.'/../modelo/Imovel.class.php';

class ImovelDAO {
    private $pdo;
    
    public function __construct(){
        $conexao = new Conexao();
        $this->pdo = $conexao->getPDO();
    }
    
    public function inserir($obj){ 
            $parametros = array(
            ':matricula'=> $obj->matricula,
            ':categoria'=> $obj->categoria,
            ':tipo'=> $obj->tipo,
            ':endereco'=> $obj->endereco,
            ':bairro'=> $obj->bairro,
            ':cidade'=> $obj->cidade,
            ':caracteristicas'=> $obj->caracteristicas,
            ':proprietario'=> $obj->proprietario->cpf
            );
 
        $sql = "INSERT INTO imovel (matricula, categoria, tipo, endereco, bairro, cidade, caracteristicas, proprietario)"
                . "VALUES (:matricula, :categoria, :tipo, :endereco, :bairro, :cidade, :caracteristicas, :proprietario)";
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
            ':categoria'=> $obj->categoria,
            ':tipo'=> $obj->tipo,
            ':endereco'=> $obj->endereco,
            ':bairro'=> $obj->bairro,
            ':cidade'=> $obj->cidade,
            ':caracteristicas'=> $obj->caracteristicas,
            ':proprietario'=> $obj->proprietario->cpf
        );
        
        $sql = "UPDATE imovel SET "
                . "categoria = :categoria, "
                . "tipo = :tipo, "
                . "endereco = :endereco, " 
                . "bairro = :bairro, "
                . "cidade = :cidade, " 
                . "caracteristicas = :caracteristicas, "
                . "proprietario = :proprietario " 
                . "WHERE matricula = :matricula ";
        $retorno = $this->pdo->prepare($sql);
        $retorno->execute($parametros);
        
        return $retorno->rowCount();
    }
    
    public function buscarPorChavePrimaria($chavePrimaria){
         
        $sql="SELECT  imovel.matricula, 
	imovel.categoria, 
	imovel.tipo,
	imovel.endereco,
	imovel.bairro,
        imovel.cidade,
        imovel.caracteristicas,
        imovel.proprietario,
	proprietario.nome AS nomeproprietario 
    FROM imovel, proprietario
    WHERE imovel.proprietario = proprietario.cpf
    AND imovel.matricula = :matricula;
    ";
        
        $retorno = $this->pdo->prepare($sql);
        $retorno->bindParam(":matricula", $chavePrimaria);
        $retorno->execute();
     
        if($obj=$retorno->fetchObject()){
           
           $objCompleto = new Imovel();
           $objCompleto->matricula = $obj->matricula;
           $objCompleto->categoria = $obj->categoria;
           $objCompleto->tipo = $obj->tipo;
           $objCompleto->endereco = $obj->endereco;
           $objCompleto->bairro = $obj->bairro;
           $objCompleto->cidade = $obj->cidade;
           $objCompleto->caracteristicas = $obj->caracteristicas;
           $objCompleto->proprietario->cpf = $obj->proprietario;
           $objCompleto->proprietario->nome = $obj->nomeproprietario;  
           return $objCompleto;
        }
        else{
            return null;
        }
    }
     
    public function listar($filtro=null,$ordenarPor=null){
        $parametros = array();
        $sql = "SELECT * FROM imovel";
        if(isset($filtro)){
            $sql .= " WHERE endereco ilike :filtro OR matricula ilike :filtro";
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

