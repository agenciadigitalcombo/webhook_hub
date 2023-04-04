<?php

class Events
{

    private $id;
    private $data;
    private $channel;
    private $body;

    private $con;

    function __construct()
    {
        $this->con = new Banco();
        $this->con->table('events');
    }

    function list()
    {
        return $this->con->select();
    }


    function add(string $channel, string $body)
    {
        return $this->con->insert([
            "data" => date('Y-m-d'),
            "channel" => $channel,
            "body" => $body
        ]);
    }
}
