<?php
    if(!isset($_POST["txtCreci"]) || !isset($_POST["txtNome"])){
        header("location:index.php");
    }

    require_once '../../modelo/Corretor.class.php';
    require_once '../../dao/CorretorDAO.class.php';

    $obj = new Corretor();
    $obj->creci = $_POST["txtCreci"];
    $obj->nome = $_POST["txtNome"];
    $obj->telefone = $_POST["txtTelefone"];
    
    $dao = new CorretorDAO();

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
            <h1 class="centro">Alteração de Corretores</h1>
            <div>
                <h3><?php echo $msg; ?></h3>
                <div>
                    <a href="index.php"><input type="submit" value="Voltar"></a>
                </div>
            </div>
        </div>
    </body>
</html>
