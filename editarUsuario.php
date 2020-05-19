<?php

require_once('global.php');
try{
    $usuario = new Usuario();
    $usuario->setCodUsuario($_POST['codUsers']);
    $usuario->setNomeUsuario($_POST['txNome']);
    $usuario->setEmailUsuario($_POST['txEmail']);
    $usuario->setSenhaUsuario($_POST['txSenha']);
    $usuario->EditarUsuario($usuario);
    header("Location: usuario.php");
}
catch(Exception $e){
    echo '<pre>';
        print_r($e);
    echo '</pre>';
    echo $e->getMessage();
}

?>