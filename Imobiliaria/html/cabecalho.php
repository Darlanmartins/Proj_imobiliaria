<?php
?>
<!DOCTYPE html>
<html> 
    <head>
        <meta charset="UTF-8">
        <title>Gerenciamento - Aluguéis -</title>
        <link rel="stylesheet" href="../estilo.css" />
    </head>
    <body >
        <h1 class="centro_t1">Gerenciamento de Imóveis | Aluguéis </h1>
        <header class="centro"><div class="centro_t2" value="<?php echo $obj->usuario ?>" readonly name="txtUsuario"> - <a href="http://localhost/Imobiliaria/html/Usuario/usuario.php"><button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Sair do Sistema">Log out</button></a> ...
            </div><hr/>
            <nav><a href="../corretor"><button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Lista de Corretores">Corretor</button></a>
                 <a href="../imovel"><button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Lista de Imóveis">Imóvel</button></a>
                 <a href="../inquilino"><button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Lista de Inquilinos">Inquilino</button></a> 
                 <a href="../locacoes"><button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Lista de Locações">Locações</button></a>
                 <a href="../proprietario"><button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Lista de Proprietários">Proprietário</button></a></nav>    
        </header>   
    </body>
</html>