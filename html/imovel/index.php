<?php
    include "../cabecalho.php";
    
    require '../../dao/ImovelDAO.class.php';
    
    $dao = new ImovelDAO();
    if(isset($_POST["txtFiltro"])){
       $lista = $dao->listar($_POST["txtFiltro"]); 
    }
    else{
       $lista = $dao-> listar(); 
    }
    
?>
    <div>
        <h1 class="centro">Imóvel</h1>
            <div>
                <a href="add.php"><input type="submit" value="Cadastrar Imóveis"></a> 
                <div><br/>
                    <form method="post">
                        <input type="text" name="txtFiltro"/>
                        <input type="submit" value="Pesquisar"/><br />
                    </form>
                </div>
                <table>
                    <tr>
                        <th>Matricula</th>
                        <th>Caracteristicas</th>
                        <th>Endereco</th>
                        <th>Ações</th>
                    </tr>
                    <?php
                    foreach ($lista as $obj){
                    ?>
                    <tr>
                        <td><?php echo $obj->matricula ?></td>
                        <td><?php echo $obj->caracteristicas ?></td>
                        <td><?php echo $obj->endereco ?></td>
                        <td>
                            <a href="upd.php?matricula=<?php echo $obj->matricula?>">Editar</a>
                            <a href="del-ok.php?matricula=<?php echo $obj->matricula?>">Excluir</a>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
        </div>
    </body>
</html>

