<?php
    include "../cabecalho.php";
    require_once "../../dao/UsuarioDAO.class.php";
   // require_once '../../modelo/Usuario.class.php';
   
    $usuario = $_POST["txtUsuario"];
    $senha = $_POST["txtSenha"];
    $dao = new UsuarioDAO();

    $login = $dao->buscarPorUsuario($usuario);

    if($usuario == $login->usuario && $senha == $login->senha && $usuario!="" && $senha != ""){
           header("location:../corretor/index.php");
        }
    else{
           header("location:usuario.php");
    }
?>

    <h2 class="centro"> Bem Vindo! </h2>
     
</html>