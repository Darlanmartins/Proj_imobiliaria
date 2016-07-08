<?php
    if(!isset($_GET["contrato"])){
       header("location: index.php");
    }
    
    require_once '../../modelo/Locacoes.class.php';
    require_once '../../dao/LocacoesDAO.class.php';
    
    $contrato = $_GET["contrato"];
    $dao = new LocacoesDAO();
    $obj = $dao->buscarPorChavePrimaria($contrato);

    if($obj == null){
       header("location: index.php");
    } 
    require_once '../../dao/ImovelDAO.class.php';
    require_once '../../dao/InquilinoDAO.class.php';
    
    $imovelDao = new ImovelDAO();
    $inquilinoDao = new InquilinoDAO();
    
    $imovelLista = $imovelDao->Listar();
    $inquilinoLista = $inquilinoDao->Listar();
    
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
            <h1 class="centro">Alteração de Locações</h1>
    </div>
<a href="index.php"><button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Voltar à Lista de Locações">Voltar</button></a>
<form action="upd-ok.php" method="post">
    <table style="width: 725px;" border="0">
        <tbody>
            <tr>
            <td>Contrato: </td>
            <td><input type="text" readonly name="txtContrato" OnKeyPress="formatar('###.###', this)" size="12" maxlength="12" value="<?php echo $obj->contrato?>" > 
                <span class="style3">Apenas números</span></td>
            </tr>    
            <tr>
            <td>Data: </td>
                <td><input id="data" type="text" name="txtData" size="12" maxlength="12" OnKeyPress="formatar('##/##/####', this)" value="<?php echo $obj->data?>" >
                <span class="style1"></span>
                <span class="style3">Apenas números</span></td>
            </tr>
            <tr>
                <td>Vigência: </td>
                <td>
                <?php
                     function selected( $value, $selected ){
                     return $value==$selected ? ' selected="selected"' : '';
                     }
                ?>
                <select name="txtVigencia">
                <option value="">Selecione...</option>    
                <option value="12 Meses"<?php echo selected( '12 Meses', $obj->vigencia ); ?> >12 Meses</option>
                <option value="18 Meses"<?php echo selected( '18 Meses', $obj->vigencia ); ?> >18 Meses</option>
                <option value="24 Meses"<?php echo selected( '24 Meses', $obj->vigencia ); ?> >24 Meses</option>
                <option value="30 Meses"<?php echo selected( '30 Meses', $obj->vigencia ); ?> >30 Meses</option>
                <option value="36 Meses"<?php echo selected( '36 Meses', $obj->vigencia ); ?> >36 Meses</option>
                </select>
                <span class="style1"></span></td>
            </tr>                              
            <tr>
                <td>Valor: </td>
                <td><input id="valor" name="txtValor" type="text" size="14" maxlength="14" value="<?php echo $obj->valor?>" />
                <span class="style1"></span></td>
            </tr>          
            <tr>
                <td>Imóvel: </td> 
                <td><select name="selImovel">
                        <option value="">Selecione</option>
                        <?php
                         foreach ($imovelLista as $item){
                            if($obj->imovel->matricula == $item->matricula){
                            $marcado = "selected";
                            }
                            else{
                                $marcado = "";
                            }
                        ?>
                         <option value="<?php echo $item->matricula?>" <?php echo $marcado?> >
                                        <?php echo $item->endereco?>
                         </option>
                        <?php
                          }
                        ?>
                    </select></td> <br />
            </tr>
            <tr>
                <td>Locatário: </td>
                    <td><select name="selInquilino">
                        <option value="">Selecione</option>
                        <?php
                         foreach ($inquilinoLista as $item){
                            if($obj->inquilino->cpf == $item->cpf){
                                $marcado = "selected";
                            }
                            else{
                                $marcado = "";
                            }
                        ?>
                        <option value="<?php echo $item->cpf?>"<?php echo $marcado?> >
                                       <?php echo $item->nome?>
                        </option>
                        <?php
                         }
                        ?>
                    </select></td> <br />
            </tr>
            <td colspan="2"><p>
            <input id="desfazer" name="desfazer" type="reset" value="Desfazer Digitação" />
            <input id="cadastrar" name="cadastrar" type="submit" value="Cadastrar" /> 
            <span class="style1"> </span></p>
            <p> </p>
            </td>  

        </tbody>
    </table>
</form>   
</html>



