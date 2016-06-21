<?php
    if(!isset($_POST["txtCpf"]) || !isset($_POST["txtNome"])){
        header("location:index.php");
    }
    
    require "../../modelo/Proprietario.class.php";
    require "../../dao/ProprietarioDAO.class.php";

    $obj = new Proprietario();
    $obj->cpf = $_POST["txtCpf"];
    $obj->nome = $_POST["txtNome"];
    $obj->endereco = $_POST["txtEndereco"];
    $obj->telefone = $_POST["txtTelefone"];
        
    $dao = new ProprietarioDAO();

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
            <h1 class="centro">Alteração de Proprietarios</h1>
            <div>
                <h3><?php echo $msg; ?></h3>
                <div>
                    <a href="index.php">Voltar</a>
                </div>
            </div>
        </div>
    </body>
</html>

