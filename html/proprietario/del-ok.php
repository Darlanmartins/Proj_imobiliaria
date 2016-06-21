<?php
    if(!isset($_GET["cpf"])){
        header("location:index.php");
    }

    $cpf = $_GET["cpf"];
    
    require '../../dao/ProprietarioDAO.class.php';
    
    $dao = new ProprietarioDAO();
    
    $retorno = $dao->excluir($cpf);
    
    if($retorno > 0){
        $msg = "Registro excluído com sucesso";
    }
    else{
        $msg = "Não foi possível excluir o registro. Verifique dependências";
    }

    include "../cabecalho.php";
?>
        <div>
            <h1 class="centro">Exclusão de Proprietarios</h1>
            <div>
                <h3><?php echo $msg; ?></h3>
                <div>
                    <a href="index.php">Voltar</a>
                </div>
            </div>
        </div>
    </body>
</html>

