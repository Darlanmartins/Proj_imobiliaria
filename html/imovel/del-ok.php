<?php
    if(!isset($_GET["matricula"])){
        header("location:index.php");
    }

    $matricula = $_GET["matricula"];
    
    require '../../dao/ImovelDAO.class.php';
    
    $dao = new ImovelDAO();
    
    $retorno = $dao-> excluir($matricula);
    
    if($retorno > 0){
        $msg = "Registro excluído com sucesso";
    }
    else{
        $msg = "Não foi possível excluir o registro. Verifique dependências";
    }

    include "../cabecalho.php";
?>
        <div>
            <h1 class="centro">Exclusão de Imoveis</h1>
            <div>
                <h3><?php echo $msg; ?></h3>
                <div>
                    <a href="index.php">Voltar</a>
                </div>
            </div>
        </div>
    </body>
</html>

