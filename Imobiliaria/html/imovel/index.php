<?php
    include "../cabecalho.php";
    
    require_once '../../dao/ImovelDAO.class.php';
    
    $dao = new ImovelDAO();
    if(isset($_POST["txtFiltro"])){
       $lista = $dao->listar($_POST["txtFiltro"]); 
    }
    else{
       $lista = $dao->listar(); 
    }    
?>
 <body class="fundo1">
    <div>
        <h1 class="centro">Imóvel</h1>
        <div>
                <div>  
                    <a href="add.php"><button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Cadastrar Imóveis">Cadastrar</button></a> 
                    <br/><br/>           
                    <form method="post">
                    <input type="text" name="txtFiltro"/>
                    <input type="submit" value="Pesquisar" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Perquisar Imóveis"><br />
                    </form>
                </div>
                <table>
                    <tr class="lista">
                        <th><br />Matrícula</th>
                        <th><br />Categoria</th>
                        <th><br />Tipo</th>
                        <th><br />Endereço</th>
                        <th><br />Bairro</th>
                        <th><br />Cidade</th>
                        <th><br />Características</th>
                        <th><br />Proprietário</th>
                        <th><br />Ações</th>
                    </tr>
                    <?php
                    foreach ($lista as $obj){
                    ?>
                    <tr>
                        <td><?php echo $obj->matricula ?></td>
                        <td><?php echo $obj->categoria ?></td>
                        <td><?php echo $obj->tipo ?></td>
                        <td><?php echo $obj->endereco ?></td>
                        <td><?php echo $obj->bairro ?></td>
                        <td><?php echo $obj->cidade ?></td>
                        <td><?php echo $obj->caracteristicas ?></td>
                        <td><?php echo $obj->proprietario ?></td>
                        <td>
                            <a href="upd.php?matricula=<?php echo $obj->matricula?>" ><input type="submit" value="Editar"></a>
                            <a href="del-ok.php?matricula=<?php echo $obj->matricula?>" ><input type="submit" value="Excluir"></a>
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
