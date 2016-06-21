<?php
     if(!isset($_GET["cpf"])){
      header("location: index.php");
    }
    
    require '../../modelo/Proprietario.class.php';
    require '../../dao/ProprietarioDAO.class.php';
    
    $cpf = $_GET["cpf"];
    $dao = new ProprietarioDAO();
    $obj = $dao->buscarPorChavePrimaria($cpf);

    if($obj == null){
        header("location: index.php");
    } 
    
    include "../cabecalho.php";
?>
        <div>
            <h1 class="centro">Alteração de Proprietarios</h1>
            <div>
                <form action="upd-ok.php" method="post">
                    <label>Cpf:</label><input type="text" value="<?php echo $obj->cpf ?>" readonly name="txtCpf"/><br />
                    <label>Nome:</label><input type="text" value="<?php echo $obj->nome ?>" name="txtNome"/><br />
                    <label>Endereco:</label><input type="text" value="<?php echo $obj->endereco ?>" name="txtEndereco"/><br />
                    <label>Telefone:</label><input type="text" value="<?php echo $obj->telefone ?>" name="txtTelefone"/><br />
                    <input type="reset" value="Limpar" />
                    <input type="submit" value="Salvar" />
                </form>
            </div>
        </div>
    </body>
</html>
