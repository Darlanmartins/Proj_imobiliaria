
<?php
    include "../cabecalho.php";
    
    require '../../dao/InquilinoDAO.class.php';
    
    $dao = new InquilinoDAO();
    if(isset($_POST["txtFiltro"])){
       $lista = $dao->listar($_POST["txtFiltro"]); 
    }
    else{
       $lista = $dao->listar(); 
    }
  ?>
    <div>
        <h1 class="centro">Inquilino</h1>
        <div>
                <div>  
                    <a href="add.php"><input type="submit" value="Cadastrar Inquilinos"></a> 
                    <br/><br/>           
                    <form method="post">
                    <input type="text" name="txtFiltro"/>
                    <input type="submit" value="Pesquisar"/><br />
                    </form>
                </div>
                <table>
                    <tr>
                        <th>CPF</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Sexo</th>
                        <th>Telefone</th>
                        <th>Endereço</th>
                        <th>Cidade</th>
                        <th>Bairro</th>
                        <th>Estado</th>          
                        <th>Ações</th>
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
                            <a href="upd.php?cpf=<?php echo $obj->cpf?>">Editar</a>
                            <a href="del-ok.php?cpf=<?php echo $obj->cpf?>">Excluir</a>
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

