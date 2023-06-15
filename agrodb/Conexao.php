<?php
    class Conexao
    {
        //Atributo estático (não muda):
        public static $instancia;
        // Ainda é apenas um atributo, mas será
        // transformado em uma instancia. Uma instancia
        // é um objeto, ou seja, algo que existe na 
        // memória principal da máquina

        // criando uma função (método) construtor:
        private function _construct()
        {
            // serve para construir o objeto
        } // fim do _construct

        // método para RETORNAR uma conexao com o BD:
        public static function getConexao()
        {
            // Verifica se é uma outra instância,
            // pois não pode criar uma instância em
            // duplicidade:
            if(!isset(self::$instancia))
            {
                self::$instancia = 
                  new PDO('mysql:host=localhost; dbname=agrodb',
                'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND =>
                 "SET NAMES utf8"));
                 self::$instancia->setAttribute(PDO::ATTR_ERRMODE,
                 PDO::ERRMODE_EXCEPTION);
                 self::$instancia->setAttribute(PDO::ATTR_ORACLE_NULLS,
                  PDO::NULL_EMPTY_STRING);
                  //PDO = PHP Data Object
            }
            return self::$instancia;
            
        }// fim do método getConexao
    } // fim da classe
?>