<?php
    class Conexao
    {
        public static function pegarConexao()
        {
            $conexao = new PDO("mysql:host=localhost;
            dbname=bdTec", "root", ""); 
            /* $conexao = new PDO("mysql:host=fdb16.awardspace.net;
            dbname=3233198_veiculos", "3233198_veiculos", "igorsilva0612");  */
            /*new PDO(
                tipo:host=local;dbname=nome do banco
                , usuário de acesso ao banco
                , senha de acesso ao banco
                )
                */
            $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conexao->exec("SET CHARACTER SET utf8");
            return $conexao;
        }
    }
?>