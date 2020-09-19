<?php
/**
 *  - Sistema Integrado de Gestão e Rastreamento Animal, SIGRA
 *  - Projeto: Oxxen Tecnologia em Rastreamento LTDA, 18/09/2020
 *  - Programador: Brendown Ferreira de Moura, https://github.com/Br3n0k
 */

// Carrega o Autoloader do Composer
include_once(DIR_ROOT."lib/autoload.php");
// Declara Objetos Utilizados
use Oxxen\Config;
use Oxxen\Functions;
use Oxxen\Route;

// Define a Exibição de Erros
error_reporting(Config::$sigra_errors_reporting);

// Define o TimeZone Prioritario do Sistema
date_default_timezone_set(Config::$sigra_charset);

// Tempo Maximo de Execucao de Script
set_time_limit(Config::$sigra_max_execution_time);

// Define Diretrizes do Sistema
define("TEMPLATE_DIR","content/templates/". Config::$certificadora_template ."/");

// Percorre a Solicitação na URL para Definir a Rota
Route::RouteToController();