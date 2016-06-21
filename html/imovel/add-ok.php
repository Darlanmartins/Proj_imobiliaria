<?php
    include "../cabecalho.php";
    
   require '../../dao/ImovelDAO.class.php';
   require '../../modelo/Imovel.class.php';
   
   $imovel = new Imovel();
   
   $imovel->matricula = $_POST["txtMatricula"];
   $imovel->caracteristicas = $_POST["txtCaracteristicas"];
   $imovel->endereco = $_POST["txtEndereco"]; 
    
   $dao = new ImovelDAO();
   $retorno = $dao->inserir($imovel);
   
?>
        <div>
            <h1 class="centro">Cadastro de Imovel</h1>
            <div>
                <h3>Registro inserido com sucesso</h3>
                <div>
                    <a href="index.php">Voltar</a>
                </div>
            </div>
        </div>
    </body>
</html>