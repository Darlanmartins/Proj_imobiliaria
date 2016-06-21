<?php
   include "../cabecalho.php";
       
   require '../../dao/InquilinoDAO.class.php';
   require '../../modelo/Inquilino.class.php';
   
   $inquilino = new Inquilino();
   
   $inquilino->cpf = $_POST["txtCpf"];
   $inquilino->nome = $_POST["txtNome"];
   $inquilino->email = $_POST["txtEmail"];
   $inquilino->sexo = $_POST["txtSexo"];
   $inquilino->telefone = $_POST["txtTelefone"];
   $inquilino->endereco = $_POST["txtEndereco"];
   $inquilino->cidade = $_POST["txtCidade"];
   $inquilino->bairro = $_POST["txtBairro"];
   $inquilino->estado = $_POST["txtEstado"];
         
   $dao = new InquilinoDAO();
   $retorno = $dao->inserir($inquilino);
   
?>
        <div>
            <h1 class="centro">Cadastro de Inquilinos</h1>
            <div>
                <h3>Registro inserido com sucesso</h3>
                <div>
                    <a href="index.php">Voltar</a>
                </div>
            </div>
        </div>
    </body>
</html>