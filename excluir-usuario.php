<?php 

require_once('global.php');

try{
    $usuario = new Usuario();
    $usuario->setCodUsuario($_GET['id']);
    $usuario->ExcluirUsuario($usuario);
}
catch(Exception $e){
    echo '<pre>';
        print_r($e);
    echo '</pre>';
    echo $e->getMessage();
}
 ?>