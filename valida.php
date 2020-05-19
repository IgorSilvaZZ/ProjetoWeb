<?php

    require_once('global.php');
    

    try {
        
        if( (isset($_POST['txtUser'])) && (isset($_POST['txtSenha'])) ){

            $conexao = Conexao::pegarConexao();
            $usuario = new Usuario();
            $usuario->setEmailUsuario($_POST['txtUser']);
            $usuario->setSenhaUsuario($_POST['txtSenha']);
            $querySql = "select * from tbUsuario where emailUsuario = '".$usuario->getEmailUsuario()."' and senhaUsuario = '".$usuario->getSenhaUsuario()."'";
            $resultado = $conexao->query($querySql);
            $result = $resultado->fetchAll();
            $result = $result[0];

            if(empty($result)){
                $_SESSION['LoginErro'] = "Email ou Senha Inválido";
                header("Location: login.php");
            }elseif(isset($result)){
                $_SESSION['CodUsuario'] = $result['codUsuario'];
                $_SESSION['UsuarioNome'] = $result['nomeUsuario'];
                $_SESSION['UsuarioEmail'] = $result['emailUsuario'];
                $_SESSION['UsuarioFoto'] = $result['fotoUsuario'];
                header("Location: listagem.php");
            }else{
                $_SESSION['LoginErro'] = "Email ou Senha Inválido";
                header("Location: login.php");
            }

        }else{
            $_SESSION['LoginErro'] = "Email ou Senha Inválida";
            header("Location: login.php");
        }
    }catch(Exception $e){
        echo '<pre>';
            print_r($e);
        echo '</pre>';
        echo $e->getMessage();
    }

?>