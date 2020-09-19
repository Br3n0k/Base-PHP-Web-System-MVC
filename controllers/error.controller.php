<?php
use Oxxen\Config;
use Oxxen\Functions;

// Instancia Objetos Utilizados
$function = new Functions();
$url_request = $function->RequestRoute(0);

// Armazena o segundo elemento da url, e define-o como inteiro, e limpa a url
define("ERROR_CODE", $function->CleanString(is_int($url_request[1])));
if(!empty($url_request[2])){
    define("ERROR_MSG",$url_request[2]);
}else{
    define("ERROR_MSG","");
}

// Percorre os Codigos de Erro para Incluir a Pagina do Template
switch (ERROR_CODE){
    case 404:
        include (DIR_ROOT.TEMPLATE_DIR."pages/error_404.template.php");
        break;
    case 403:
        include (DIR_ROOT.TEMPLATE_DIR."pages/error_403.template.php");
        break;
    case 500:
        include (DIR_ROOT.TEMPLATE_DIR."pages/error_500.template.php");
        break;
    default:
        include (DIR_ROOT.TEMPLATE_DIR."pages/error.template.php");
        break;
}

// Apos exibir a pagina de erro, redireciona o cliente após alguns segundos
$function->Redirect(5, Config::$certificadora_url."home");