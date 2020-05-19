<?php

    class Usuario{
        private $codUsuario;
        private $nomeUsuario;
        private $emailUsuario;
        private $senhaUsuario;
        private $fotoUsuario;
        private $codNivelAcesso;

        public function getCodUsuario(){
            return $this->codUsuario;
        }
        
        public function setCodUsuario($cod){
            $this->codUsuario = $cod;
        }

        public function getNomeUsuario(){
            return $this->nomeUsuario;
        }

        public function setNomeUsuario($nomeUsuario){
            $this->nomeUsuario = $nomeUsuario;
        }

        public function getEmailUsuario(){
            return $this->emailUsuario;
        }

        public function setEmailUsuario($emailUsuario){
            $this->emailUsuario = $emailUsuario;
        }

        public function getSenhaUsuario(){
            return $this->senhaUsuario;
        }

        public function setSenhaUsuario($senhaUsuario){
            $this->senhaUsuario = $senhaUsuario;
        }

        public function getFotoUsuario(){
            return $this->fotoUsuario;
        }

        public function setFotoUsuario($fotoUsuario){
            $this->fotoUsuario = $fotoUsuario;
        }

        public function getCodNivelAcesso(){
            return $this->codNivelAcesso;
        }

        public function setCodNivelAcesso($codNivelAcesso){
            $this->codNivelAcesso = $codNivelAcesso;
        }

        public function Cadastrar($usuario){
            $conexao = Conexao::pegarConexao();
            $queryInsert = "insert into tbUsuario(nomeUsuario,emailUsuario,senhaUsuario,fotoUsuario,codNivelAcesso)
            values ('".$usuario->getNomeUsuario()."','".$usuario->getEmailUsuario()."','".$usuario->getSenhaUsuario()."','".$usuario->getFotoUsuario()."',".$usuario->getCodNivelAcesso().") ";
            $conexao->exec($queryInsert);
            return 'Cadastro realizado com sucesso';
            //return $queryInsert;
        }

        public function Listar(){
            $conexao = Conexao::pegarConexao();
            $querySelect = "select codUsuario, nomeUsuario, emailUsuario, senhaUsuario, fotoUsuario, tbNivelAcesso.codNivelAcesso, tbNivelAcesso.descNivel from tbUsuario inner join tbNivelAcesso on tbUsuario.codNivelAcesso = tbNivelAcesso.codNivelAcesso";
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll();
            return $lista;  
        }

        public function listarUsuario($usuario){
            $conexao = Conexao::pegarConexao();
            $querySelect = "select codUsuario, nomeUsuario, emailUsuario, senhaUsuario from tbUsuario where codUsuario  = ".$usuario->getCodUsuario();
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll();
            foreach ($lista as $linha){
                $usuario->setNomeUsuario($linha['nomeUsuario']);
                $usuario->setEmailUsuario($linha['emailUsuario']);
                $usuario->setSenhaUsuario($linha['senhaUsuario']);
            }
        }

        public function EditarUsuario($usuario){
            $conexao = Conexao::pegarConexao();
            $queryUpdate = "update tbUsuario 
                            set nomeUsuario = '".$usuario->getNomeUsuario()."' 
                            , emailUsuario = '".$usuario->getEmailUsuario()."' 
                            , senhaUsuario  = '".$usuario->getSenhaUsuario()."' 
                            where codUsuario  = ".$usuario->getCodUsuario();
            $conexao->exec($queryUpdate);
            return 'Atualização realizada com sucesso';
            
        }

        public function ExcluirUsuario($usuario){
            $conexao = Conexao::pegarConexao();
            $queryUpdate = "delete from tbUsuario where codUsuario  = ".$usuario->getCodUsuario();
            $conexao->exec($queryUpdate);
            return 'Exclusão realizada com sucesso';
        }

        public function DevolveCod(){
            $conexao = Conexao::pegarConexao();
            $querySelect = "select MAX(codUsuario) as 'cod' from tbUsuario";
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll();
            foreach($lista as $linha){
                $cod = ($linha['cod']);
            }
            return $cod;   
        }

        public function Foto($usuario){
            $conexao = Conexao::pegarConexao();
            $queryUpdate = "update tbUsuario set fotoUsuario = '".$usuario->getFotoUsuario()."' where codUsuario = ".$usuario->getCodUsuario()."";
            $conexao->exec($queryUpdate);
            return $queryUpdate;
        }

    }

?>