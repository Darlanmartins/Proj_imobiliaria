<?php
    include "../cabecalho.php";
//  require_once '../../config.php';
    require_once '../../dao/ProprietarioDAO.class.php';
      
    $proprietarioDao = new ProprietarioDAO();
    $proprietarioLista = $proprietarioDao->Listar();
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
    <h1 class="centro">Cadastro de Imóveis</h1>  
<html>
  <a href="index.php"><button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Voltar à Lista de Imóveis">Voltar</button></a>
  <form action="add-ok.php" method="post">
  <table style="width: 725px;" border="0">
    <tbody><tr>
      <td>Matrícula: </td>
      <td> <input id="matricula" name="txtMatricula" OnKeyPress="formatar('###.###', this)" size="7" maxlength="7" type="text" />
      <span class="style1"></span>
      <span class="style3">Apenas números</span> </td>
    </tr>
    <tr>
    <td>Categoria: </td>
      <td><select id="categoria" name="txtCategoria">
        <option>Selecione...</option>
        <option value="Residencial">Residencial</option>
        <option value="Comercial">Comercial</option>
          </select>
        <span class="style1"></span></td>
    </tr>
    <tr>
    <td>Tipo: </td>
      <td><select id="tipo" name="txtTipo">
        <option>Selecione...</option>
        <option value="Apartamento">Apartamento</option>
        <option value="Box/Garagem">Box/Garagem</option>
        <option value="Casa">Casa</option>
        <option value="Galpão Comercial">Galpão Comercial</option>
        <option value="Sala Comercial">Sala Comercial</option>
        <option value="Terreno">Terreno</option>
          </select>
        <span class="style1"></span></td>
    </tr>
    <tr>
      <td>Endereço: </td>
      <td><input type="text" name="txtEndereco" id="endereco" size="70" maxlength="70" />
      <span class="style1"></span></td>
    </tr>
    <tr>
      <td>Bairro: </td>
      <td><input name="txtBairro" type="text" id="bairro" size="40" maxlength="40" />
      <span class="style1">
    </tr>
    <tr>
      <td>Cidade:</td>
      <td><input name="txtCidade" type="text" id="cidade" size="35" maxlength="35" />
    </tr>
    <tr>
      <td>Características: </td>
      <td><input name="txtCaracteristicas" type="text" id="caracteristicas" size="90" maxlength="90" />
      <span class="style1"></span></td>
    </tr>
    <tr>
      <td>Proprietário: </td>
      <td><select id="proprietario" name="selProprietario" >
          <option value="">Selecione</option>
          <?php
          foreach ($proprietarioLista as $item){
          ?>
          <option value="<?php echo $item->cpf?>">
                         <?php echo $item->nome?>
          </option>
          <?php
          }
          ?>
          </select></td> <br />
    </tr>
    <tr>
      <td colspan="2"><p>
              <input id="limpar" name="limpar" type="reset" value="Limpar Campos Preenchidos" />
              <input id="cadastrar" name="cadastrar" type="submit" value="Cadastrar" /> 
        <span class="style1">   </span></p>
      <p> </p></td>
    </tr>
  </tbody></table>

</form>
</div> 
    
</html>

