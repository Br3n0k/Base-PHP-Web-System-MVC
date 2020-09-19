<?php
/**
 *  - Sistema Integrado de Gestão e Rastreamento Animal, SIGRA
 *  - Projeto: Oxxen Tecnologia em Rastreamento LTDA, 18/09/2020
 *  - Programador: Brendown Ferreira de Moura, https://github.com/Br3n0k
 *
 *  Classe responsavel por conter e estruturar os processos de comunicação com os bancos de dados
 */

namespace Oxxen;

use PDO;
use PDOException;

class Database
{
    var $database_host;
    var $database_name;
    var $database_user;
    var $database_pass;
    var $database_port;
    var $database_dns;
    var $database_options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',);
    public $conn;

    function __construct()
    {
        if(empty($this->database_host)) $this->database_host = Config::$db_host;
        if(empty($this->database_name)) $this->database_name = Config::$db_name;
        if(empty($this->database_user)) $this->database_user = Config::$db_user;
        if(empty($this->database_pass)) $this->database_pass = Config::$db_pass;
        if(empty($this->database_port)) $this->database_port = Config::$db_port;
    }

    public function OpenDataBaseConnection()
    {
        $this->conn = null;
        try
        {
            $this->database_dns = "mysql:host=".$this->database_host.";port=".$this->database_port.";dbname=".$this->database_name."";
            $this->conn = new PDO($this->database_dns,$this->database_user,$this->database_pass,$this->database_options);
        }
        catch (PDOException $exception)
        {
            echo "";
            exit();
        }
    }
}