<?php

class AppControle extends Controle
{

    function __construct()
    {
    }

    static function start()
    {
        self::printError(
            "Você não tem permissão de acesso",
            []
        );
    }
    
    static function add_subscribe()
    {
        self::requireInputs([
            "channel" =>  "Informe um canal",
            "url" =>  "Informe uma url",
        ]);
        $channel = $_REQUEST["channel"];
        $url = $_REQUEST["url"];
        $sub = new Subscribers();
        $sub->add($channel, $url);
        self::printSuccess(
            "Adicionado com sucesso",
            []
        );
    }

    static function remove_subscribe()
    {
        self::requireInputs([
            "channel" =>  "Informe um canal",
            "url" =>  "Informe uma url",
        ]);

        $channel = $_REQUEST["channel"];
        $url = $_REQUEST["url"];

        $sub = new Subscribers();
        $sub->remove($channel, $url);

        self::printSuccess(
            "Removido com sucesso",
            []
        );
    }

    static function subscribe()
    {

        $sub = new Subscribers();

        self::printSuccess(
            "Lista Ouvintes",
            $sub->list()
        );
    }

    static function events()
    {
        self::printSuccess(
            "Lista de eventos",
            []
        );
    }

    static function sent()
    {
        self::printSuccess(
            "Lista de envios",
            []
        );
    }
    
    static function webhook()
    {
        $adapter = new AdapterAsa;
        
        self::printSuccess(
            "Salvado com sucesso",
            $adapter->build($_REQUEST)
        );
    }
}
