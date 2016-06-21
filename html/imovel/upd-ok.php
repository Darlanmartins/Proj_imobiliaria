<?php
if(!isset($_POST["txtMatricula"]) || !isset($_POST["txtEndereco"])){
    header("location:index.php");
}

require '../../modelo/Imovel.class.php';
require '../../dao/ImovelDAO.class.php';

$obj = new Imovel();
$obj->matricula = $_POST["txtMatricula"];
$obj->caracteristicas = $_POST["txtCararcteristicas"];
$obj->endereco = $_POST["txtEndereco"];

$dao = new ImovelDAO();

$retorno = $dao-> alterar($obj);
if($retorno > 0){
    $msg = "Registro alterado com sucesso";
}
else{
    $msg = "Não foi possível alterar o registro";
}

include "../cabecalho.php";
?>
        <div>
            <h1 class="centro">Alteração de Imoveis</h1>
            <div>
                <h3><?php echo $msg; ?></h3>
                <div>
                    <a href="index.php">Voltar</a>
                </div>
            </div>
        </div>
    </body>
</html>

