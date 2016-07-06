<?php
   include "../cabecalho.php";
       
   require_once '../../dao/ImovelDAO.class.php';
   require_once '../../modelo/Imovel.class.php';
   
   $imovel = new Imovel();
   
   $imovel->matricula = $_POST["txtMatricula"];
   $imovel->categoria = $_POST["txtCategoria"];
   $imovel->tipo = $_POST["txtTipo"];
   $imovel->endereco = $_POST["txtEndereco"];
   $imovel->bairro = $_POST["txtBairro"];
   $imovel->cidade = $_POST["txtCidade"];
   $imovel->caracteristicas = $_POST["txtCaracteristicas"];
   $imovel->proprietario->cpf = $_POST["selProprietario"];
         
   $dao = new ImovelDAO();
   $retorno = $dao ->inserir($imovel);
   $msg = "";
   if($retorno){
       $msg = "Registro inserido com sucesso";
   }
   else{
       $msg = "Erro ao inserir o registro";
   }  
?>
        <div>
            <h1 class="centro">Cadastro de Imóveis</h1>
            <div>
                <h2>Registro inserido com sucesso</h2>
                <div>
                    <a href="index.php"><input type="submit" value="Voltar"></a>
                </div>
            </div>
        </div>
    </body>
</html>
