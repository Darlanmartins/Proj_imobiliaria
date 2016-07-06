<?php
    if(!isset($_GET["creci"])){
        header("location:index.php");
    }

    $creci = $_GET["creci"];
    
    require_once '../../dao/CorretorDAO.class.php';
    
    $dao = new CorretorDAO();
    
    $retorno = $dao->excluir($creci);
    
    if($retorno > 0){
        $msg = "Registro excluído com sucesso";
    }
    else{
        $msg = "Não foi possível excluir o registro. Verifique dependências";
    }

    include "../cabecalho.php";
    
?>
        <div>
            <h1 class="centro">Exclusão de Corretores</h1>
            <div>
                <h3><?php echo $msg; ?></h3>
                <div>
                    <a href="index.php">Voltar</a>
                </div>
            </div>
        </div>
    </body>
</html>
