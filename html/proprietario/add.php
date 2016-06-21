<?php
    include "../cabecalho.php";
?>
        <div>
            <h1 class="centro">Cadastro de Proprietarios</h1>
            <div>
                <form action="add-ok.php" method="post">
                    <label>Cpf:</label><input type="text" name="txtCpf"/><br /><br />
                    <label>Nome:</label><input type="text" name="txtNome"/><br /><br />
                    <label>Endereco:</label><input type="text" name="txtEndereco"/><br /><br />
                    <label>Telefone:</label><input type="text" name="txtTelefone"/><br /><br />
                    <input type="reset" value="Limpar" />
                    <input type="submit" value="Salvar" />
                </form>
            </div>
        </div>
    </body>
</html>

