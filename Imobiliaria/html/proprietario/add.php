<?php
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
        <h1 class="centro">Cadastro de Proprietários</h1>
            <div>
                <a href="index.php"><button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Voltar à Lista de Proprietários">Voltar</button></a>
                <form id="proprietario" action="add-ok.php" method="post">
                    <table width="725" border="0">
            <tr>
            <td>CPF: </td>
                <td><input type="text" name="txtCpf" size="16" maxlength="16" OnKeyPress="formatar('###.###.###-##', this)" /> 
                <span class="style3">Apenas números</td>
            </tr>    
            <tr>
            <td>Nome: </td>
                <td><input id="nome" type="text" name="txtNome" size="70" maxlength="70" />
                <span class="style1"></span></td>
            </tr>
            <tr>
                <td>Email: </td>
                <td><input id="email" name="txtEmail" type="text" size="45" maxlength="45" />
                <span class="style1"></span></td>
            </tr>
            <tr>
                <td>Sexo: </td>
                <td><select id="sexo" name="txtSexo">
                <option>Selecione...</option>
                <option value="Masculino">Masculino</option>
                <option value="Feminino">Feminino</option>
                </select>
                <span class="style1"></span></td>
            </tr>
            <tr>
                <td>Telefone: </td>
                <td><input id="telefone" type="text" name="txtTelefone" size="14" maxlength="14" OnKeyPress="formatar('## ####.####', this)" />
                <span class="style3">Apenas números</td>
            </tr>
                <tr>
                <td>Endereço: </td>
                <td><input id="endereco" name="txtEndereco" type="text" size="70" maxlength="70" />
                <span class="style1"></span></td>
            </tr>
            <tr>
                <td>Cidade: </td>
                <td><input id="cidade" name="txtCidade" type="text" size="35" maxlength="35" />
                <span class="style1"></span></td>
            </tr>
            <tr>
            <td>Bairro: </td>
                <td><input id="bairro" name="txtBairro" type="text" size="40" maxlength="40" />
                <span class="style1"></span></td>
            </tr>
            <tr>
            <td>Estado:</td>
                <td><select id="estado" name="txtEstado">
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
                <input name="limpar" type="reset" id="limpar" value="Limpar Campos Preenchidos" />
                <input name="cadastrar" type="submit" id="cadastrar" value="Cadastrar" /> 
            <br />
                <span class="style1"> </span></p>
            <p> </p></td>
            </tr>
                    </table>
                </form>
            </div>
        </div>
   </body>
</html>

