<?php
    include "../cabecalho.php";
//  require_once '../../config.php';
    require_once '../../dao/ImovelDAO.class.php';
    require_once '../../dao/InquilinoDAO.class.php';
    
    $imovelDao = new ImovelDAO();
    $inquilinoDao = new InquilinoDAO();
    
    $imovelLista = $imovelDao->Listar();
    $inquilinoLista = $inquilinoDao->Listar();
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
        <h1 class="centro">Cadastro de Locações</h1>
            <div>
                <a href="index.php"><button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Voltar à Lista de Locações">Voltar</button></a>
                <form id="locacoes" action="add-ok.php" method="post">
                    <table width="725" border="0">
            <tr>
            <td>Contrato: </td>
                <td><input type="text" name="txtContrato"  OnKeyPress="formatar('###.###', this)" size="12" maxlength="12"> 
                    <span class="style3">Apenas números</span></td>
            </tr>    
            <tr>
            <td>Data: </td>
                <td><input id="data" type="text" name="txtData" size="14" maxlength="14" OnKeyPress="formatar('##/##/####', this)"/>
                <span class="style1"></span>
                <span class="style3">Apenas números</span></td>
            </tr>
            <tr>
                <td>Vigência: </td>
                <td><select id="vigencia" name="txtVigencia">
                <option>Selecione...</option>
                <option value="12 Meses">12 Meses</option>
                <option value="18 Meses">18 Meses</option>
                <option value="24 Meses">24 Meses</option>
                <option value="30 Meses">30 Meses</option>
                <option value="36 Meses">36 Meses</option>
                </select>
                <span class="style1"></span></td>
            </tr>
            <tr>
                <td>Valor: </td>
                <td><input id="valor" name="txtValor" type="text" size="14" maxlength="14" />
                <span class="style1"></span></td>
            </tr>
            <tr>
                <td>Imóvel: </td> 
                <td><select id="imovel" name="selImovel" maxlength="70">
                        <option value="">Selecione</option>
                        <?php
                         foreach ($imovelLista as $item){
                         ?>
                        <option value="<?php echo $item->matricula?>">
                                       <?php echo $item->endereco?>
                        </option>
                        <?php
                         }
                         ?>
                    </select></td> <br />
            </tr>
            <tr>
                <td>Locatário: </td>
                    <td><select id="inquilino" name="selInquilino" maxlength="70">
                        <option value="">Selecione</option>
                        <?php
                         foreach ($inquilinoLista as $item){
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

