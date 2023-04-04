<?php

class Sent
{

    private $id;
    private $data;
    private $channel;
    private $url;
    private $body;
    private $status_code;

    private $con;

    function __construct()
    {
        $this->con = new Banco();
        $this->con->table('sent');
    }

    function list()
    {
        return $this->con->select();
    }

    function add(string $channel, string $url, string $body, $status_code )
    {
        return $this->con->insert([
            "data" => date('Y-m-d'),
            "channel" => $channel,
            "url" => $url,
            "body" => $body,
            "status_code" => $status_code,
        ]);
    }    
}