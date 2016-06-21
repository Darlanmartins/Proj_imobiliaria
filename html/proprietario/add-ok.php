<?php
    include "../cabecalho.php";
    
   require '../../dao/Proprietario.class.php';
   require '../../modelo/Proprietario.class.php';
   
   $proprietario = new Proprietario();
   
   $proprietario->cpf = $_POST["txtCpf"];
   $proprietario->nome = $_POST["txtNome"];
   $proprietario->endereco = $_POST["txtEndereco"];
   $proprietario->telefone = $_POST["txtTelefone"];
   
   $dao = new ProprietarioDAO();
   $retorno = $dao->inserir($proprietario);
   
?>
        <div>
            <h1 class="centro">Cadastro de Proprietarios</h1>
            <div>
                <h3>Registro inserido com sucesso</h3>
                <div>
                    <a href="index.php">Voltar</a>
                </div>
            </div>
        </div>
    </body>
</html>