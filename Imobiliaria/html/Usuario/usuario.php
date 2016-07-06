<?php 
?>
<html>
    <head>
        <?php
        include "../cabecalho_1.php";
        ?>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body class="centro" >
        <h2 class="centro"> Area do Corretor - Log in </h2>
        <?php
        ?>
        <form action="http://localhost/Imobiliaria/html/Usuario/usuario-ok.php" method="post">
            
            <label>Usuário: </label><input type="text" name="txtUsuario"/>
            <label>Senha: </label><input type="text" name="txtSenha" />
            <button type="submit" >Entrar </button>
        </form>
    </body>
</html>

