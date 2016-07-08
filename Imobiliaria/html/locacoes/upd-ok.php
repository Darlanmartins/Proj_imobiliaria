<?php
    if(!isset($_POST["txtContrato"]) || !isset($_POST["txtData"])){
        header("location:index.php");
    }
  
    require_once "../../modelo/Usuario.class.php";
    require_once "../../dao/UsuarioDAO.class.php";

    $obj = new Locacoes();
    $obj->contrato = $_POST["txtContrato"];
    $obj->data = $_POST["txtData"];
    $obj->vigencia = $_POST["txtVigencia"];
    $obj->valor = $_POST["txtValor"];
    $obj->imovel->matricula = $_POST["selImovel"];
    $obj->inquilino->cpf = $_POST["selInquilino"];
    
    $dao = new LocacoesDAO();

    $retorno = $dao->alterar($obj);
    if($retorno > 0){
        $msg = "Registro alterado com sucesso";
    }
    else{
        $msg = "Não foi possível alterar o registro";
    }

    include "../cabecalho.php";
?>
        <div>
            <h1 class="centro">Alteração de Locações</h1>
            <div>
                <h3><?php echo $msg; ?></h3>
                <div>
                    <a href="index.php"><input type="submit" value="Voltar"></a>
                </div>
            </div>
        </div>
    </body>
</html>










