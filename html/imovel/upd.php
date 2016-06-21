<?php
   if(!isset($_GET["matricula"])){
      header("location: index.php");
    }
    
    require '../../Imovel.class.php';
    require '../../dao/ImovelDAO.class.php';
    
    $matricula = $_GET["matricula"];
    $dao = new MatriculaDAO();
    $obj = $dao->buscarPorChavePrimaria($matricula);

    if($obj == null){
        header("location: index.php");
    } 
    
    include "../cabecalho.php";
?>
        <div>
            <h1 class="centro">Alteração de Imoveis</h1>
            <div>
                <form action="upd-ok.php" method="post">
                    <label>Matricula:</label><input type="text" value="<?php echo $obj->matricula?>" readonly name="txtMatricula"/><br />
                    <label>Caracteristicas:</label><input type="text" value="<?php echo $obj->caracteristicas?>" name="txtCaracteristicas"/><br />
                    <label>Endereco:</label><input type="text" value="<?php echo $obj->endereco?>" name="txtEndereco"/><br />
                    <input type="reset" value="Limpar" />
                    <input type="submit" value="Salvar" />
                </form>
            </div>
        </div>
    </body>
</html>

