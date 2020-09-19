<?php
/**
 *  - Sistema Integrado de Gestão e Rastreamento Animal, SIGRA
 *  - Projeto: Oxxen Tecnologia em Rastreamento LTDA, 18/09/2020
 *  - Programador: Brendown Ferreira de Moura, https://github.com/Br3n0k
 *
 *  Classe de Configuração responsavel por conter as diretrizes e informações de configuração,
 *  do sistema, e sua eventual comunicação com serviços externos e banco de dados.
 */

namespace Oxxen;


class Config
{
    // Configurações da Certificadora
    static $certificadora_nome = "Oxxen";
    static $certificadora_nome_fantasia = "Certificadora Oxxen";
    static $certificadora_url = "https://oxxen.com.br/";
    static $certificadora_template = "oxxen_v1";

    // Configurações do Sistema
    static $sigra_timezone = "America/Sao_Paulo";
    static $sigra_charset = "utf8";
    static $sigra_max_execution_time = 7200;
    static $sigra_errors_reporting = "E_ALL";

    // Data Base Settings
    static $db_host = "";
    static $db_name = "";
    static $db_user = "";
    static $db_pass = "";
    static $db_port = "";
}