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
    <h1 class="centro">Cadastro de Corretores</h1>
    <div>
    <a href="index.php"><button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Voltar à Lista de Corretores">Voltar</button></a>
    <form id="corretor" name="corretor" action="add-ok.php" method="post">
    <table width="725" border="0">
        <tr>
        <td>CRECI:</td>
        <td><input name="txtCreci" type="text" id="creci" size="7" maxlength="7" OnKeyPress="formatar('###.####', this)" > 
        <span class="style3">Apenas números</td>
        </tr>
        <tr>
        <td width="69">Nome: </td>
        <td width="546"><input name="txtNome" type="text" id="nome" size="70" maxlength="70" />
        <span class="style1"></span></td>
        </tr>
        <tr>
        <td>Telefone: </td>
        <td><input type="text" name="txtTelefone" id="telefone" size="12" maxlength="12" OnKeyPress="formatar('## ####.####', this)" />
        <span class="style3">Apenas números </td>
        </tr>
        <tr>
        <td colspan="2"><p>
        <input name="limpar" type="reset" id="limpar" value="Limpar Campos preenchidos" />
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
