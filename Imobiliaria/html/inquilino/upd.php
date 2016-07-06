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
                <td><select id="sexo" value="<?php echo $obj->sexo ?>" name="txtSexo">
                <option>Selecione...</option>
                <option value="Masculino">Masculino</option>
                <option value="Feminino">Feminino</option>
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
                <td><select id="estado" value="<?php echo $obj->estado ?>" name="txtEstado">
                <option>Selecione...</option>
                    <option value="AC">AC</option>
                    <option value="AL">AL</option>
                    <option value="AP">AP</option>
                    <option value="AM">AM</option>
                    <option value="BA">BA</option>
                    <option value="CE">CE</option>
                    <option value="ES">ES</option>
                    <option value="DF">DF</option>
                    <option value="MA">MA</option>
                    <option value="MT">MT</option>
                    <option value="MS">MS</option>
                    <option value="MG">MG</option>
                    <option value="PA">PA</option>
                    <option value="PB">PB</option>
                    <option value="PR">PR</option>
                    <option value="PE">PE</option>
                    <option value="PI">PI</option>
                    <option value="RJ">RJ</option>
                    <option value="RN">RN</option>
                    <option value="RS">RS</option>
                    <option value="RO">RO</option>
                    <option value="RR">RR</option>
                    <option value="SC">SC</option>
                    <option value="SP">SP</option>
                    <option value="SE">SE</option>
                    <option value="TO">TO</option>
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
