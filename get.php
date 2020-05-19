<?php

    require_once('global.php');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Credentials: true");
    header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Origin, Content-Type, Authorization, Accept, X-Requested-With, x-xsrf-token");

    try {

        $txt = "lista";
        $conexao = Conexao::pegarConexao();
        $usuario = new Usuario();
        $usuario->setCodUsuario($_SESSION['CodUsuario']);
        $querySelect = "select codUsuario, nomeUsuario, emailUsuario, senhaUsuario, fotoUsuario, tbNivelAcesso.codNivelAcesso, tbNivelAcesso.descNivel from tbUsuario inner join tbNivelAcesso on tbUsuario.codNivelAcesso = tbNivelAcesso.codNivelAcesso
        where codUsuario > ".$usuario->getCodUsuario();
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll();
            echo ' { "lista":'.json_encode($lista).' }';
        
    } catch(Exception $e){
        echo '<pre>';
            print_r($e);
        echo '</pre>';
        echo $e->getMessage();
    }
?>