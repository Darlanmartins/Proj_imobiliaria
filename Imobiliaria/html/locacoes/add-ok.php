<?php
   include "../cabecalho.php";
       
   require_once '../../dao/LocacoesDAO.class.php';
   require_once '../../modelo/Locacoes.class.php';
   
   $locacoes = new Locacoes();
   
   $locacoes->contrato = $_POST["txtContrato"];
   $locacoes->data = $_POST["txtData"];
   $locacoes->vigencia = $_POST["txtVigencia"];
   $locacoes->valor = $_POST["txtValor"];
   $locacoes->imovel->matricula = $_POST["selImovel"];
   $locacoes->inquilino->cpf = $_POST["selInquilino"];
           
   $dao = new LocacoesDAO();
   $retorno = $dao ->inserir($locacoes);
   $msg = "";
   if($retorno){
       $msg = "Registro inserido com sucesso";
   }
   else{
       $msg = "Erro ao inserir o registro";
   }
?>
        <div>
            <h1 class="centro">Cadastro de Locações</h1>
            <div>
                <h3>Registro inserido com sucesso</h3>
                <div>
                    <a href="index.php"><input type="submit" value="Voltar"></a>
                </div>
            </div>
        </div>
    </body>
</html>
   
   
 