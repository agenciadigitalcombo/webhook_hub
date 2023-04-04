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
        $ev = new Events();
        self::printSuccess(
            "Lista de eventos",
            $ev->list()
        );
    }

    static function sent()
    {
        $sent = new Sent();
        self::printSuccess(
            "Lista de envios",
            $sent->list()
        );
    }



    static function webhook()
    {
        // build save 
        $adapter = new AdapterAsa;
        $build = $adapter->build($_REQUEST);
        $channel = $build['channel'];
        $body = $build['body'];
        $ev = new Events();
        $ev->add($channel, $body);

        // list channel
        $sub = new Subscribers();
        $all_channels = $sub->list_by_channel($channel);

        // dispath
        $temp_path = [];
        $message = new Send();
        $save_envio = new Sent();
        foreach ($all_channels as $c) {
            $path = $c["url"];
            $status = $message->send($_REQUEST, $path);
            $temp_path[] = [
                "path" => $path,
                "status" => $status,
            ];

            // save sent
            $save_envio->add(
                $channel,
                $path,
                $body,
                $status
            );
        }

        self::printSuccess(
            "Salvado com sucesso",
            $temp_path
        );
    }
}
