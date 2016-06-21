<?php
    include "../cabecalho.php";
    
    require '../../dao/ProprietarioDAO.class.php';
    
    $dao = new ProprietarioDAO();
    $lista = $dao->listar();
    if(isset($_POST["txtFiltro"])){
       $lista = $dao->listar($_POST["txtFiltro"]); 
    }
    else{
       $lista = $dao->listar(); 
    }
    
?>
    <div>
        <h1 class="centro">Proprietário</h1>
            <div>
                <a href="add.php"><input type="submit" value="Cadastrar Proprietários"></a>
                <div><br/>
                    <form method="post">
                        <input type="text" name="txtFiltro"/>
                        <input type="submit" value="Pesquisar"/><br />
                    </form>
                </div>
                <table>
                    <tr>
                        <th>Cpf</th>
                        <th>Nome</th>
                        <th>Endereco</th>
                        <th>Telefone</th>
                        <th>Ações</th>
                    </tr>
                    <?php
                    foreach ($lista as $obj){
                    ?>
                    <tr>
                        <td><?php echo $obj->cpf ?></td>
                        <td><?php echo $obj->nome ?></td>
                        <td><?php echo $obj->endereco ?></td>
                        <td><?php echo $obj->telefone ?></td>
                        <td>
                            <a href="upd.php?cpf=<?php echo $obj-> cpf?>">Editar</a>
                            <a href="del-ok.php?cpf=<?php echo $obj-> cpf?>">Excluir</a>
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

