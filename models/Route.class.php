<?php
/**
 *  - Sistema Integrado de Gestão e Rastreamento Animal, SIGRA
 *  - Projeto: Oxxen Tecnologia em Rastreamento LTDA, 18/09/2020
 *  - Programador: Brendown Ferreira de Moura, https://github.com/Br3n0k
 *
 *  Classe responsavel por estruturar as rotas de chamadas da url apontando para seus respectivos controllers
 */

namespace Oxxen;

class Route
{
    static function RouteToController()
    {
        // Instancia Objetos Para Uso
        $function = new Functions();

        // Busca a Solicitação via URL e Armazena o Array de Resultado
        $url_request = $function->RequestRoute(0);

        // Monta a chamada do controller
        $call_controller = DIR_ROOT."controllers/".$url_request[0].".controller.php";

        // Verifica se o Controller Existe e o Inclui na Exibição
        if(file_exists($call_controller)){
            include ($call_controller);
        }else{
            $function->Redirect(0,Config::$certificadora_url."error/404");
        }
    }
}