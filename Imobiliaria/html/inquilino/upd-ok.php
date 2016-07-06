<?php
    if(!isset($_POST["txtCpf"]) || !isset($_POST["txtNome"])){
        header("location:index.php");
    }

    require_once '../../modelo/Inquilino.class.php';
    require_once '../../dao/InquilinoDAO.class.php';

    $obj = new Inquilino();
    $obj->cpf = $_POST["txtCpf"];
    $obj->nome = $_POST["txtNome"];
    $obj->email = $_POST["txtEmail"];
    $obj->sexo = $_POST["txtSexo"];
    $obj->telefone = $_POST["txtTelefone"];
    $obj->endereco = $_POST["txtEndereco"];
    $obj->cidade = $_POST["txtCidade"];
    $obj->bairro = $_POST["txtBairro"];
    $obj->estado = $_POST["txtEstado"];
    
    $dao = new InquilinoDAO();

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
            <h1 class="centro">Alteração de Inquilinos</h1>
            <div>
                <h3><?php echo $msg; ?></h3>
                <div>
                    <a href="index.php"><input type="submit" value="Voltar"></a>
                </div>
            </div>
        </div>
    </body>
</html>

