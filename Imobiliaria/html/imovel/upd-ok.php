<?php
    if(!isset($_POST["txtMatricula"]) || !isset($_POST["txtEndereco"])){
        header("location:index.php");
    }

    require_once "../../modelo/Imovel.class.php";
    require_once "../../dao/ImovelDAO.class.php";

    $obj = new Imovel();
    $obj->matricula = $_POST["txtMatricula"];
    $obj->categoria = $_POST["txtCategoria"];
    $obj->tipo = $_POST["txtTipo"];
    $obj->endereco = $_POST["txtEndereco"];
    $obj->bairro = $_POST["txtBairro"];
    $obj->cidade = $_POST["txtCidade"];
    $obj->caracteristicas = $_POST["txtCaracteristicas"];
    $obj->proprietario->cpf = $_POST["selProprietario"];
    
    $dao = new ImovelDAO();

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
            <h1 class="centro">Alteração de Imóveis</h1>
            <div>
                <h3><?php echo $msg; ?></h3>
                <div>
                    <a href="index.php"><input type="submit" value="Voltar"></a>
                </div>
            </div>
        </div>
    </body>
</html>
