<?php
    include "../cabecalho.php";
    
    require_once '../../dao/ProprietarioDAO.class.php';
    
    $dao = new ProprietarioDAO();
    if(isset($_POST["txtFiltro"])){
       $lista = $dao->listar($_POST["txtFiltro"]); 
    }
    else{
       $lista = $dao->listar(); 
    }
  ?>

 <body class="fundo1">
    <div>
        <h1 class="centro">Proprietário</h1>
        <div>
                <div>  
                    <a href="add.php"><button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Cadastrar Proprietários">Cadastrar</button></a> 
                    <br/><br/>           
                    <form method="post">
                    <input type="text" name="txtFiltro"/>
                    <input type="submit" value="Pesquisar" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Perquisar Proprietários"><br />
                    </form>
                </div>
                <table>
                    <tr class="lista">
                        <th><br />CPF</th>
                        <th><br />Nome</th>
                        <th><br />e-mail</th>
                        <th><br />Sexo</th>
                        <th><br />Telefone</th>
                        <th><br />Endereço</th>
                        <th><br />Cidade</th>
                        <th><br />Bairro</th>
                        <th><br />Estado</th>          
                        <th><br />Ações</th>
                    </tr>
                    <?php
                    foreach ($lista as $obj){
                    ?>
                    <tr>
                        <td><?php echo $obj->cpf ?></td>
                        <td><?php echo $obj->nome ?></td>
                        <td><?php echo $obj->email ?></td>
                        <td><?php echo $obj->sexo ?></td>
                        <td><?php echo $obj->telefone ?></td>
                        <td><?php echo $obj->endereco ?></td>
                        <td><?php echo $obj->cidade ?></td>
                        <td><?php echo $obj->bairro ?></td>
                        <td><?php echo $obj->estado ?></td>
                        <td>
                            <a href="upd.php?cpf=<?php echo $obj->cpf?>"><input type="submit" value="Editar"></a>
                            <a href="del-ok.php?cpf=<?php echo $obj->cpf?>"><input type="submit" value="Excluir"></a>
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
