<?php
     if(!isset($_GET["cpf"])){
      header("location: index.php");
    }
    
    require_once '../../modelo/Inquilino.class.php';
    require_once '../../dao/InquilinoDAO.class.php';
    
    $cpf = $_GET["cpf"];
    $dao = new InquilinoDAO();
    $obj = $dao->buscarPorChavePrimaria($cpf);

    if($obj == null){
        header("location: index.php");
    } 
    
    include "../cabecalho.php";
?>
<script>
function formatar(mascara, documento){
  var i = documento.value.length;
  var saida = mascara.substring(0,1);
  var texto = mascara.substring(i)
  
  if (texto.substring(0,1) != saida){
            documento.value += texto.substring(0,1);
  }
  
}
</script> 
    <div>
            <h1 class="centro">Alteração de Inquilinos</h1>
    </div>
<a href="index.php"><button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Voltar à Lista de Inquilinos">Voltar</button></a>
<form action="upd-ok.php" method="post">
    <table style="width: 725px;" border="0">
        <tbody>
            <tr>
            <td>CPF: </td>
                <td><input type="text" id="cpf" value="<?php echo $obj->cpf ?>" readonly name="txtCpf" size="14" maxlength="14" OnKeyPress="formatar('###.###.###-##', this)" />
                <span class="style1"></span>
                <span class="style3">Apenas números</span> </td>
            </tr>
            <tr>
            <td>Nome: </td>
                <td><input type="text" id="nome" value="<?php echo $obj->nome ?>" name="txtNome" size="70" maxlength="70"/>
                <span class="style1"></span></td>
            </tr>
            <tr>
            <td>e-mail: </td>
                <td><input type="text" id="email" value="<?php echo $obj->email ?>" name="txtEmail" size="45" maxlength="45"/>
                <span class="style1"></span></td>
            </tr>
            <tr>
                <td>Sexo: </td>
                <td>
                <?php
                    function selected( $value, $selected ){
                    return $value==$selected ? ' selected="selected"' : '';
                    }
                ?>
                <select name="txtSexo">
                <option value="">Selecione...</option>    
                <option value="Masculino"<?php echo selected( 'Masculino', $obj->sexo ); ?> >Masculino</option>
                <option value="Feminino"<?php echo selected( 'Feminino', $obj->sexo ); ?> >Feminino</option>
                </select>
                <span class="style1"></span></td>
            </tr>
            <tr>
            <td>Telefone: </td>
                <td><input type="text" id="telefone" value="<?php echo $obj->telefone ?>" name="txtTelefone" size="14" maxlength="14" OnKeyPress="formatar('## ####.####', this)" />
                <span class="style1"></span>
                <span class="style3">Apenas números</span> </td>
            </tr>
            <tr>
            <td>Endereço: </td>
                <td><input type="text" id="endereco" value="<?php echo $obj->endereco ?>" name="txtEndereco" size="70" maxlength="70"/>
                <span class="style1"></span></td>
            </tr>
            <tr>
            <td>Cidade: </td>
                <td><input type="text" id="cidade" value="<?php echo $obj->cidade ?>" name="txtCidade" size="35" maxlength="35"/>
                <span class="style1"></span></td>
            </tr>
            <tr>
            <td>Bairro: </td>
                <td><input type="text" id="bairro" value="<?php echo $obj->bairro ?>" name="txtBairro" size="40" maxlength="40"/>
                <span class="style1"></span></td>
            </tr>    
            <tr>
            <td>Estado: </td>
                <td>                  
                <select name="txtEstado">
                <option value="">Selecione...</option>
                <option value="AC"<?php echo selected( 'AC', $obj->estado ); ?>>AC</option>
                <option value="AL"<?php echo selected( 'AL', $obj->estado ); ?>>AL</option>
                <option value="AP"<?php echo selected( 'AP', $obj->estado ); ?>>AP</option>
                <option value="AM"<?php echo selected( 'AM', $obj->estado ); ?>>AM</option>
                <option value="BA"<?php echo selected( 'BA', $obj->estado ); ?>>BA</option>
                <option value="CE"<?php echo selected( 'CE', $obj->estado ); ?>>CE</option>
                <option value="ES"<?php echo selected( 'ES', $obj->estado ); ?>>ES</option>
                <option value="DF"<?php echo selected( 'DF', $obj->estado ); ?>>DF</option>
                <option value="MA"<?php echo selected( 'MA', $obj->estado ); ?>>MA</option>
                <option value="MT"<?php echo selected( 'MT', $obj->estado ); ?>>MT</option>
                <option value="MS"<?php echo selected( 'MS', $obj->estado ); ?>>MS</option>
                <option value="MG"<?php echo selected( 'MG', $obj->estado ); ?>>MG</option>
                <option value="PA"<?php echo selected( 'PA', $obj->estado ); ?>>PA</option>
                <option value="PB"<?php echo selected( 'PB', $obj->estado ); ?>>PB</option>
                <option value="PR"<?php echo selected( 'PR', $obj->estado ); ?>>PR</option>
                <option value="PE"<?php echo selected( 'PE', $obj->estado ); ?>>PE</option>
                <option value="PI"<?php echo selected( 'PI', $obj->estado ); ?>>PI</option>
                <option value="RJ"<?php echo selected( 'RJ', $obj->estado ); ?>>RJ</option>
                <option value="RN"<?php echo selected( 'RN', $obj->estado ); ?>>RN</option>
                <option value="RS"<?php echo selected( 'RS', $obj->estado ); ?>>RS</option>
                <option value="RO"<?php echo selected( 'RO', $obj->estado ); ?>>RO</option>
                <option value="RR"<?php echo selected( 'RR', $obj->estado ); ?>>RR</option>
                <option value="SC"<?php echo selected( 'SC', $obj->estado ); ?>>SC</option>
                <option value="SP"<?php echo selected( 'SP', $obj->estado ); ?>>SP</option>
                <option value="SE"<?php echo selected( 'SE', $obj->estado ); ?>>SE</option>
                <option value="TO"<?php echo selected( 'TO', $obj->estado ); ?>>TO</option>
                </select>
                <span class="style1"></span></td>
            </tr>
                <tr>
                <td colspan="2"><p>
                <input id="desfazer" name="desfazer" type="reset" value="Desfazer Digitação" />
                <input id="cadastrar" name="cadastrar" type="submit" value="Cadastrar" /> 
                <span class="style1"> </span></p>
                <p> </p></td>
                </tr>            
        </tbody>
    </table>
</form>   
</html>
