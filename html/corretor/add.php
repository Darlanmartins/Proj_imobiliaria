<?php
    include "../cabecalho.php";
?>
        <div>
            <h1 class="centro">Cadastro de Corretores</h1>
            <div>
                <form action="add-ok.php" method="post">
                    <label>Creci</label><input typenumber="text" name="txtCreci"/><br /><br />
                    <label>Nome:</label><input type="text" name="txtNome"/><br /><br />
                    <label>Telefone</label><input typenumber="text" name="txtTelefone"/><br /><br />
                    <input type="reset" value="Limpar" />
                    <input type="submit" value="Salvar" />
                </form>
            </div>
        </div>
    </body>
</html>

