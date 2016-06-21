<?php
     if(!isset($_GET["cpf"])){
      header("location: index.php");
    }
    
    require '../../modelo/Inquilino.class.php';
    require '../../dao/InquilinoDAO.class.php';
    
    $cpf = $_GET["cpf"];
    $dao = new InquilinoDAO();
    $obj = $dao->buscarPorChavePrimaria($cpf);

    if($obj == null){
        header("location: index.php");
    } 
    
    include "../cabecalho.php";
?>
        <div>
            <h1 class="centro">Alteração de Inquilinos</h1>
            <div>
                    <form action="upd-ok.php" method="post">
                    <label>CPF:</label><input type="text" value="<?php echo $obj->cpf ?>" readonly name="txtCpf"/><br />
                    <label>Nome:</label><input type="text" value="<?php echo $obj->nome ?>" name="txtNome"/><br />
                    <label>Email:</label><input type="text" value="<?php echo $obj->email ?>" name="txtEmail"/><br />
                    <label>Sexo:</label><input type="text" value="<?php echo $obj->sexo ?>" name="txtSexo"/><br />
                    <label>Telefone:</label><input type="text" value="<?php echo $obj->telefone ?>" name="txtTelefone"/><br />
                    <label>Endereço:</label><input type="text" value="<?php echo $obj->endereco ?>" name="txtEndereco"/><br />
                    <label>Cidade:</label><input type="text" value="<?php echo $obj->cidade ?>" name="txtCidade"/><br />
                    <label>Bairro:</label><input type="text" value="<?php echo $obj->bairro ?>" name="txtBairro"/><br />
                    <label>Estado:</label><input type="text" value="<?php echo $obj->estado ?>" name="txtEstado"/><br />
                    
                    <input type="reset" value="Limpar" />
                    <input type="submit" value="Salvar" />
                </form>
            </div>
        </div>
    </body>
</html>

