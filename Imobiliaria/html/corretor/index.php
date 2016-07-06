<?php
    include "../cabecalho.php";
    
    require_once '../../dao/CorretorDAO.class.php';
    
    $dao = new CorretorDAO();
    if(isset($_POST["txtFiltro"])){
       $lista = $dao->listar($_POST["txtFiltro"]); 
    }
    else{
       $lista = $dao->listar(); 
    }
  ?>
 <body class="fundo1">
    <div>
        <h1 class="centro">Corretor</h1>
        <div>
                <div>  
                    <a href="add.php"><button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Cadastrar Corretores">Cadastrar</button></a> 
                    <br/><br/>           
                    <form method="post">
                    <input type="text" name="txtFiltro"/>
                    <input type="submit" value="Pesquisar" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Perquisar Corretores"><br />
                    </form>
                </div>
                <table>
                    <tr class="lista">
                        <th><br />CRECI</th>
                        <th><br />Nome</th>
                        <th><br />Telefone</th>
                        <th><br />Ações</th> 
                    </tr>
                    <?php
                    foreach ($lista as $obj){
                    ?>
                    <tr>
                        <td><?php echo $obj->creci ?></td>
                        <td><?php echo $obj->nome ?></td>
                        <td><?php echo $obj->telefone ?></td>
                        <td>
                            <a href="upd.php?creci=<?php echo $obj->creci?>"> <input type="submit" value="Editar"></a>
                            <a href="del-ok.php?creci=<?php echo $obj->creci?>"> <input type="submit" value="Excluir"></a>
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
