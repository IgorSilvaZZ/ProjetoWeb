<?php 

require_once('global.php');

try {
    header("Location: login.php");
    $usuario = new Usuario();
    $usuario->setEmailUsuario($_POST['email']);
    $usuario->setCodNivelAcesso($_POST['selectNivel']);
    $usuario->setNomeUsuario($_POST['usuario']);
    $usuario->setSenhaUsuario($_POST['senUsu']);
    
    echo $usuario->Cadastrar($usuario);

    $usuario->setCodUsuario($usuario->DevolveCod());

    $nomeImagem = $_FILES['txtFoto']['name'];
    $arquivoImagem = $_FILES['txtFoto']['tmp_name'];

    $caminho = "img/usuarios/";

    $extensao = substr(strstr($nomeImagem, "."),1);
    $nomeImagem = $caminho . $usuario->getCodUsuario() .".".$extensao;

    move_uploaded_file($arquivoImagem, $nomeImagem);
    //echo $nomeImagem;
    //$caminho = $caminho . $nomeImagem; */
    //echo("deucerto");
    //agora vc chama o métod que grava isso no banco
    $usuario->setFotoUsuario($nomeImagem);
    $usuario->Foto($usuario);
    
} 
catch(Exception $e){
    echo '<pre>';
        print_r($e);
    echo '</pre>';
    echo $e->getMessage();
}

?>