<?php

    class NivelAcesso{
        private $codNivelAcesso;
        private $desNivelAcesso;

        public function getCodNivelAcesso(){
            return $this->codNivelAcesso;
        }

        public function setCodNivelAcesso($cod){
            $this->codNivelAcesso = $cod;
        }

        public function getDesNivelAcesso(){
            return $this->descNivelAcesso;
        }

        public function setDesNivelAcesso($desc){
            $this->descNivelAcesso = $desc;
        }

        public function Cadastrar($nivel){
            $conexao = Conexao::pegarConexao();
            $queryInsert = "insert into tbNivelAcesso(descNivel)
            values ('".$nivel->getDesNivelAcesso()."')";
            $conexao->exec($queryInsert);
            return 'Cadastro realizado com sucesso';
        }

        public function Listar(){
            $conexao = Conexao::pegarConexao();
            $querySelect = "select codNivelAcesso, descNivel from tbNivelAcesso";
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll();
            return $lista;  
        }

        public function ListarNivel($nivel){
            $conexao = Conexao::pegarConexao();
            $querySelect = "select descNivel from tbNivelAcesso where codNivelAcesso = ".$nivel->getCodNivelAcesso();
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll();
            foreach ($lista as $linha){
                $nivel->setDesNivelAcesso($linha['descNivel']);
            }
        }

        public function EditarNivel($nivel){
            $conexao = Conexao::pegarConexao();
            $queryUpdate = "update tbNivelAcesso set descNivel = '".$nivel->getDesNivelAcesso()."' where codNivelAcesso  = ".$nivel->getCodNivelAcesso();
            $conexao->exec($queryUpdate);
            return 'Atualização realizada com sucesso';
        }

        public function ExcluirNivel($nivel){
            $conexao = Conexao::pegarConexao();
            $queryUpdate = "delete from tbNivelAcesso where codNivelAcesso  = ".$nivel->getCodNivelAcesso();
            $conexao->exec($queryUpdate);
            return 'Exclusão realizada com sucesso';
        }

    }

?>