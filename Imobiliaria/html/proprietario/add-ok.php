<?php
   include "../cabecalho.php";
       
   require_once '../../dao/ProprietarioDAO.class.php';
   require_once '../../modelo/Proprietario.class.php';
   
   $proprietario = new Proprietario();
   
   $proprietario->cpf = $_POST["txtCpf"];
   $proprietario->nome = $_POST["txtNome"];
   $proprietario->email = $_POST["txtEmail"];
   $proprietario->sexo = $_POST["txtSexo"];
   $proprietario->telefone = $_POST["txtTelefone"];
   $proprietario->endereco = $_POST["txtEndereco"];
   $proprietario->cidade = $_POST["txtCidade"];
   $proprietario->bairro = $_POST["txtBairro"];
   $proprietario->estado = $_POST["txtEstado"];
         
   $dao = new ProprietarioDAO();
   $retorno = $dao->inserir($proprietario);
   
?>
        <div>
            <h1 class="centro">Cadastro de Proprietários</h1>
            <div>
                <h2>Registro inserido com sucesso</h2>
                <div>
                    <a href="index.php"><input type="submit" value="Voltar"></a>
                </div>
            </div>
        </div>
    </body>
</html>