<?php
session_start();
$login = "darlan";
$senha = "123";
//Verificar se a chamada da página veio do POST
$msg = "";
if(isset($_POST["txtLogin"]) && isset($_POST["txtSenha"]))
{
    //tento fazer o login
    
    if($_POST["txtLogin"] == $login && $_POST["txtSenha"] == $senha)
    {
        $_SESSION["usuario"] = $_POST["txtLogin"];
         header("location:html/imovel/index.php");
        
    }
    else {
        $msg = "Login e/ou senha errada";
        }
}  
    
?>


<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        ?>
        <form action="#" method="post">
            <span style="color:red"><?php echo $msg?></span>
            <label>Login:</label><input type="text" name="txtLogin"/>
            <label>Senha:</label><input type="text" name="txtSenha" />
            <button type="submit" >Entrar</button>
        </form>
    </body>
</html>