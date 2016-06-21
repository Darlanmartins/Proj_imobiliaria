<?php
    include "../cabecalho.php";
?>
<div>
    <h1 class="centro">Cadastro de Inquilinos</h1>
    <div>
    <form id="inquilino" name="inquilino" action="add-ok.php" method="post">
    <table width="625" border="0">
        <tr>
        <td width="69">Nome:</td>
        <td width="546"><input name="txtNome" type="text" id="nome" size="70" maxlength="60" />
        <span class="style1"></span></td>
        </tr>
        <tr>
        <td>CPF:</td>
        <td><input name="txtCpf" type="text" id="cpf" size="20" maxlength="12" />
        <span class="style3">Apenas números</td>
        </tr>
        <tr>
        <td>Email:</td>
        <td><input name="txtEmail" type="text" id="email" size="70" maxlength="60" />
        <span class="style1"></span></td>
        </tr>
        <td>Sexo:</td>
        <td><input name="txtSexo" type="text" id="sexo" maxlength="10" />
        <span class="style1"></span></td>
        </tr>
        <tr>
        <td>DDD:</td>
        <td><input name="ddd" type="text" id="ddd" size="4" maxlength="2" />
        Telefone:
        <input name="txtTelefone" type="text" id="telefone" />
        <span class="style3">Apenas números</span> </td>
        </tr>
        <tr>
        <td>Endereço:</td>
        <td><input name="txtEndereco" type="text" id="endereco" size="70" maxlength="70" />
        <span class="style1"></span></td>
        </tr>
        <tr>
        <td>Cidade:</td>
        <td><input name="txtCidade" type="text" id="cidade" maxlength="20" />
        <span class="style1"></span></td>
        </tr>
        <tr>
        <td>Bairro:</td>
        <td><input name="txtBairro" type="text" id="bairro" maxlength="20" />
        <span class="style1"></span></td>
        </tr>
        <tr>
        <td>Estado:</td>
        <td><select name="txtEstado" id="estado">
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
        <input name="limpar" type="reset" id="limpar" value="Limpar Campos preenchidos" />
        <br /><br />
        <input name="cadastrar" type="submit" id="cadastrar" value="Concluir Cadastro" /> 
        <br />
        <span class="style1"> </span></p>
        <p>&nbsp; </p></td>
        </tr>
    </table>
</form>
    </div>
</div>
   </body>
</html>

