<?php
   include "../cabecalho.php";
   
   require '../../dao/CorretorDAO.class.php';
   require '../../modelo/Corretor.class.php';
   
   $corretor = new Corretor();
   
   $corretor->nome = $_POST["txtNome"];
   $corretor->creci = $_POST["txtCreci"];
   $corretor->telefone = $_POST["txtTelefone"];
   
   $dao = new CorretorDAO();
   $retorno = $dao->inserir($corretor);
   
?>
        <div>
            <h1 class="centro">Cadastro de Corretores</h1>
            <div>
                <h3>Registro inserido com sucesso</h3>
                <div>
                    <a href="index.php">Voltar</a>
                </div>
            </div>
        </div>
    </body>
</html>