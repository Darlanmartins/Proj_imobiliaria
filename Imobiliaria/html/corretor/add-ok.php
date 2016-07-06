<?php
   include "../cabecalho.php";
       
   require_once '../../dao/CorretorDAO.class.php';
   require_once '../../modelo/Corretor.class.php';
   
   $corretor = new Corretor();
   
   $corretor->creci = $_POST["txtCreci"];
   $corretor->nome = $_POST["txtNome"];
   $corretor->telefone = $_POST["txtTelefone"];
         
   $dao = new CorretorDAO();
   $retorno = $dao->inserir($corretor);
   
?>
        <div>
            <h1 class="centro">Cadastro de Corretores</h1>
            <div>
                <h2>Registro inserido com sucesso</h2>
                <div>
                    <a href="index.php"><input type="submit" value="Voltar"></a>
                </div>
            </div>
        </div>
    </body>
</html>
