<?php
/**
 *  - Sistema Integrado de Gestão e Rastreamento Animal, SIGRA
 *  - Projeto: Oxxen Tecnologia em Rastreamento LTDA, 18/09/2020
 *  - Programador: Brendown Ferreira de Moura, https://github.com/Br3n0k
 *
 *  Classe responsavel por conter e as Funções usadas pelo sistema
 */

namespace Oxxen;


class Functions
{
    public function REQUEST_URI(){
        return $_SERVER['REQUEST_URI'];
    }

    public function Redirect($time,$url){
        return "<meta http-equiv='refresh' content='".$time."';url=".$url."'>";
    }

    public function HTTP_HOST(){
        return $_SERVER['HTTP_HOST'];
    }

    public function GetClientIp(){
        $ip = '';
        if (array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER)){
            return  $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
        }else if (array_key_exists('REMOTE_ADDR', $_SERVER)) {
            return $ip = $_SERVER["REMOTE_ADDR"];
        }else if (array_key_exists('HTTP_CLIENT_IP', $_SERVER)) {
            return $ip = $_SERVER["HTTP_CLIENT_IP"];
        }
        return $ip;
    }

    public function EncryptPass($senha){
        return password_hash($senha, PASSWORD_BCRYPT);
    }

    public function VerifyEncryptPass($senha, $senhaHash){
        if(password_verify($senha, $senhaHash) === true){
            return true;
        }else{
            return false;
        }
    }

    public function CleanString($string){
        $string = htmlspecialchars($string);
        $string = strip_tags($string);
        $string = filter_var($string,FILTER_SANITIZE_STRING);
        return $string;
    }

    public function RequestRoute($initial_position){
        // Armazena o Request na Variavel
        $get_url_request = $this->REQUEST_URI();

        // Quebra a request e elimina o scopo ?
        $inite = strpos($get_url_request, '?');
        if($inite) $get_url_request = substr($get_url_request, $initial_position, $inite);

        // Muda o ponto inicial de 0 para 1
        $get_url_request = substr($get_url_request, 1);

        // Divide o array separando ele pelo scopo /
        $url_request = explode('/', $get_url_request);

        // Verifica se o Indice 0 da Request é Vazio ou Nullo, se sim, define como home para chamada do controller default
        $url_request[0] = ($url_request[0] != '' ? $url_request[0] : 'home');

        return $url_request;
    }
}