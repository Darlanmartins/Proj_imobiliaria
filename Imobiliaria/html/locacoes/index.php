<?php
    include "../cabecalho.php";
    
    require_once '../../dao/LocacoesDAO.class.php';
    
    $dao = new LocacoesDAO();
    if(isset($_POST["txtFiltro"])){
       $lista = $dao->listar($_POST["txtFiltro"]); 
    }
    else{
       $lista = $dao->listar(); 
    }
  ?>
<body class="fundo1">
    <div>
        
        <h1 class="centro">Locações</h1>
        <div>
                <div>  
                    <a href="add.php"><button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Cadastrar Locações">Cadastrar</button></a> 
                    <br/><br/>           
                    <form method="post">
                    <input type="text" name="txtFiltro">
                    <input type="submit" value="Pesquisar" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Perquisar Locações"><br />
                    </form>
                </div>
                <table>
                    <tr class="lista">
                        <th><br />Contrato</th>
                        <th><br />Data</th>
                        <th><br />Vigência</th>
                        <th><br />Valor</th>
                        <th><br />Imóvel</th>
                        <th><br />Locatário</th>
                        <th><br />Ações</th>
                    </tr>
                    <?php
                    foreach ($lista as $obj){
                    ?>
                    <tr>
                        <td><?php echo $obj->contrato ?></td>
                        <td><?php echo $obj->data ?></td>
                        <td><?php echo $obj->vigencia ?></td>
                        <td><?php echo $obj->valor ?></td>
                        <td><?php echo $obj->imovel ?></td>
                        <td><?php echo $obj->inquilino ?></td>
                        <td>
                            <a href="upd.php?contrato=<?php echo $obj->contrato?>" ><input type="submit" value="Editar"></a>
                            <a href="del-ok.php?contrato=<?php echo $obj->contrato?>" ><input type="submit" value="Excluir"></a>
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

