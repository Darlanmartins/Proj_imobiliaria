<?php
    include "../cabecalho.php";
    
    require '../../dao/CorretorDAO.class.php';
    
    $dao = new CorretorDAO();
    if(isset($_POST["txtFiltro"])){
       $lista = $dao->listar($_POST["txtFiltro"]); 
    }
    else{
       $lista = $dao->listar(); 
    }
   
    //  var_dump($lista);
?>
    <div>
        <h1 class="centro">Corretor</h1>
            <div>
                <a href="add.php"><input type="submit" value="Cadastrar Corretores"></a> 
                <div><br/>
                    <form method="post">
                        <input type="text" name="txtFiltro"/>
                        <input type="submit" value="Pesquisar"/><br />
                    </form>
                </div>
                <table>
                    <tr>
                        <th>Creci</th>
                        <th>Nome</th>
                        <th>Telefone</th>
                        <th>Ações</th>
                    </tr>
                    <?php
                    foreach ($lista as $obj){
                    ?>
                        <tr>
                            <td><?php echo $obj->creci ?></td>
                            <td><?php echo $obj->nome ?></td>
                            <td><?php echo $obj->telefone ?></td>
                            <td>
                                <a href="upd.php?creci= <?php echo $obj->creci?>">Editar</a>
                                <a href="del-ok.php?creci= <?php echo $obj->creci?>">Excluir</a>
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

