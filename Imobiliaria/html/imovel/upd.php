<?php
    if(!isset($_GET["matricula"])){
      header("location: index.php");
    }
    
    require_once '../../modelo/Imovel.class.php';
    require_once '../../dao/ImovelDAO.class.php';
    
    $matricula = $_GET["matricula"];
    $dao = new ImovelDAO();
    $obj = $dao->buscarPorChavePrimaria($matricula);

    if($obj == null){
      header("location: index.php");
    } 
    require_once '../../dao/ProprietarioDAO.class.php';
    
    $proprietarioDao = new ProprietarioDAO();
    $proprietarioLista = $proprietarioDao->Listar();
   
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
            <h1 class="centro">Alteração de Imóveis</h1>
    </div>
<a href="index.php"><button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Voltar à Lista de Imóveis">Voltar</button></a>
<form action="upd-ok.php" method="post">
    <table style="width: 725px;" border="0">
        <tbody>
            <tr>
            <td>Matrícula: </td>
            <td><input type="text" readonly name="txtMatricula" OnKeyPress="formatar('###.###', this)" size="10" maxlength="10" value="<?php echo $obj->matricula?>" > 
                <span class="style3">Apenas números</span></td>
            </tr>    
            <tr>
                <td>Categoria: </td>
                <td>
                <?php
                    function selected( $value, $selected ){
                    return $value==$selected ? ' selected="selected"' : '';
                    }
                ?>
                <select name="txtCategoria">
                <option value="">Selecione...</option>    
                <option value="Residencial"<?php echo selected( 'Residencial', $obj->categoria ); ?> >Residencial</option>
                <option value="Comercial"<?php echo selected( 'Comercial', $obj->categoria ); ?> >Comercial</option>
                <option value="Mixto"<?php echo selected( 'Mixto', $obj->categoria ); ?> >Mixto</option>
                </select>
                <span class="style1"></span></td>
            </tr>
            <tr>
                <td>Tipo: </td>
                <td>
                <select name="txtTipo">
                <option value="">Selecione...</option>    
                <option value="Apartamento"<?php echo selected( 'Apartamento', $obj->tipo ); ?> >Apartamento</option>
                <option value="Box/Garagem"<?php echo selected( 'Box/Garagem', $obj->tipo ); ?> >Box/Garagem</option>
                <option value="Casa"<?php echo selected( 'Casa', $obj->tipo ); ?> >Casa</option>
                <option value="Galpão Comercial"<?php echo selected( 'Galpão Comercial', $obj->tipo ); ?> >Galpão Comercial</option>
                <option value="Sala Comercial"<?php echo selected( 'Sala Comercial', $obj->tipo ); ?> >Sala Comercial</option>
                <option value="Terreno"<?php echo selected( 'Terreno', $obj->tipo ); ?> >Terreno</option>
                </select>
                <span class="style1"></span></td>
            </tr>   
            <tr>
                <td>Endereço: </td>
                <td><input id="endereco" name="txtEndereco" type="text" size="70" maxlength="70" value="<?php echo $obj->endereco?>">
                <span class="style1"></span></td>
            </tr>
            <tr>
                <td>Bairro: </td>
                <td><input id="bairro" name="txtBairro" type="text" size="40" maxlength="40" value="<?php echo $obj->bairro?>">
                <span class="style1"></span></td>
            </tr>
            <tr>
                <td>Cidade: </td>
                <td><input id="cidade" name="txtCidade" type="text" size="35" maxlength="35" value="<?php echo $obj->cidade?>">
                <span class="style1"></span></td>
            </tr>
            <tr>
                <td>Características: </td>
                <td><input id="caracteristicas" name="txtCaracteristicas" type="text" size="90" maxlength="90" value="<?php echo $obj->caracteristicas?>">
                <span class="style1"></span></td>
            </tr>
            <tr>
                <td>Proprietário: </td>
                    <td><select name="selProprietario">
                        <option value="">Selecione</option>
                        <?php
                         foreach ($proprietarioLista as $item){
                            if($obj->proprietario->cpf == $item->cpf){
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
