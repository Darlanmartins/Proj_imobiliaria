<?php
     if(!isset($_GET["creci"])){
      header("location: index.php");
    }
    
    require_once '../../modelo/Corretor.class.php';
    require_once '../../dao/CorretorDAO.class.php';
    
    $creci = $_GET["creci"];
    $dao = new CorretorDAO();
    $obj = $dao->buscarPorChavePrimaria($creci);

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
    <h1 class="centro">Alteração de Corretores</h1>
     <div>
        <a href="index.php"><button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Voltar à Lista de Corretores">Voltar</button></a> 
        <form id="corretor" name="corretor" action="upd-ok.php" method="post">
            <table width="725" border="0">
                <tr>
                <td>CRECI: </td>
                <td><input type="text" value="<?php echo $obj->creci ?>" readonly name="txtCreci" id="creci" OnKeyPress="formatar('###.####', this)"> 
                    <span class="style3">Apenas números</span></td>
                </tr>
                <tr>
                <td width="69">Nome: </td>
                <td width="546"><input type="text" value="<?php echo $obj->nome ?>" name="txtNome" id="nome" size="70" maxlength="70" />
                <span class="style1"></span></td>
                </tr>
                <tr>
                <td>Telefone: </td>
                <td><input type="text" value="<?php echo $obj->telefone ?>" name="txtTelefone" id="telefone" size="12" maxlength="12" OnKeyPress="formatar('## ####.####', this)" />   
                <span class="style3">Apenas números</span> </td>
                </tr>
                <tr>
                <td colspan="2"><p>
                <input name="limpar" type="reset" id="limpar" value="Desfazer Digitação" />
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

