<?php
    if(!isset($_GET["creci"])){
        header("location: index.php");
    }
    
    require '../../modelo/Corretor.class.php';
    require '../../dao/CorretorDAO.class.php';
    
    $creci = $_GET["creci"];
    $dao = new CorretorDAO();
    $obj = $dao->buscarPorChavePrimaria($creci);
    if($obj == null){ 
        header("location: index.php");
    }
    
    include "../cabecalho.php";
?>
        <div>
            <h1 class="centro">Alteração de Corretores</h1>
            <div>
                <form action="upd-ok.php" method="post">
                    <label>Creci</label><input type="text" readonly value="<?php echo $obj->creci ?>" readonly name="txtCreci"/><br />
                    <label>Nome:</label><input type="text" value="<?php echo $obj->nome ?>"  name="txtNome"/><br />
                    <label>Telefone</label><input type="text" value="<?php echo $obj->telefone ?>" name="txtTelefone" /><br />
                    <input type="reset" value="Limpar" />
                    <input type="submit" value="Salvar" />
                </form>
            </div>
        </div>
    </body>
</html>

