<?php
    if(!isset($_GET["contrato"])){
        header("location:index.php");
    }

    $contrato = $_GET["contrato"];
    
    require_once '../../dao/LocacoesDAO.class.php';
    
    $dao = new LocacoesDAO();
    
    $retorno = $dao->excluir($contrato);
    
    if($retorno > 0){
        $msg = "Registro excluído com sucesso";
    }
    else{
        $msg = "Não foi possível excluir o registro. Verifique dependências";
    }

    include "../cabecalho.php";
    
?>
        <div>
            <h1 class="centro">Exclusão de Locações</h1>
            <div>
                <h3><?php echo $msg; ?></h3>
                <div>
                    <a href="index.php">Voltar</a>
                </div>
            </div>
        </div>
    </body>
</html>

