<?php
    include "../cabecalho.php";
?>
        <div>
            <h1 class="centro">Cadastro de Imoveis</h1>
            <div>
                <form action="add-ok.php" method="post">
                    <label>Matricula:</label><input type="text" name="txtMatricula"/><br /><br />
                    <label>Caracteristicas:</label><input type="text" name="txtCaracteristicas"/><br /><br />
                    <label>Endereco:</label><input type="text" name="txtEndereco"/><br /><br />
                    <input type="reset" value="Limpar" />
                    <input type="submit" value="Salvar" />
                </form>
            </div>
        </div>
    </body>
</html>

